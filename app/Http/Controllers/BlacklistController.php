<?php

namespace App\Http\Controllers;

use App\Blacklist;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class BlacklistController extends Controller
{

  public function index()
  {
      return view('main.blacklist');
  }

  public function show(Request $request)
  {
    $user = User::whereName($request->blacklist)->first();
    if($user) { $result = Blacklist::whereUserId($user->id)->first(); }else{ $result = []; }
    $post = Post::whereCode($request->blacklist)->first();
    if($post) { $result1 = Blacklist::wherePostId($post->id)->first(); }else{ $result1 = []; }
    $results = array_merge($result, $result1->toArray());
    return $results;
  }
}
