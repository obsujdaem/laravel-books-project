<?php

namespace App\Http\Controllers\book;

use App\Http\Requests\EditBookRequest;
use App\Models\AuthorModel;
use App\Models\BookModel;
use App\Http\Controllers\Controller;
use App\Models\EditionModel;
use App\Services\book\BooksService;

class BooksController extends Controller
{
    public function index()
    {
        $books = BookModel::all();

        return view('book/books', ['books' => $books, 'sum' => null]);
    }

    public function delete($bookId, BooksService $id)
    {
        $id->delete($bookId);

        $books = BookModel::all();

        return view('book/books', ['books' => $books, 'sum' => null]);
    }

    public function detailed($bookId)
    {
        $book = BookModel::where('id', $bookId)->first();

        return view('book/book', ['book' => $book, 'sum' => null]);
    }

    public function edit($bookId)
    {
        $book = BookModel::where('id', $bookId)->first();
        $authors = AuthorModel::all();
        $editions = EditionModel::all();
        return view('book/edit', compact('book', 'authors', 'editions'));
    }

    public function update(EditBookRequest $request, BooksService $service)
    {
        $service->update($request);

        return redirect()->route('books.list');
    }
}
