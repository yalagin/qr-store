<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vat;
use Faker\Generator as Faker;

$factory->define(Vat::class, function (Faker $faker) {

    return [
        'code' => $faker->word,
        'Description' => $faker->text,
        'Percentage' => $faker->word,
        'is_sales' => $faker->randomDigitNotNull,
        'is_purchase' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
