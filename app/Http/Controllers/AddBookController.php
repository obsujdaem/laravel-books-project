<?php

namespace App\Http\Controllers;

use App\Http\Requests\addBookRequest;
use App\Models\AuthorModel;
use App\Models\EditionModel;
use App\Models\ReaderModel;
use App\Services\AddBookService;

class AddBookController extends Controller
{
    public function index()
    {
        $authors = AuthorModel::all();
        $editions = EditionModel::all();
        $readers = ReaderModel::all();

        return view('addBook', [
            'authors' => $authors,
            'editions' => $editions,
            'readers' => $readers
        ]);
    }

    public function store(addBookRequest $request, AddBookService $service)
    {
        $service->save($request);

        $authors = AuthorModel::all();
        $editions = EditionModel::all();
        $readers = ReaderModel::all();

        return view('addBook', [
            'authors' => $authors,
            'editions' => $editions,
            'readers' => $readers
        ]);
    }
}
