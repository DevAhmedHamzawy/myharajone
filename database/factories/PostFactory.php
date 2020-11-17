<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use App\Category;
use App\Post;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    //حراج السيارات
    //$category_id = Category::whereBetween('parent_id', [5,56])->inRandomOrder()->first()->id;
    //$tags = Category::whereParentId($category_id)->orWhere('parent_id', 1)->orWhereBetween('parent_id', [5,56])->inRandomOrder()->get()->pluck('id')->toArray();
    //$services = Category::whereParentId($category_id)->orWhere('parent_id', 1)->orWhereBetween('parent_id', [5,56])->inRandomOrder()->get()->pluck('id')->toArray();

    //حراج العقار
    //$category_id = Category::whereBetween('id', [57,71])->inRandomOrder()->first()->id;
    //$tags = Category::whereParentId($category_id)->orWhere('parent_id', 2)->orWhereBetween('parent_id', [57,71])->inRandomOrder()->get()->pluck('id')->toArray();
    //$services = Category::whereParentId($category_id)->orWhere('parent_id', 2)->orWhereBetween('parent_id', [57,71])->inRandomOrder()->get()->pluck('id')->toArray();

    //حراج الأجهزة
    //$category_id = Category::whereBetween('id', [72,114])->inRandomOrder()->first()->id;
    //$tags = Category::whereParentId($category_id)->orWhere('parent_id', 3)->orWhereBetween('parent_id', [72,114])->inRandomOrder()->get()->pluck('id')->toArray();
    //$services = Category::whereParentId($category_id)->orWhere('parent_id', 3)->orWhereBetween('parent_id', [72,114])->inRandomOrder()->get()->pluck('id')->toArray();

    //كل الحراج 
    $category_id = Category::whereBetween('id', [115,139])->inRandomOrder()->first()->id;
  
    return [
        'code' => $faker->numberBetween(1,10000),
        'area_id' => function(){ return Area::whereNotNull('parent_id')->whereNotNull('name')->get()->random()->id; },
        'user_id' => function(){ return User::all()->random()->id; },
        'category_id' => $category_id,
        'title' => $faker->sentence(1),
        'body' => $faker->paragraph(3),
        'telephone1' => $faker->e164PhoneNumber(),
        'telephone2' => $faker->e164PhoneNumber(),
        'email' => $faker->email,
        'show_contact_telephone1' => $faker->randomElement(['نعم','لا']),
        'show_contact_telephone2' => $faker->randomElement(['نعم','لا']),
        'show_contact_email' => $faker->randomElement(['نعم','لا']),
        'position' => $faker->numberBetween(1,50),
        'visible' => $faker->randomElement(['نعم','لا']),
        'price' => $faker->numberBetween(100,500),
        'ad_sort' => $faker->randomElement(['للبيع','للإيجار','مهم','مطلوب عاجل','للإستثمار']),
        'price_sort' => $faker->randomElement(['اخرى','تعامل مباشر','غير قابل للتفاوض','على السوم','قابل للتفاوض']),
        'payment_sort' => $faker->randomElement(['نقداً','أقساط شهرية','على دفعات','شيك مصدق','أخرى']),
        //'deleted_at' => Carbon::now(),
    ];
});
