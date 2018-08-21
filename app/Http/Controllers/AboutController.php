<?php

namespace App\Http\Controllers;

use Cache;
use App\Election;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Bitcorn API
        $data = Cache::remember('api_info', 60,
            function () {
                $data = file_get_contents('https://bitcorns.com/api/info');

                return json_decode($data, true);
            }
        );

        // "The Board"
        $members = Cache::remember('members', 1440,
            function () {
                $last_election = Election::latest('decided_at')->first();

                return $last_election ? $last_election->candidates()->elected()->get() : [];
            }
        );

        return view('about.index', compact('data', 'members'));
    }
}