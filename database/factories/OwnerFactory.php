<?php

/** @var Factory $factory */

use App\Model;
use App\Models\OwnerModel;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(OwnerModel::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'patronymic' => $faker->titleFemale
    ];
});
