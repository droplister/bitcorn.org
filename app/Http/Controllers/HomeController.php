<?php

namespace App\Http\Controllers;

use App\Cause;
use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $causes = Cause::popular()->take(6)->get();
        $events = Event::upcoming()->take(4)->get();
        $now = Carbon::now();

        return view('home.index', compact('causes', 'events', 'now'));
    }
}