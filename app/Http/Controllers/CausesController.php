<?php

namespace App\Http\Controllers;

use App\Cause;
use Illuminate\Http\Request;

class CausesController extends Controller
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
     * Causes Index
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $active_causes = Cause::popular()->get();
        $ended_causes = Cause::ended()->get();

        return view('causes.index', compact('active_causes', 'ended_causes'));
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

        return view('causes.create');
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
            //
        ]);
    }

    /**
     * Destroy Cause
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $cause
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $cause)
    {
        // Add User Validation

        $cause = Cause::findOrFail($cause);
        $cause->delete();

        return 'OK';
    }
}
