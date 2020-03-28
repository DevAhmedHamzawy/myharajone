<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use App\Profile;
use App\User;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    static $i = 0;
    $users = User::all()->pluck('id')->toArray();


    return [
        'user_id' => $users[$i++],
        'area_id' => function(){ return Area::whereNotNull('parent_id')->whereNotNull('name')->get()->random()->id; },
        'code' => $faker->numberBetween(1,10000),
        'mobile' => $faker->e164PhoneNumber(),
        'telephone' => $faker->e164PhoneNumber(),
        'email' => $faker->email,
        'website' => $faker->url,
    ];
});
