<?php

namespace App\Http\Controllers;

use Notification;
use App\Mail\ContactEmail;
use App\Notifications\EmailReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Contact Create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('contact.create');
    }

    /**
     * Handle Contact
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        Mail::to('bitcorncrops+contact@gmail.com')
            ->send(new ContactEmail($request->name, $request->email, $request->message));

        Notification::route('telegram', config('bitcorn.foundation_chatroom'))
            ->notify(new EmailReceived($request->name, $request->email, $request->message));

        return redirect(route('contact.create'))->with('success', 'Email Sent');
    }
}
