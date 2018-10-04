<?php

namespace App\Console\Commands\Telegram;

use Curl\Curl;
use App\Jobs\SendMessageJob;
use Telegram\Bot\Commands\Command;

class QueueCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'q';

    /**
     * @var string Command Description
     */
    protected $description = 'Queue Command';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $chat_id = $this->getUpdate()->getMessage()->getChat()->getId();

        if($chat_id == config('bitcorn.private_chat_id'))
        {
            $cards = $this->getCards();

            $message = "Card Queue:\n";

            foreach($cards as $card) {
                $message.= "{$card['name']}";
            }

            SendMessageJob::dispatch($message, 'private');
        }
    }

    /**
     * Get Cards API
     * 
     * @return array
     */
    private function getCards()
    {
        $curl = new Curl();

        $curl->get(config('bitcorn.queue_route'));

        if ($curl->error) return []; // Some Error

        return json_decode($curl->response, true);
    }
}