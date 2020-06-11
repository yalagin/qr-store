<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Options;
use Faker\Generator as Faker;

$factory->define(Options::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'input_type' => $faker->randomElement(['check-box', 'radio-button', 'drop-down']),
        'min' => $faker->numberBetween(1,20),
        'max' => $faker->numberBetween(1,20),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
