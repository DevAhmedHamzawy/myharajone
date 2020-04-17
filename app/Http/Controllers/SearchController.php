<?php

namespace App\Http\Controllers;

use App\Filters\AreaFilter;
use App\Filters\CategoryFilter;
use App\Filters\TitleFilter;
use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getFilters()
    {
        //dd(request()->all());
        $posts = Post::filter($this->filters())->paginate(6);
        $views = 0;

        $html = view('main.posts.includes.index.posts', compact('posts','views'))->render();

        return response()->json(compact('html'));

        //return view('main.posts.index', compact('posts'));
    }

    protected function filters()
    {
        return [
            'title' => new TitleFilter,
            'category' => new CategoryFilter,
            'area' => new AreaFilter,
            
        ];
    }
}
