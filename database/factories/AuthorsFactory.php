<?php

/** @var Factory $factory */

use App\Model;
use App\Models\AuthorModel;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(AuthorModel::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'patronymic' => $faker->titleMale
    ];
});
