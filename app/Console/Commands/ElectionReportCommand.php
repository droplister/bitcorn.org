<?php

namespace App\Console\Commands;

use Cache;
use App\Election;
use App\Jobs\SendMessageJob;
use Illuminate\Console\Command;

class ElectionReportCommand extends Command
{
    /*
    |--------------------------------------------------------------------------
    | Election Report Command
    |--------------------------------------------------------------------------
    |
    | The purpose of this command is to check if any elections are ending
    | soon and if any are it reports that to Telegram as a sort of
    | coundown to the polls closing and the final decision.
    |
    */

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'election:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Report Ending Elections';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $elections = Election::active()->get();

        foreach($elections as $election)
        {
            if($this->isEnding($election))
            {
                $message = $this->getMessage($election);

                SendMessageJob::dispatch($message);
            }
        }
    }

    /**
     * Is Ending?
     * 
     * @param  \App\Election  $election
     * @return boolean
     */
    private function isEnding($election)
    {
        $blocks_left = $this->blocksLeft($election);

        return $blocks_left > 0 && $blocks_left <= 10;
    }

    /**
     * Block Left
     *
     * @param  \App\Election  $election
     * @return integer
     */
    private function blocksLeft($election)
    {
        $current_block_index = Cache::get('block_index');

        return $election->block_index - $current_block_index;
    }

    /**
     * Get Message
     * 
     * @param  \App\Election  $election
     * @return string
     */
    private function getMessage($election)
    {
        $blocks_left = $this->blocksLeft($election);
        $blocks_word = str_plural('block', $blocks_left);

        $message = "*{$election->event->name}*\n";
        $message.= "Ends in {$blocks_left} {$blocks_word}...";

        return $message;
    }
}