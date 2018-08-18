<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Contact\StoreRequest;

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
     * @param  \App\Http\Requests\Contact\StoreRequest
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $email = new ContactEmail($request->name, $request->email, $request->message);

        Mail::to(config('bitcorn.contact_email'))->send($email);

        return redirect(route('contact.create'))
            ->with('success', 'Success - Email Sent');
    }
}
