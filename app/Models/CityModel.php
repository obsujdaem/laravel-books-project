<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'cities';
    protected $fillable = [
        'city_id'
    ];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo('App\Models\CountryModel');
    }

    public function edition()
    {
        return $this->belongsTo('App\Models\EditionModel');
    }
}
