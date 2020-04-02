<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Message extends Model
{
    protected $guarded = [];

    public static function getLastChatMessage($receiverUserId, $senderUserId)
    {
        $lastMessage = DB::table("messages")->where([['from',$receiverUserId], ['to',$senderUserId]])->orWhere([['to',$receiverUserId], ['from',$senderUserId]])->orderBy('created_at','DESC')->first();
        return $lastMessage;
    }

    public static function getAChatMessages($receiverUserId, $senderUserId)
    {
        $allMessages = DB::table("messages")->where([['from',$receiverUserId], ['to',$senderUserId]])->orWhere([['to',$receiverUserId], ['from',$senderUserId]])->orderBy('created_at')->get();
        return $allMessages;
    }
}
