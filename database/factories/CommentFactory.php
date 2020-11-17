<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    static $i = 0;
    static $j = 0;
    $comments = Comment::all();
    $posts = Post::where('id' , '>' , '300')->get();

    if($i < 100){

        return [
            'post_id' => $posts[$i++],
            'name' => $faker->name,
            'email' => $faker->email,
            'website' => $faker->url,
            'body' => $faker->paragraph() 
        ];

    }
});
