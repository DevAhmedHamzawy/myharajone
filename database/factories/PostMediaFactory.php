<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\PostMedia;
use Faker\Generator as Faker;

//$files = [];

$factory->define(PostMedia::class, function (Faker $faker) {
   
    static $i = 0;
    $posts = Post::all()->pluck('id')->toArray();

    /*for($i = 0; $i <= 8; $i++){
      array_push($files, $faker->image('public/storage/posts/'.$post->title.'/images',400,300, 'technics', false));
    }*/

    if($i < 400){

      return [
          'post_id' => $posts[$i++],
          'type' => 'صورة',
          'files' => serialize(["1.jpg","2.jpg","3.jpg","4.jpg","5.jpg","6.jpg","7.jpg","8.jpg","9.jpg","10.jpg","11.jpg","12.jpg","13.jpg","14.jpg","15.jpg","16.jpg"]), 
      ];

    }else{
      return [];
    }
});
