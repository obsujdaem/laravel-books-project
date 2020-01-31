<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditionModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'editions';

    public $timestamps = false;

    public function city()
    {
        return $this->hasOne('App\Models\CityModel', 'id');
    }

    public function owner()
    {
        return $this->hasOne('App\Models\OwnerModel', 'id', 'owner_id');
    }
}
