<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\Filters\AdSortFilter;
use App\Filters\AreaFilter;
use App\Filters\CategoryFilter;
use App\Filters\ContractFilter;
use App\Filters\DestinationFilter;
use App\Filters\PaymentSortFilter;
use App\Filters\PriceFilter;
use App\Filters\PriceSortFilter;
use App\Filters\SortFilter;
use App\Filters\TitleFilter;
use App\Post;
use App\EstatePost;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getFilters()
    {
        //dd(request()->all());
        $posts = Post::filter($this->filters())->paginate(6);
        foreach ($posts as $post) {
            $post->areaName = Post::getMainArea($post->area_id);
            $post->views = views($post)->unique()->count();
        }

        $html = view('main.posts.includes.index.posts', compact('posts','views'))->render();

        return response()->json(compact('html'));

        //return view('main.posts.index', compact('posts'));
    }

    public function welcomeSearch(Request $request)
    {
        // Illusion Category Object
        $category = new Category;
        $category->parent_id = null;

        //dd($request->all());
        $posts = Post::filter($this->filters())->paginate(6);
        foreach ($posts as $post) {
            $post->areaName = Post::getMainArea($post->area_id);
            $post->views = views($post)->unique()->count();
        }
        $mainCategories = Category::whereParentId(null)->get();
        //'adSorts' => Post::getPossibleEnumValues('ad_sort'), 'priceSorts' => Post::getPossibleEnumValues('price_sort'), 'paymentSorts' => Post::getPossibleEnumValues('payment_sort'), 'destinations' => EstatePost::getPossibleEnumValues('destination'), 'sorts' => EstatePost::getPossibleEnumValues('sort'), 'contracts' => EstatePost::getPossibleEnumValues('contract')
        return view('main.posts.index', ['posts' => $posts, 'category' => $category, 'mainCategories' => $mainCategories, 'childrenCategories' => [], 'childrenCategoriesOne' => [], 'adSorts' => Post::getPossibleEnumValues('ad_sort'), 'priceSorts' => Post::getPossibleEnumValues('price_sort'), 'paymentSorts' => Post::getPossibleEnumValues('payment_sort'), 'destinations' => EstatePost::getPossibleEnumValues('destination'), 'sorts' => EstatePost::getPossibleEnumValues('sort'), 'contracts' => EstatePost::getPossibleEnumValues('contract')]);
    }

    protected function filters()
    {
        return [
            'area_id' => new AreaFilter,
            'category_id' => new CategoryFilter,
            'title' => new TitleFilter,
            'price' => new PriceFilter,
            'price_sort' => new PriceSortFilter,
            'ad_sort' => new AdSortFilter,
            'payment_sort' => new PaymentSortFilter,
            'destination' => new DestinationFilter,
            'sort' => new SortFilter,
            'contract' => new ContractFilter,
        ];
    }

    
}
