<?php

namespace App\Http\Controllers\book;

use App\Http\Requests\AssessmentRequest;
use App\Models\BookModel;
use App\Models\ReaderModel;
use App\Services\book\AssessmentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssessementController extends Controller
{
    public function index()
    {
        $readers = ReaderModel::all();
        $books = BookModel::all();

        return view('book/assessment', ['readers' => $readers, 'books' => $books]);
    }

    public function store(AssessmentRequest $request, AssessmentService $service)
    {
        $service->save($request);

        $readers = ReaderModel::all();
        $books = BookModel::all();

        return view('book/assessment', ['readers' => $readers, 'books' => $books]);
    }
}
