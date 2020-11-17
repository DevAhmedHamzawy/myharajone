<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Settings;
use Faker\Generator as Faker;

$factory->define(Settings::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'logo1' => $faker->url,
        'logo2' => $faker->url,
        'lat' => $faker->latitude($min = -90, $max = 90),
        'lng' => $faker->longitude($min = -180, $max = 180),
        'address' => $faker->address,
        'telephone' => $faker->e164PhoneNumber(),
        'central' => $faker->e164PhoneNumber(),
        'fax' => $faker->e164PhoneNumber(),
        'postal_code' => $faker->numberBetween(1,50),
        'email' => $faker->email,
        'about' => $faker->paragraph(3),
        'terms' => $faker->paragraph(3),
        'services' => $faker->paragraph(3),
        'branches' => $faker->paragraph(3),
        'financial_fees' => $faker->paragraph(3),
        'payment_methods' => $faker->paragraph(3),
        'facebook' => $faker->url,
        'googleplus' => $faker->url,
        'youtube' => $faker->url,
        'twitter' => $faker->url,
        'telegram' => $faker->url,
        'whatsapp' => $faker->url,
        'snapchat' => $faker->url,
        'linkedin' => $faker->url,
        'play_store' => $faker->url,
        'app_store' => $faker->url,
        'microsoft_store' => $faker->url,
        'qr_code' => $faker->url,
    ];
});
