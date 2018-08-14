<?php

namespace App\Http\Controllers;

use Auth;
use App\Election;
use App\Candidate;
use Illuminate\Http\Request;

class ElectionCandidatesController extends Controller
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
     * Create Candidate
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer $election
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $election)
    {
        $request->validate([
            'content' => 'required|min:10|max:5000',
            'terms' => 'required',
        ]);

        $election = Election::findOrFail($election);

        if($election->candidates()->where('user_id', '=', Auth::user()->id)->exists())
        {
            return back()->with('error', 'You are already a candidate!');
        }

        $candidate = Candidate::create([
            'election_id' => $election->id,
            'user_id' => Auth::user()->id,
            'memo' => 'Candidate ' . $election->candidates()->count(),
            'content' => $request->content,
        ]);

        return redirect(route('elections.show', ['election' => $election->id]))
            ->with('success', 'You are now a candidate!');
    }
}