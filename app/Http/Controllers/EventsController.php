<?php

namespace App\Http\Controllers;

use App\Event;
use Auth, Storage;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Events Index
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $events = Event::upcoming()->get();

        return view('events.index', compact('events'));
    }

    /**
     * Create Event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Add User Validation

        $user = Auth::user();

        return view('events.create', compact('user'));
    }

    /**
     * Store Event
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|width:200|height:234',
            'event_url' => 'required|url',
            'scheduled_at' => 'required|date|after:yesterday',
        ]);

        $image_path = Storage::putFile('events', $request->image);
        $image_url = Storage::url($image_path);

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $image_url,
            'event_url' => $request->event_url,
            'scheduled_at' => $request->scheduled_at,
        ]);
    }

    /**
     * Destroy Event
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event)
    {
        // Add User Validation

        $event = Event::findOrFail($event);
        $event->delete();

        return 'OK';
    }
}