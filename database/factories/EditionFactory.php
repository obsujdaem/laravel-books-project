<?php

/** @var Factory $factory */

use App\Model;
use App\Models\CityModel;
use App\Models\EditionModel;
use App\Models\OwnerModel;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(EditionModel::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'city_id' => function () {
            return \factory(CityModel::class)->make()->id;
        },
        'owner_id' => function () {
            return \factory(OwnerModel::class)->make()->id;
        }
    ];
});
