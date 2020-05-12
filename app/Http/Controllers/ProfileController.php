<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{ 
    public function show(User $user)
    {
        return view('main.profile.show', ['user' => $user]);
    }
}
