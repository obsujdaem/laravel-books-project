<?php

namespace App\Services;

use App\Models\AssessmentModel;
use App\Models\BookModel;
use Illuminate\Support\Facades\DB;

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

        $assessment = new AssessmentModel();

        $assessment->assessment = $request->assessment;
        $assessment->book_id = $book->id;
        $assessment->reader_id = $request->reader;

        $assessment->save();

        BookModel::where('id', "$book->id")->update(['assessment_id' => $assessment->id]);

        return;
    }
}
