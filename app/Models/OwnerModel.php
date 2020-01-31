<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'owners';
    protected $fillable = [
        'owner_id'
    ];
    public $timestamps = false;

    public function edition()
    {
        return $this->belongsTo('App\Models\EditionModel');
    }
}
