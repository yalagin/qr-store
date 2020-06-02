<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\image;
use Faker\Generator as Faker;

$factory->define(image::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'image_url' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'categories_id' => $faker->randomDigitNotNull,
        'products_id' => $faker->randomDigitNotNull
    ];
});
