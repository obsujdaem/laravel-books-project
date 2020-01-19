<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditionModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'editions';

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\Models\CityModel', 'city_id');
    }

    public function owners()
    {
        return $this->hasMany('App\Models\OwnerModel', 'owner_id');
    }
}
