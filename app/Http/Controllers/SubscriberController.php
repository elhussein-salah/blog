<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $data = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        // Create a new subscriber in the database
        Subscriber::create($data);

        // Send a confirmation email to the subscriber
        // Mail::to($subscriber->email)->send(new ConfirmationEmail($subscriber));

        // Redirect to a success page
        return back()->with('status','subscribed Successfully');

        // dd($request->all());
    }
}
