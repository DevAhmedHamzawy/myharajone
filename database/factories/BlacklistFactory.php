<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blacklist;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Blacklist::class, function (Faker $faker) {
    return [
        //'post_id' => Post::all()->random()->id
        'user_id' => User::all()->random()->id
    ];
});
