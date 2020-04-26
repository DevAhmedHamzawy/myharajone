<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendNewsLetterMessage;
use App\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsLetterController extends Controller
{
    public function index()
    {
        return view('admin.newsletter.index', ['newsletters' => NewsLetter::all()]);
    }

    public function store(Request $request)
    {
        $ids= rtrim($request->formIds,',');
        $idsArray=explode(',',$ids);

        foreach($idsArray as $id){
            $newsletter=NewsLetter::findOrFail($id);
            Mail::to($newsletter->email)->send(new SendNewsLetterMessage($newsletter->name,auth()->user()->name,$request->message));
        }

        //Mail::to($request->receiver_email)->send(new SendNewsLetterMessage($request->name, $request->receiver_name, $request->message));
    }
}
