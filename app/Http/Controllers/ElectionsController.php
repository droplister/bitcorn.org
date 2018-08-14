<?php

namespace App\Http\Controllers;

use Auth;
use App\Asset;
use App\Event;
use App\Election;
use Illuminate\Http\Request;

class ElectionsController extends Controller
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
     * Create Election
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Add User Validation

        $user = Auth::user();

        $assets = Asset::whereType('vote')
            ->doesntHave('election')
            ->get();

        return view('elections.create', compact('user', 'assets'));
    }

    /**
     * Store Election
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Add User Validation

        $request->validate([
            'name' => 'required|max:255|unique:events',
            'description' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:width=200,height=234',
            'asset_id' => 'required|exists:assets,id',
            'scheduled_at' => 'required|date|after:yesterday',
        ]);

        $image_path = Storage::putFile('public/elections', $request->image);
        $image_url = Storage::url($image_path);

        $event = Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $image_url,
            'scheduled_at' => $request->scheduled_at,
        ]);

        $election = Election::create([
            'event_id' => $event->id,
            'asset_id' => $request->asset_id,
        ]);

        $event->update([
            'event_url' => route('elections.show', ['election' => $election->id])
        ]);

        return redirect(route('elections.create'))->with('success', 'Election Created');
    }
}
