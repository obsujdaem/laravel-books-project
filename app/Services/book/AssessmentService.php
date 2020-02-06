<?php


namespace App\Services\book;


use App\Models\AssessmentModel;

class AssessmentService
{
    public function save($request)
    {
        $assessment = new AssessmentModel();

        $assessment->assessment = $request->rate;
        $assessment->reader_id = $request->reader_id;
        $assessment->book_id = $request->book_id;

        $assessment->save();

        return;
    }
}
