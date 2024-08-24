<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request){

        // Validate the request data
        $data = $request->validated();
        Contact::create($data);

        return redirect()->route('theme.contact')->with('success', 'Your message has been sent successfully.');
        // dd($request->all());
    }
}
