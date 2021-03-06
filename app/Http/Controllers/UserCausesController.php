<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserCausesController extends Controller
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
     * Show user's causes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $user)
    {
        if(Auth::user()->id === (int) $user)
        {
            $user = Auth::user();

            $causes = $user->causes;

            return view('user.causes', compact('user', 'causes'));
        }
        else
        {
            return abort('404');
        }
    }
}