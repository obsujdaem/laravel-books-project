<?php

/** @var Factory $factory */

use App\Model;
use App\Models\CountryModel;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CountryModel::class, function (Faker $faker) {
    return [
        'name' => $faker->country
    ];
});
