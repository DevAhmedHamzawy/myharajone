<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function store(ContactFormRequest $request)
    {
        Contact::create($request->all());
        return 'ok';
    }

    public function show()
    {
        return view('main.contact');
    }
}
