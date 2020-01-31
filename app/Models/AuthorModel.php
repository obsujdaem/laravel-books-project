<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'authors';

    public $timestamps = false;
}
