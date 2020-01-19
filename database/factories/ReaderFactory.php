<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ReaderModel;
use Faker\Generator as Faker;

$factory->define(ReaderModel::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'patronymic' => $faker->titleFemale
    ];
});
