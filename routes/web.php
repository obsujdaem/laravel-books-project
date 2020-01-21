<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\book\AddBookController;
use App\Http\Controllers\book\AssessementController;
use App\Http\Controllers\book\BooksController;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BooksController::class, 'index'])->name('books.list');
Route::get('/books/{id}/delete', [BooksController::class, 'delete'])->name('books.list.delete');
Route::get('/books/{id}/detailed', [BooksController::class, 'detailed'])->name('books.list.detailed');

Route::get('/books/add', [AddBookController::class, 'index'])->name('books.add');
Route::post('/books/add', [AddBookController::class, 'store']);

Route::get('/books/rate', [AssessementController::class, 'index'])->name('books.rate');
Route::post('/books/rate', [AssessementController::class, 'store']);
