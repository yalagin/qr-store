<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\categories;
use Faker\Generator as Faker;

$factory->define(categories::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'active' => $faker->randomDigitNotNull,
        'excluding_discounts' => $faker->randomDigitNotNull,
        'product_remark' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
