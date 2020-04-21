<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function welcome()
    {
        $posts = Post::withCount(['likes', 'favourites' ,'dislikes', 'reports'])->orderByUniqueViews('desc')->orderByDesc('likes_count')->orderByDesc('favourites_count')->orderBy('dislikes_count')->orderBy('reports_count')->limit(10)->get();

        foreach ($posts as $post) {
            $post->areaName = Post::getMainArea($post->area_id);
            $post->views = views($post)->unique()->count();
        }

        $categories = Category::whereParentId(null)->get();

        foreach ($categories as $category) {
            $category->views = views($category)->unique()->count();
        }

        $areas = Area::whereParentId(1)->get();

        $trendingCategoriesSearch = Category::whereNotNull('parent_id')->orderByUniqueViews('desc')->limit(60)->get();

        return view('main.welcome', ['trendingPosts' => $posts, 'categories' => $categories, 'areas' => $areas, 'trends' => $trendingCategoriesSearch]);
    }
   
    public function index()
    {
        return view('main.home');
    }
}
