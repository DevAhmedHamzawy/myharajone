<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function welcome()
    {
        return view('main.welcome');
    }
   
    public function index()
    {
        return view('main.home');
    }
}
