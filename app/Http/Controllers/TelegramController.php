<?php

namespace App\Http\Controllers;

use Throwable;
use App\Dusting;
use Telegram\Bot\Api;
use App\Jobs\CropDustingJob;

class TelegramController extends Controller
{
    /**
     * Telegram
     *
     * @var \Telegram\Bot\Api
     */
    protected $telegram;

    /**
     * BotController constructor.
     *
     * @param \Telegram\Bot\Api  $telegram
     */
    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Handles incoming webhook updates from Telegram.
     *
     * @return string
     */
    public function webhookHandler()
    {
        $update = $this->telegram->commandsHandler(true);

        // Get Message
        $message = $update->getMessage();

        // Edge Case?
        if ($message === null) {
            return 'Ok';
        }

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

        return 'Ok';
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