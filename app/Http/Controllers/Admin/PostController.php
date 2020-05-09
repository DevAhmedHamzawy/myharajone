<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

        $posts = Post::all();

        /*foreach($posts as $post){
            $post->sortName = post::getSort($post->sort_id);
            $post->offerName = post::getOffer($post->offer_id);
            $post->views = views($post)->unique()->count();
            $post->areaName = post::getMainArea($post->area_id);
            $post->adSort = post::checkAdSort($post->ad_sort_id);
            if($post->category == null) {  $post->category = new Category; $post->category->name = 'لا يوجد';  }
        }*/

        return DataTables::of($posts)->addIndexColumn()
        ->addColumn('action', function($row){

               //$btn = '<a href="'.route("posts.show", [$row->ad_sort_id, $row->name]).'" target="_blank" class="edit btn btn-primary btn-sm">عرض</a>';

               //return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);

        }

        return view('admin.posts.index');
    }

   

   


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}