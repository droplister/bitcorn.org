<?php

namespace App\Console\Commands\Telegram;

use App\Jobs\SendMessageJob;
use Telegram\Bot\Commands\Command;

class AnnounceAsBotCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'a';

    /**
     * @var string Command Description
     */
    protected $description = 'Announce Command';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $update = $this->getUpdate();
        $chat = $update->getChat();
        $chat_id = $chat->getId();

        if($chat_id === config('bitcorn.private_chat_id'))
        {
            $message = $update->getMessage()->getText();

            SendMessageJob::dispatch($message, 'public');
        }
    }
}