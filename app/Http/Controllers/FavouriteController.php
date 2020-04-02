<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function store(Request $request)
    {
        if($request->has('post_id')){
            return auth()->user()->favourites()->wherePostId($request->post_id)->exists() ? auth()->user()->favourites()->wherePostId($request->post_id)->delete() : auth()->user()->favourites()->create($request->all());
        }elseif($request->has('seller_id')){
            return auth()->user()->favourites()->whereSellerId($request->seller_id)->exists() ? auth()->user()->favourites()->whereSellerId($request->seller_id)->delete() : auth()->user()->favourites()->create($request->all());
        }
    }
}
