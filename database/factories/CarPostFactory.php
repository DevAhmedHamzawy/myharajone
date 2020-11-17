<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CarPost;
use App\Post;
use Faker\Generator as Faker;

$factory->define(CarPost::class, function (Faker $faker) {
    static $i = 0;
    $posts = Post::whereBetween('category_id', [140,539])->pluck('id')->toArray();

    if($i < 100){

        return [
            'post_id' => $posts[$i++],
            'model' => $faker->numberBetween(1960,2020),
        ];

    }else{
        return [];
    }
});
