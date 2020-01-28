<?php

namespace App\Services\book;

use App\Models\AssessmentModel;
use App\Models\BookModel;

class AddBookService
{
    public function save($request)
    {

        $book = new BookModel();

        $book->name = $request->name;
        $book->author_id = $request->author;
        $book->year = $request->year;
        $book->edition_id = $request->edition;

        $book->save();

        return;
    }
}
