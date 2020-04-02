<?php

namespace App\Http\Controllers;

use App\Advertiser;
use App\Http\Requests\MessageFormRequest;
use App\Message;
use App\Notifications\MessageNotification;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $ids =  Message::whereFrom(auth()->user()->id)->whereNotNull('to')->orderByDesc('created_at')->pluck('from','to');
       if(!$ids->isEmpty()){
            $messages = [];
            $i = 0;
            foreach($ids as $key => $value){
                if($i == 0) { $firstId = $key; }
                array_push($messages, Message::getLastChatMessage(auth()->user()->id, $key));
                $i++;
            }
        }else{
            $messages = [];
            $firstId = null;
        }
       
       return view('main.messages.index', ['messages' => $messages, 'latestmessage' => Message::getAChatMessages(auth()->user()->id, $firstId)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageFormRequest $request)
    {
        //if($request->name == 'owner'){ $advertiser = Advertiser::findOrFail(auth()->user()->id); $request->merge(['name' => $advertiser->name, 'mobile' => $advertiser->mobile1, 'email' => $advertiser->email]); }
        !auth()->user() ? : $request->merge(['from' => auth()->user()->id]);
        $message = Message::create($request->all());
        //$reciever = User::findOrFail($request->to);
        //$reciever->notify(new MessageNotification($request->from, $request->to, $request->body));
        return $message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($user, $from, $to)
    {
        $temp = '';
        if( $to ==  auth()->user()->id ) { $temp = $from; $from = $to; $to = $temp; }
        return Message::getAChatMessages(auth()->user()->id, $to);
    }
}