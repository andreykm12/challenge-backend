<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AnalyticTypeModel;
use Faker\Generator as Faker;

$factory->define(AnalyticTypeModel::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'units'             => $faker->text(20),
        'is_numeric'        => $faker->numberBetween(0, 1),
        'num_decimal_place' => $faker->text(20),
    ];
});
