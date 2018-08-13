<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
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
     * Update the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        if(Auth::user()->id === $user)
        {
        	Auth::user()->update($request->all());
        }
        else
        {
            return back()->with('error', 'Access Denied');
        }

        return back()->with('success', 'Profile Updated');
    }
}