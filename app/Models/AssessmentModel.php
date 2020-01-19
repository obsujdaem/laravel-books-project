<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'assessments';

    public $timestamps = false;

    public function readers()
    {
        return $this->hasMany('App\Models\ReaderModel', 'reader_id');
    }

    public function books()
    {
        return $this->hasMany('App\Models\BookModel', 'book_id');
    }
}
