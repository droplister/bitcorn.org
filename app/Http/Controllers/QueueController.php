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
        $deny = Decision::where('card', '=', $card)->sum('approve');

        // Report to Bitcorns API
        if($approve + $deny === 4 && $decisions === 2) {
            $this->touchCard($card, $approve > $deny ? 'approve' : 'deny');
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
}