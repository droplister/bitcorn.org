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
            $percent = number_format($election->votes()->sum('amount') / $election->asset->issuance, 1);
            $link = route('elections.show', ['election' => $election->id]);
            $text = "*{$election->event->name}*\n";
            $text.= $election->decided_at ? "The Final Results" : "Vote Before Block {$election->block_index}!\n";
            $text.= $election->decided_at ? "" : "_So far {$percent}% have voted..._\n";

            $candidates = $election->candidates()
                ->orderBy('votes_total', 'desc')
                ->get();

            $i = 0;
            foreach($candidates as $candidate)
            {
                $i++;
                $text.= "{$i}. {$candidate->user->name}\n";
            }

            $text.= $election->decided_at ? "" : "\n Learn how to vote [here]({$link})!";
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