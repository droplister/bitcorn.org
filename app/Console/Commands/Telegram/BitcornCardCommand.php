<?php

namespace App\Console\Commands\Telegram;

use Telegram\Bot\Commands\Command;

class BitcornCardCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = '/c';

    /**
     * @var string Command Description
     */
    protected $description = 'Bitcorn Cards';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $card = explode(' ', $arguments)[0];
        $data = $this->getCard($card);

        if(! $data)
        {
            $cards = $this->getCards();
            $random = array_rand($cards, 1);
            $data = $cards[$random];
        }

        if($data)
        {
            if(substr($data['card'], -3) === 'gif')
            {
                $this->replyWithDocument(['document' => $data['card']]);
            }
            else
            {
                $this->replyWithPhoto(['photo' => $data['card']]);
            }
        }
    }

    /**
     * Get Card API
     * 
     * @return array
     */
    private function getCard($card)
    {
        $this->curl->get('https://bitcorns.com/api/cards/' . $card);

        if ($this->curl->error) return null; // Errors

        return json_decode($this->curl->response, true);
    }

    /**
     * Get Cards API
     * 
     * @return array
     */
    private function getCards()
    {
        $this->curl->get('https://bitcorns.com/api/cards');

        if ($this->curl->error) return null; // Errors

        return json_decode($this->curl->response, true);
    }
}