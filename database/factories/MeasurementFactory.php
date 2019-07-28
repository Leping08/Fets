<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Measurement;
use Faker\Generator as Faker;

$factory->define(Measurement::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(\App\User::class)->create()->id;
        },
        'calories_burned' => $faker->numberBetween(100, 1000),
        'calories_eaten' => $faker->numberBetween(500, 1500),
        'weight' => $faker->randomFloat(2, 100,200),
        'date' => $faker->dateTimeBetween('-14 days', '+0 days')
    ];
});
