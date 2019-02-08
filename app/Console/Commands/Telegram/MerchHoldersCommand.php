<?php

namespace App\Console\Commands\Telegram;

use Throwable;
use App\Jobs\SendMerchJob;
use Telegram\Bot\Commands\Command;

class MerchHoldersCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'h';

    /**
     * @var string Command Description
     */
    protected $description = 'Holders Merch Command';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        // Get Message
        $message = $this->getUpdate()->getMessage();

        // Get Data
        $user_id = $message->getFrom()->getId();
        $chat_id = $message->getChat()->getId();
        $text = $message->getText();

        // Clean Up
        $text = str_replace('/h', '', $text);
        $part = explode(' ', trim($text));

        // Parsing
        $address = trim($part[0]);
        $item_no = trim($part[1]);

        // Validate
        if($this->isBitcornChat($chat_id) &&
           $this->isBitcornUser($user_id) &&
           $this->isValidAddress($address)) {
            // Send Merch
            SendMerchJob::dispatch($chat_id, $address, $item_no, 'A17235170928404775866');
        }
    }

    /**
     * Is Bitcorn Chat
     * 
     * @param  integer  $chat_id
     * @return boolean
     */
    private function isBitcornChat($chat_id) {
        return $chat_id === (int) config('bitcorn.private_chat_id');
    }

    /**
     * Is Valid Address
     * 
     * @param  string  $address
     * @return boolean
     */
    private function isValidAddress($address) {
        try {
            return validateAddress($address);
        } catch (Throwable $e) {
            return false;
        }
    }

    /**
     * Is Bitcorn User
     * 
     * @param  integer  $user_id
     * @return boolean
     */
    private function isBitcornUser($user_id) {
        return $user_id === 179036793;
    }
}