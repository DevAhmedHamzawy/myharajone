<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class BlackListController extends Controller
{
    public function blacklist($id, $type)
    {
        if($type == 'post'){
            Post::whereId($id)->update(['blacklist' => 1]);
        }else{
            User::whereId($id)->update(['blacklist' => 1]);
        }

        return redirect()->back();

    }

    public function unblacklist($id, $type)
    {
        if($type == 'post'){
            Post::whereId($id)->update(['blacklist' => 0]);
        }else{
            User::whereId($id)->update(['blacklist' => 0]);
        }

        return redirect()->back();

    }
}