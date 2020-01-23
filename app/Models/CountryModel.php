<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'countries';

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\Models\CityModel', 'country_id');
    }
}
