<?php

namespace App\Http\Controllers;

use Auth;
use Curl\Curl;
use App\Decision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QueueController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show card queue
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->isAdmin() || Auth::user()->isBoard()) {
            $cards = $this->getCards();

            return view('queue.index', compact('cards'));
        }
    }

    /**
     * Decide on card
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $card, $decision)
    {
        // Decisions so far...
        $decisions = Decision::where('card', '=', $card)->count();

        // Cast Their Votes
        if($decisions < 3) {
            if(Auth::user()->isAdmin()) {
                Decision::firstOrCreate([
                    'user_id' => Auth::user()->id,
                    'card' => $card,
                ],[
                    $decision => 2,
                ]);
            }
            elseif(Auth::user()->isBoard()) {
                Decision::firstOrCreate([
                    'user_id' => Auth::user()->id,
                    'card' => $card,
                ],[
                    $decision => 1,
                ]);
            }
        }

        // Weigh Their Decisions
        $approve = Decision::where('card', '=', $card)->sum('approve');
        $deny = Decision::where('card', '=', $card)->sum('deny');

        // Report to Bitcorns API
        if($approve + $deny === 4 && $decisions === 2 && $approve !== $deny) {
            // Final Decision
            $decision = $approve > $deny ? 'approve' : 'deny';

            // Touch the API
            $this->touchCard($card, $decision);

            // Success Message
            $success = 'The decision has been made to ' . $decision . ' this card.';
        }
        elseif($approve + $deny === 4 && $decisions === 2 && $approve === $deny) {
            // Stalemate Restart
            Decision::where('card', '=', $card)->delete();

            // Success Message
            $success = 'Voting resulted in a stalemate and has been reset';
        }

        // First Two Voters
        return redirect(route('queue.index'))->with('success', isset($success) ? $success : 'Your vote has been cast!');
    }

    /**
     * Get Cards API
     * 
     * @return array
     */
    private function getCards($publish=false)
    {
        $curl = new Curl();

        if ($publish) {
            $curl->get(config('bitcorn.publish_queue_route'));
        } else {
            $curl->get(config('bitcorn.queue_route'));
        }

        if ($curl->error) return []; // Some Error

        return json_decode($curl->response, true);
    }

    /**
     * Touch Card API
     *
     * @param  string  $card
     * @param  string  $decision
     * @return array
     */
    private function touchCard($card, $decision)
    {
        $curl = new Curl();

        $curl->get(config('bitcorn.approval_route') . '/' . $card . '?decision=' . $decision);

        if ($curl->error) return []; // Some Error

        return json_decode($curl->response, true);
    }

    /**
     * Publish Card API
     *
     * @param  string  $card
     * @param  string  $decision
     * @return array
     */
    private function publishCard($card)
    {
        $curl = new Curl();

        $curl->get(config('bitcorn.publish_route') . '/' . $card);

        if ($curl->error) return []; // Some Error

        return json_decode($curl->response, true);
    }
}