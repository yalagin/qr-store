<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Currency;
use Faker\Generator as Faker;

$factory->define(Currency::class, function (Faker $faker) {

    return [
        'currency_symbol' => $faker->word,
        'position_of_symbol' => $faker->word,
        'decimal_symbol' => $faker->word,
        'decimal_digits' => $faker->word,
        'digital_grouping_symbol' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
