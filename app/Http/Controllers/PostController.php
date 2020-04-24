<?php

namespace App\Http\Controllers;

use App\CarPost;
use App\Category;
use App\EstatePost;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Illusion Category Object
        $category = new Category;
        $category->parent_id = null;

        $posts = Post::inRandomOrder()->paginate(6);
        foreach ($posts as $post) {
            $post->areaName = Post::getMainArea($post->area_id);
            $post->views = views($post)->unique()->count();
        }
        $mainCategories = Category::whereParentId(null)->get();
        return view('main.posts.index', ['posts' => $posts, 'category' => $category, 'mainCategories' => $mainCategories, 'childrenCategories' => [], 'childrenCategoriesOne' => [], 'adSorts' => Post::getPossibleEnumValues('ad_sort'), 'priceSorts' => Post::getPossibleEnumValues('price_sort'), 'paymentSorts' => Post::getPossibleEnumValues('payment_sort'), 'destinations' => EstatePost::getPossibleEnumValues('destination'), 'sorts' => EstatePost::getPossibleEnumValues('sort'), 'contracts' => EstatePost::getPossibleEnumValues('contract')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.posts.create', ['mainCategories' => Category::whereParentId(null)->get(), 'adSorts' => Post::getPossibleEnumValues('ad_sort'), 'priceSorts' => Post::getPossibleEnumValues('price_sort'), 'paymentSorts' => Post::getPossibleEnumValues('payment_sort'), 'destinations' => EstatePost::getPossibleEnumValues('destination'), 'sorts' => EstatePost::getPossibleEnumValues('sort'), 'contracts' => EstatePost::getPossibleEnumValues('contract')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['code' => rand(10,50000), 'user_id' => auth()->user()->id, 'position' => Post::count()+1, 'visible' => 'نعم']);
        if($request->show_contact_telephone1 == "on"){ $request->merge(['show_contact_telephone1' => 'نعم']); }else{ $request->merge(['show_contact_telephone1' => 'لا']); }
        if($request->show_contact_telephone2 == "on"){ $request->merge(['show_contact_telephone2' => 'نعم']); }else{ $request->merge(['show_contact_telephone2' => 'لا']); }
        if($request->show_contact_email == "on"){ $request->merge(['show_contact_email' => 'نعم']); }else{ $request->merge(['show_contact_email' => 'لا']); }

        $post = Post::create($request->except('_token','main_category','latlng','destination','sort','contract','model'));
        $request->merge(['post_id' => $post->id]);

        if($request->main_category == 1){
            CarPost::create($request->only('post_id','model'));
        }elseif ($request->main_category == 2) {
            $latlngArray = explode(',' , $request->input('latlng'));
            $request->merge(['lat' => $latlngArray[0] , 'lng' => $latlngArray[1]]);
            EstatePost::create($request->only('post_id','lat','lng','destination','sort','contract'));
        }

        return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Record a view
        views($post)->record();
        
        // get Category Object;
        $category = Category::findOrFail($post->category_id);
        views($category)->record();

        $parentCategory = Category::findOrfail($category->parent_id);
        views($parentCategory)->record();

        if($parentCategory->parent_id == 1){
            $parentCategory = Category::findOrfail($parentCategory->parent_id);
            views($parentCategory)->record();
        }


       

        $post->areaName = Post::getMainArea($post->area_id);
        $views = views($post)->unique()->count();
        return view('main.posts.show', compact('post','views'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('main.posts.edit', ['post' => $post, 'mainCategories' => Category::whereParentId(null)->get(), 'adSorts' => Post::getPossibleEnumValues('ad_sort'), 'priceSorts' => Post::getPossibleEnumValues('price_sort'), 'paymentSorts' => Post::getPossibleEnumValues('payment_sort'), 'destinations' => EstatePost::getPossibleEnumValues('destination'), 'sorts' => EstatePost::getPossibleEnumValues('sort'), 'contracts' => EstatePost::getPossibleEnumValues('contract')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->merge(['code' => rand(10,50000), 'user_id' => auth()->user()->id, 'position' => Post::count()+1, 'visible' => 'نعم']);
        if($request->show_contact_telephone1 == "on"){ $request->merge(['show_contact_telephone1' => 'نعم']); }else{ $request->merge(['show_contact_telephone1' => 'لا']); }
        if($request->show_contact_telephone2 == "on"){ $request->merge(['show_contact_telephone2' => 'نعم']); }else{ $request->merge(['show_contact_telephone2' => 'لا']); }
        if($request->show_contact_email == "on"){ $request->merge(['show_contact_email' => 'نعم']); }else{ $request->merge(['show_contact_email' => 'لا']); }

        $post->update($request->except('_token','main_category','latlng','destination','sort','contract','model'));
        $request->merge(['post_id' => $post->id]);

        // reminder .... maybe id of car or estate will not be existed in 
        // the main post table
        // delete it automatically
        if($request->main_category == 1){
            CarPost::updateOrCreate(['id' => $post->id],$request->only('post_id','model'));
        }elseif ($request->main_category == 2) {
            $latlngArray = explode(',' , $request->input('latlng'));
            $request->merge(['lat' => $latlngArray[0] , 'lng' => $latlngArray[1]]);
            EstatePost::updateOrCreate(['id' => $post->id],$request->only('post_id','lat','lng','destination','sort','contract'));
        }

        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
