<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show($sort)
    {
       switch ($sort) {
           case 'about':
               return view('main.pages.show' , ['content' => Settings::whereId(1)->first()->about]);
            case 'terms':
                return view('main.pages.show' , ['content' => Settings::whereId(1)->first()->terms]);
            case 'policy':
                return view('main.pages.show' , ['content' => Settings::whereId(1)->first()->policy]);
            case 'services':
                return view('main.pages.show' , ['content' => Settings::whereId(1)->first()->services]);
            default:
                abort(404);
       }
    }

}
