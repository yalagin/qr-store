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
        'main_product' => $faker->boolean,
        'price' => $faker->numberBetween(1,400),
        'vat_code' => $faker->randomNumber(),
        'active' => $faker->boolean,
        'sold_out' => $faker->boolean,
        'ean' => $faker->word,
        'is_receipt' => $faker->boolean,
        'is_kitchen' => $faker->boolean,
        'is_sticker' => $faker->boolean,
        'is_deal' => $faker->boolean,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
