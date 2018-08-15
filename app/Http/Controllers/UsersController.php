<?php

namespace App\Http\Controllers;

use Auth, Storage;
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
            'email' => 'required|string|email|max:255|unique:users,email,' . (int) $user,
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|dimensions:width=400,height=400',
            'twitter_url' => 'sometimes|nullable|url|max:255',
            'website_url' => 'sometimes|nullable|url|max:255',
            'location' => 'sometimes|nullable|max:255',
            'description' => 'sometimes|nullable|max:255',
        ]);

        if(Auth::user()->id === (int) $user)
        {
            if($request->has('image'))
            {
                $image_path = Storage::putFile('public/users', $request->image);
                $image_url = Storage::url($image_path);

                $request->merge(['image_url' => url($image_url)]);
            }

        	Auth::user()->update($request->all());
        }
        else
        {
            return abort('404');
        }

        return redirect(route('dashboard.index'))->with('success', 'Profile Updated');
    }
}