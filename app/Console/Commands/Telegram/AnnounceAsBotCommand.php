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
        $chat_id = $this->getUpdate()->getMessage()->getChat()->getId();

        if($chat_id == config('bitcorn.private_chat_id'))
        {
            $message = str_replace('/a ', '', $this->getUpdate()->getMessage()->getText());

            SendMessageJob::dispatch($message, 'public');
        }
    }
}