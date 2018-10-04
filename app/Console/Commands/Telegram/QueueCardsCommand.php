<?php

namespace App\Console\Commands\Telegram;

use Curl\Curl;
use App\Jobs\SendMessageJob;
use Telegram\Bot\Commands\Command;

class QueueCardsCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'qc';

    /**
     * @var string Command Description
     */
    protected $description = 'Card Queue Command';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $chat_id = $this->getUpdate()->getMessage()->getChat()->getId();

        if($chat_id == config('bitcorn.private_chat_id'))
        {
            $cards = $this->getCards();
            
            foreach($cards as $card)
            {
                $this->replyWithImage($card);
                $this->replyWithText($card['name']);
            }
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

    /**
     * Reply With Text
     * 
     * @param  string  $text
     * @return mixed
     */
    private function replyWithText($text)
    {
        // Reply w/ Message
        $this->replyWithMessage([
            'text' => $text,
            'parse_mode' => 'Markdown',
            'disable_notification' => true,
        ]);

        return $text;
    }

    /**
     * Reply With Image
     * 
     * @param  \App\Card  $card
     * @return mixed
     */
    private function replyWithImage($card)
    {
        // Image URL
        $image_url = $card['card'];

        // Reply w/ Image
        if($this->isAnimated($image_url))
        {
            $this->replyWithDocument([
                'document' => $image_url,
                'disable_notification' => true,
            ]);
        }
        else
        {
            $this->replyWithPhoto([
                'photo' => $image_url,
                'disable_notification' => true,
            ]);
        }

        return $image_url;
    }

    /**
     * Is Animated
     *
     * @param  string  $image_url
     * @return array
     */
    private function isAnimated($image_url)
    {
        return substr($image_url, -3) === 'gif';
    }
}