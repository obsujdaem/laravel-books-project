<?php

use Illuminate\Database\Seeder;
use App\Models\AuthorModel;
use App\Models\CityModel;
use App\Models\CountryModel;
use App\Models\EditionModel;
use App\Models\OwnerModel;
use App\Models\ReaderModel;

class FactoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        factory(AuthorModel::class, 10)->create();

        factory(CountryModel::class, 10)->create()->each(function ($city) {
            $city->cities()->save(factory(CityModel::class)->make());
        })->pluck('id')->toArray();

        factory(OwnerModel::class, 10)->create()->pluck('id')->toArray();

        $cities = CityModel::all();
        $owners = OwnerModel::all();

        $editions = factory(EditionModel::class, 10)->make()->each(function ($edition) use ($cities, $owners) {
            $edition->city_id = $cities->random()->id;
            $edition->owner_id = $owners->random()->id;

        })->toArray();

        EditionModel::insert($editions);

        factory(ReaderModel::class, 10)->create();
    }
}
