<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EstatePost;
use App\Post;
use Faker\Generator as Faker;

$factory->define(EstatePost::class, function (Faker $faker) {
    static $i = 0;
    $posts = Post::whereBetween('category_id', [57,71])->pluck('id')->toArray();


    return [
        'post_id' => $posts[$i++],
        'lat' => $faker->latitude($min = -90, $max = 90),
        'lng' => $faker->longitude($min = -180, $max = 180),
        'destination' => $faker->randomElement(['جنوب غرب','جنوب شرق','شمال غرب','شمال شرق','غرب','شرق','جنوب','شمال']),
        'sort' => $faker->randomElement(['سكنى تجارى','تجارى','سكنى','زراعى','أخرى']),
        'contract' => $faker->randomElement(['عقد على الشيوع','عقد فردى','عقد عرفى','عقد ملكية','أخرى'])
    ];
});
