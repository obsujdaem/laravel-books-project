<?php


namespace App\Services\book;


use App\Models\AssessmentModel;
use App\Models\BookModel;

class BooksService
{
    public function delete($id)
    {
        $assessments_books = AssessmentModel::where('book_id', $id);

        foreach ($assessments_books as $assessment) {
            $assessment->delete();
        }

        $book = BookModel::where('id', $id)->first();

        $book->delete();

        return;
    }
}
