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
        $election = $this->getElection($arguments);

        if($election)
        {
            $percent = number_format($election->votes()->sum('amount') / $election->asset->issuance * 100, 1);
            $link = route('elections.show', ['election' => $election->id]);
            $text = "*{$election->event->name}*\n";
            $text.= $election->decided_at ? "" : "Learn how to [VOTE HERE]({$link}). _So far {$percent}% of CROPS have voted for..._\n\n";

            $candidates = $election->candidates()
                ->orderBy('votes_total', 'desc')
                ->get();

            $i = 0;
            foreach($candidates as $candidate)
            {
                $i++;
                $percent = number_format($candidate->votes_total / $election->votes()->sum('amount') * 100, 1);
                $text.= "*{$i}. {$candidate->user->name}*\n";
                $text.= "{$candidate->memo} - _{$percent}% of vote_\n";
            }
        }
        else
        {
            $max = Election::count();
            $text = "No active election. Enter: 1-{$max}.";
        }

        $this->replyWithMessage([
            'text' => $text,
            'parse_mode' => 'Markdown',
            'disable_notification' => true,
            'disable_web_page_preview' => true,
        ]);
    }

    /**
     * Get Election
     * 
     * @param  string  $arguments
     * @return mixed
     */
    private function getElection($arguments)
    {
        $id = explode(' ', $arguments)[0];

        return Election::find($id) ? Election::find($id) : Election::active()->first();
    }
}