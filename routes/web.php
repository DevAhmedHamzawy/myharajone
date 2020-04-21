<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// DON'T Put it inside the '/admin' Prefix , Otherwise you'll never get the page due to assign.guard that will redirect you too many times
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

Route::group(['prefix' => '/admin','middleware' => 'assign.guard:admin,admin/login'],function(){

    Route::get('dashboard', function () {
        dd(auth()->user());
    });

});


Auth::routes();


//After User Authenticated & Verified
Route::group(['middleware' => 'verified'], function (){

    Route::get('/home', 'HomeController@index')->name('home');


});

Route::get('/', 'HomeController@welcome');
Route::resource('/posts', 'PostController');
Route::post('/sendcomment', 'CommentController@store');
Route::post('/sendmessage', 'MessageController@store');


//Post Like & Dislike
Route::post('like', 'LikeController@like');
Route::post('dislike', 'LikeController@dislike');
Route::post('check', 'LikeController@check');

Route::resource('favourites', 'FavouriteController', ['only' => ['store']]);
Route::post('reportpost', 'ReportController@store');

 //Messages Inbox
 Route::get('{user}/messages', 'MessageController@index')->name('inbox');

 //Show Messages
 Route::get('{user}/{from}/{to}/messages', 'MessageController@show')->name('messages.show');

 //Search
 Route::post('search', 'SearchController@getFilters')->name('search');

 //Category Children
 Route::get('category_children/{id}', 'CategoryController@children')->name('category-children');

 //Show Areas
 Route::get('areas/{area}' , 'AreaController@show')->name('areas.show');

 Route::get('blacklist' , 'BlacklistController@index')->name('blacklist');

 Route::post('blacklist' , 'BlacklistController@show')->name('blacklist.show');

 Route::post('results' , 'SearchController@welcomeSearch')->name('welcome-search');