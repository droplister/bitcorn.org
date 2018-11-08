<?php

namespace App\Http\Controllers;

use Auth;
use Curl\Curl;
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

            return view('queue.index');
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