<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DateTime;
use Faker\Generator as Faker;

$factory->define(DateTime::class, function (Faker $faker) {

    return [
        'short_date' => $faker->word,
        'long_date' => $faker->word,
        'short_time' => $faker->word,
        'long_time' => $faker->word,
        'first_day_of_week' => $faker->word,
        'time_format' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
