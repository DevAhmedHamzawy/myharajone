<?php

namespace App\Http\Controllers;

use App\Category;
use App\EstatePost;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $childrenCategories = Category::getChildrenCategories($category->id);
        $childrenCategoriesOne = [];

        if($category->id == 1){
            foreach ($childrenCategories as $categorylist) {
                $childrenCategoriesOfCategory = Category::getChildrenCategories($categorylist->id);
                foreach ($childrenCategoriesOfCategory as $categorylist) {
                    array_push($childrenCategoriesOne, $categorylist->id);
                }
            }

        }elseif($category->parent_id == 1){
            foreach ($childrenCategories as $categorylist) {
                $childrenCategoriesOfCategory = Category::getChildrenCategories($categorylist->parent_id);
                foreach ($childrenCategoriesOfCategory as $categorylist) {
                    array_push($childrenCategoriesOne, $categorylist->id);
                }
            }
            $childrenCategories = Category::getChildrenCategories($category->parent_id);
        }else{

            $categoryParent = Category::whereId($category->parent_id)->first();
            if($categoryParent){
                if($categoryParent->parent_id != null){
                $childrenCategories = Category::getChildrenCategories($categoryParent->parent_id);
                $childrenCategoriesOfCategory = Category::getChildrenCategories($category->parent_id); 
                }else{
                    //$childrenCategories = Category::getChildrenCategories($category->parent_id);
                    $childrenCategoriesOfCategory = null;
                }
            }else{
                $childrenCategoriesOfCategory = null;
            }
        
            foreach ($childrenCategories as $categorylist) {
                array_push($childrenCategoriesOne, $categorylist->id);
            }
        }
        
        if($category->parent_id != null){
            if(empty($childrenCategoriesOne) || (!in_array($category->id, $childrenCategoriesOne)  && $category->parent_id != 1)) { 
                $posts = Post::whereIn('category_id',[$category->id])->paginate(6); 
                
            }else{
                $posts = Post::whereIn('category_id',$childrenCategoriesOne)->paginate(6);
            }
        }else{

            $posts = Post::whereIn('category_id',$childrenCategoriesOne)->paginate(6);
        }

        foreach ($posts as $post) {
            $post->areaName = Post::getMainArea($post->area_id);
            $post->views = views($post)->unique()->count();
        }

        $mainCategories = Category::whereParentId(null)->get();

        return view('main.posts.index', ['category' => $category, 'posts' => $posts, 'mainCategories' => $mainCategories , 'childrenCategories' => $childrenCategories, 'childrenCategoriesOfCategory' => $childrenCategoriesOfCategory , 'adSorts' => Post::getPossibleEnumValues('ad_sort'), 'priceSorts' => Post::getPossibleEnumValues('price_sort'), 'paymentSorts' => Post::getPossibleEnumValues('payment_sort'), 'destinations' => EstatePost::getPossibleEnumValues('destination'), 'sorts' => EstatePost::getPossibleEnumValues('sort'), 'contracts' => EstatePost::getPossibleEnumValues('contract')]);

    }

  
    public function children($id)
    {
        return Category::whereParentId($id)->get();
    }
}
