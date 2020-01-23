<?php

namespace App\Http\Controllers\book;

use App\Services\book\AddBookService;
use App\Http\Requests\addBookRequest;
use App\Models\AuthorModel;
use App\Models\EditionModel;
use Illuminate\Routing\Controller;

class AddBookController extends Controller
{
    public function index()
    {
        $authors = AuthorModel::all();
        $editions = EditionModel::all();

        return view('book/addBook', [
            'authors' => $authors,
            'editions' => $editions
        ]);
    }

    public function store(addBookRequest $request, AddBookService $service)
    {

        $service->save($request);

        $authors = AuthorModel::all();
        $editions = EditionModel::all();

        return view('book/addBook', [
            'authors' => $authors,
            'editions' => $editions
        ]);
    }
}
