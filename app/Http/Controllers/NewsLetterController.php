<?php

namespace App\Http\Controllers;

use App\NewsLetter;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:news_letters|string|email|max:191',
        ]);

        NewsLetter::create($request->all());
        return 'OK';
    }
}
