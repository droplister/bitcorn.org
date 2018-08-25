<?php

namespace App\Console\Commands\Telegram;

use Curl\Curl;
use Telegram\Bot\Commands\Command;

class BitcornCardCommand extends Command
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->curl = new Curl();
    }

    /**
     * @var string Command Name
     */
    protected $name = 'c';

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

        if(! $data || ! isset($data['card']))
        {
            $cards = $this->getCards();
            $data = array_random($cards, 1)[0];
        }

        if($data && isset($data['card']))
        {
            $this->replyWithDocument(['document' => $data['card']]);
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