<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use JsonRPC\Client;
use BitWasp\Bitcoin\Bitcoin;
use BitWasp\Bitcoin\Script\ScriptFactory;
use BitWasp\Bitcoin\Key\PrivateKeyFactory;
use BitWasp\Bitcoin\Transaction\TransactionFactory;
use BitWasp\Bitcoin\Transaction\Factory\Signer;
use BitWasp\Bitcoin\Transaction\TransactionOutput;

class SendMerchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1;

    /**
     * Chat ID
     *
     * @var integer
     */
    protected $chat_id;

    /**
     * Address
     *
     * @var string
     */
    protected $address;

    /**
     * Item #
     *
     * @var integer
     */
    protected $item_no;

    /**
     * Asset
     *
     * @var string
     */
    protected $asset;

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
    public function __construct($chat_id, $address, $item_no, $asset)
    {
        $this->chat_id = $chat_id;
        $this->address = $address;
        $this->item_no = $item_no;
        $this->asset = $asset;
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
        // Send Merch
        $unsigned = $this->createSend();
        // Sign the HEX
        $signed = $this->signSendTx($unsigned);
        // Publish TX
        $send = $this->publishSend($signed);

        // Record & Notify
        if($send !== null) {
            // Message TXT
            $message = "https://xchain.io/tx/{$send}";
        } else {
            // Message TXT
            $message = "Whoops! An error occured.";
        }

        // Notify Chatroom
        $this->notifyChat($message);
    }

    /**
     * Counterparty API
     * https://counterparty.io/docs/api/#get_table
     *
     * @return mixed
     */
    private function createSend()
    {
        if($this->asset === 'A17235170928404775866') {
            $memo = "{$this->item_no} of 300";
        } else {
            $memo = "{$this->item_no} of 500";
        }

        try {
            return $this->counterparty->execute('create_send', [
                'source' => config('bitcorn.faucet_address'),
                'destination' => $this->address,
                'asset' => $this->asset,
                'quantity' => 1,
                'memo' => $memo,
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
     * Notify Chat
     * 
     * @param  App\Message $message
     * @return Telegram
     */
    private function notifyChat($message)
    {
        return \Telegram::sendMessage([
            'chat_id' => $this->chat_id, 
            'text' => $message,
            'parse_mode' => 'Markdown',
            'disable_notification' => true,
            'disable_web_page_preview' => true,
        ]);
    }
}