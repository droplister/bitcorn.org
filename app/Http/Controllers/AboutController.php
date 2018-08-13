<?php

namespace App\Http\Controllers;

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
        $data = file_get_contents('https://bitcorns.com/api/info');
        $data = json_decode($data, true);

        $last_election = Election::latest('decided_at')->first();
        $users = $last_election ? $last_election->candidates()->elected()->get() : [];

        return view('about.index', compact('data', 'users'));
    }
}
