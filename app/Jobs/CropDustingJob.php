<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Dusting;
use JsonRPC\Client;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Script\ScriptFactory;
use BitWasp\Bitcoin\Key\PrivateKeyFactory;
use BitWasp\Bitcoin\Transaction\TransactionFactory;
use BitWasp\Bitcoin\Transaction\Factory\Signer;
use BitWasp\Bitcoin\Transaction\TransactionOutput;

class CropDustingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * User ID
     *
     * @var integer
     */
    protected $user_id;

    /**
     * Address
     *
     * @var string
     */
    protected $address;

    /**
     * Bitcoin Core API
     *
     * @var \JsonRPC\Client
     */
    protected $bitcoin;

    /**
     * Counterparty API
     *
     * @var \JsonRPC\Client
     */
    protected $counterparty;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $address)
    {
        $this->user_id = $user_id;
        $this->address = $address;
        $this->bitcoin = new Client(config('bitcorn.bc.api'));
        $this->bitcoin->authentication(config('bitcorn.bc.user'), config('bitcorn.bc.password'));
        $this->counterparty = new Client(config('bitcorn.cp.api'));
        $this->counterparty->authentication(config('bitcorn.cp.user'), config('bitcorn.cp.password'));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Record Request
        $dusting = Dusting::firstOrCreate([
            'user_id' => $this->user_id,
            'address' => $this->address,
        ]);

        // Broadcast Once
        if($dusting->tx_hash === null) {
            // Dust the Address
            $unsigned = $this->createSend($dusting->address);
            // Sign the HEX
            $signed = $this->signSendTx($unsigned);
            // Publish TX
            $send = $this->publishSend($signed);

            // Record & Notify
            if($send !== null) {
                // Record TX Hash
                $dusting->tx_hash = $send;
                $dusting->save();

                // Message TXT
                $message = "You have been dusted with 0.001 CROPS! Once this transaction confirms, your farm will have been established on the blockchain and you can visit it here: https://bitcorns.com/farms/{$this->address} (This page will 404 until then.)\n\n";
                $message.= "Monitor the transaction: https://xchain.io/tx/{$dusting->tx_hash}";
            } else {
                // Message TXT
                $message = "An error occured when we tried to dust your address.";
            }
        } else {
            // Message TXT
            $message = "This address has been dusted before. Sorry! Maybe invite a friend to farm?";
        }

        // Notify User
        $this->notifyUser($message);
    }

    /**
     * Counterparty API
     * https://counterparty.io/docs/api/#get_table
     *
     * @return mixed
     */
    private function createSend($address)
    {
        try {
            return $this->counterparty->execute('create_send', [
                'source' => config('bitcorn.faucet_address'),
                'destination' => $address,
                'asset' => 'CROPS',
                'quantity' => 10000,
                'memo' => 'Crop Dusted',
                'allow_unconfirmed_inputs' => true,
                'fee' => 1000,
            ]);
        } catch (Throwable $e) {
            \Log::info('Unsigned Failed');
            return null;
        }
    }

    /**
     * Sign Bitcoin TX
     * https://bitcoin.stackexchange.com/questions/46764/sign-transaction-hex-with-php-library/46797
     *
     * @return mixed
     */
    private function signSendTx($hex) {

        try {
            $privateKey = config('bitcorn.faucet_private_key');

            $tx = TransactionFactory::fromHex($hex);

            $transactionOutputs = [];
            foreach ($tx->getInputs() as $idx => $input) {
                $transactionOutput = new TransactionOutput(0, ScriptFactory::fromHex($input->getScript()->getBuffer()->getHex()));
                array_push($transactionOutputs, $transactionOutput);
            }

            $priv = PrivateKeyFactory::fromWif($privateKey);
            $signer = new Signer($tx, Bitcoin::getEcAdapter());

            foreach ($transactionOutputs as $idx => $transactionOutput) {
                $signer->sign($idx, $priv, $transactionOutput);
            }

            $signed = $signer->get();

            return $signed->getHex();
        } catch (Throwable $e) {
            \Log::info('Failed to Sign');
            return null;
        }
    }

    /**
     * Bitcoin Core API
     * https://bitcoin.org/en/developer-reference#sendrawtransaction
     *
     * @return mixed
     */
    private function publishSend($raw_tx)
    {
        try {
            return $this->bitcoin->execute('sendrawtransaction', [
                $raw_tx,
            ]);
        } catch (Throwable $e) {
            \Log::info('Failed to Send');
            return null;
        }
    }

    /**
     * Notify User
     * 
     * @param  App\Message $message
     * @return Telegram
     */
    private function notifyUser($message)
    {
        return \Telegram::sendMessage([
            'chat_id' => $this->user_id, 
            'text' => $message,
            'parse_mode' => 'Markdown',
        ]);
    }
}