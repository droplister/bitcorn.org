<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonateController extends Controller
{
    /**
     * Show the donate page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('donate.index');
    }
}
