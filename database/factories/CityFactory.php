<?php

/** @var Factory $factory */

use App\Model;
use App\Models\CityModel;
use App\Models\CountryModel;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CityModel::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'country_id' => function () {
            return \factory(CountryModel::class)->make()->id;
        }
    ];
});
