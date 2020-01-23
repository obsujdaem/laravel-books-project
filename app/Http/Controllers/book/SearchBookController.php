<?php

namespace App\Http\Controllers\book;

use App\Http\Requests\SearchBookRequest;
use App\Http\Controllers\Controller;
use App\Services\book\SearchBookService;

class SearchBookController extends Controller
{
    private const TABLES = [
        'authors', 'cities', 'countries', 'editions', 'owners', 'readers'
    ];

    public function index()
    {
        return view('book/search', ['tables' => self::TABLES, 'result' => null]);
    }

    public function search(SearchBookRequest $request, SearchBookService $service)
    {
        $result = $service->searchAction($request);

        return view('book/search', ['tables' => self::TABLES, 'result' => $result]);
    }
}
