<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'assessments';

    public $timestamps = false;

    public function reader()
    {
        return $this->hasOne('App\Models\ReaderModel', 'id', 'reader_id');
    }

    public function books()
    {
        return $this->hasMany('App\Models\BookModel', 'book_id');
    }
}
