<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'books';
    protected $fillable = [
      'name', 'author_id', 'year', 'edition_id'
    ];

    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo(AuthorModel::class);
    }

    public function edition()
    {
        return $this->belongsTo(EditionModel::class);
    }

    public function assessments()
    {
        return $this->hasMany(AssessmentModel::class, 'book_id', 'id');
    }

    public function readers()
    {
        return $this->hasMany(ReaderModel::class, 'reader_id', 'book_id');
    }
}
