<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books';

    public $timestamps = false;

    public function author()
    {
        return $this->hasOne('App\Models\AuthorModel', 'id');
    }

    public function edition()
    {
        return $this->hasOne('App\Models\EditionModel', 'id');
    }

    public function assessments()
    {
        return $this->hasMany('App\Models\AssessmentModel', 'book_id', 'id');
    }

    public function city()
    {
        return $this->hasOne('App\Models\CityModel', 'id');
    }

//    public function allReaders()
//    {
//        return $this->hasManyThrough('App\Models\ReaderModel', 'App\Models\AssessmentModel', 'reader_id', 'id', 'id');
//    }
}
