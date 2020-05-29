<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Products;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'main_description' => $faker->text,
        'additional_description' => $faker->text,
        'minor_description' => $faker->text,
        'main_product' => $faker->word,
        'price' => $faker->word,
        'vat_code' => $faker->word,
        'active' => $faker->word,
        'sold_out' => $faker->word,
        'ean' => $faker->word,
        'is_receipt' => $faker->word,
        'is_kitchen' => $faker->word,
        'is_sticker' => $faker->word,
        'is_deal' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
