<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    protected $connection = 'mysql';

    protected $table = 'user_token';

    protected $fillable = [
        'user_id', 'token', 'created_at'
    ];

    public $timestamps = false;
}
