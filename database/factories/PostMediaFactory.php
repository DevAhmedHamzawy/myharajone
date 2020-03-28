<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\PostMedia;
use Faker\Generator as Faker;

$files = [];
static $i = 1;
$posts = Post::all()->pluck('id')->toArray();
$factory->define(PostMedia::class, function (Faker $faker) use ($files,$i,$posts) {
   
    $post = Post::findOrFail($posts[$i++]);

    for($i = 0; $i <= 8; $i++){
      array_push($files, $faker->image('public/storage/posts/'.$post->title.'/images',400,300, 'technics', false));
    }

    return [
        'post_id' => $post->id,
        'type' => 'صورة',
        'files' => serialize($files), 
    ];
});
