<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        if($request->has('post_id')){
            return auth()->user() ?  Like::updateOrCreate(['user_id' => auth()->user()->id, 'post_id' => $request->post_id], ['like' => '1']) :  'الرجاء من فضلك تسجيل الدخول أو الإنضمام للموقع';
        }else{
            return auth()->user() ?  Like::updateOrCreate(['user_id' => auth()->user()->id, 'seller_id' => $request->seller_id], ['like' => '1']) :  'الرجاء من فضلك تسجيل الدخول أو الإنضمام للموقع';
        }
    }

    public function dislike(Request $request)
    {
        if($request->has('post_id')){
            return auth()->user() ?  Like::updateOrCreate(['user_id' => auth()->user()->id, 'post_id' => $request->post_id], ['like' => '-1']) :  'الرجاء من فضلك تسجيل الدخول أو الإنضمام للموقع';
        }else{
            return auth()->user() ?  Like::updateOrCreate(['user_id' => auth()->user()->id, 'seller_id' => $request->seller_id], ['like' => '-1']) :  'الرجاء من فضلك تسجيل الدخول أو الإنضمام للموقع';
        }
    }

    public function check(Request $request)
    {
        if($request->has('post_id')){
            return auth()->user() ? Like::whereUserId(auth()->user()->id)->wherePostId($request->post_id)->first() : 'الرجاء من فضلك تسجيل الدخول أو الإنضمام للموقع';
        }else{
            return auth()->user() ? Like::whereUserId(auth()->user()->id)->whereSellerId($request->seller_id)->first() : 'الرجاء من فضلك تسجيل الدخول أو الإنضمام للموقع';
        }
    }
}