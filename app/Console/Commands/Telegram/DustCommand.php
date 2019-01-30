<?php

namespace App\Console\Commands\Telegram;

use Throwable;
use App\Dusting;
use App\Jobs\CropDustingJob;
use Telegram\Bot\Commands\Command;

class DustCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'd';

    /**
     * @var string Command Description
     */
    protected $description = 'Dust Command';

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
        $address = $message->getText();

        // Validate
        if($this->isBitcornChat($chat_id) &&
           $this->isValidAddress($address) &&
           $this->userNotDusted($user_id, $address)) {
            // Dust 'Em
            CropDustingJob::dispatch($user_id, $address);
        }
    }

    /**
     * Is Bitcorn Chat
     * 
     * @param  integer  $chat_id
     * @return boolean
     */
    private function isBitcornChat($chat_id) {
        return $chat_id === (int) config('bitcorn.public_chat_id');
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
     * User Not Dusted
     * 
     * @param  integer  $user_id
     * @param  string  $address
     * @return boolean
     */
    private function userNotDusted($user_id, $address) {
        return ! Dusting::where('user_id', '=', $user_id)
            ->orWhere('address', '=', $address)
            ->exists();
    }
}