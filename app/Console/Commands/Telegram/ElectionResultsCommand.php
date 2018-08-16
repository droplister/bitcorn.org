<?php

namespace App\Console\Commands\Telegram;

use App\Election;
use Telegram\Bot\Commands\Command;

class ElectionResultsCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'e';

    /**
     * @var string Command Description
     */
    protected $description = 'Election Results';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $arguments = explode(' ', $arguments);

        if($election = Election::find($arguments[0]))
        {
            $text = "*{$election->event->name}*\n";
            $text.= $election->decided_at ? "The Final Results" : "Vote Before {$election->block_index}!\n";

            $candidates = $election->candidates()
                ->orderBy('votes_total', 'desc')
                ->get();

            $i = 0;
            foreach($candidates as $candidate)
            {
                $i++;
                $text.= "{$i}. {$candidate->user->name} ({$candidate->memo}) __{$candidate->votes_total_normalized} Votes__\n";
            }
        }
        else
        {
            $max = Election::count();
            $text = "Please provide a valid election number. (1-{$max})";
        }

        $this->replyWithMessage([
            'text' => $text,
            'parse_mode' => 'Markdown',
            'disable_notification' => true,
            'disable_web_page_preview' => true,
        ]);
    }
}