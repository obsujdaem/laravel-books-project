<?php

use App\Models\AuthorModel;
use App\Models\CityModel;
use App\Models\CountryModel;
use App\Models\EditionModel;
use App\Models\OwnerModel;
use App\Models\ReaderModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            //
        ]);

        factory(AuthorModel::class, 10)->create();

        $cityIds = factory(CountryModel::class, 10)->create()->each(function ($city) {
            $city->cities()->save(factory(CityModel::class)->make());
        })->pluck('id')->toArray();

        $ownerIds = factory(OwnerModel::class, 10)->create()->pluck('id')->toArray();

        $editions = factory(EditionModel::class, 10)->make()->each(function ($edition) use ($cityIds, $ownerIds) {
            $edition->city_id = rand(1, count($cityIds));
            $edition->owner_id = rand(1, count($ownerIds));

        })->toArray();

        EditionModel::insert($editions);

        factory(ReaderModel::class, 10)->create();
    }
}
