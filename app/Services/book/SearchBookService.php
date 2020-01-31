<?php


namespace App\Services\book;

use App\Models\BookModel;

class SearchBookService
{
    public function searchAction($request)
    {
        $select = BookModel::select('books.*');

        switch ($request->filter) {
            case 'authors':
                return $select
                    ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
                    ->where('authors.name', 'like', "%" . $request->search . "%")
                    ->orWhere('authors.surname', 'like', "%" . $request->search . "%")
                    ->get();

            case 'countries':
                return $select
                    ->leftJoin('editions', 'books.edition_id', '=', 'editions.id')
                    ->leftJoin('cities', 'editions.city_id', '=', 'cities.id')
                    ->leftJoin('countries', 'countries.id', '=', 'cities.country_id')
                    ->where('countries.name', 'like', "%" . $request->search . "%")
                    ->get();

            case 'cities':
                return $select
                    ->leftJoin('editions', 'books.edition_id', '=', 'editions.id')
                    ->leftJoin('cities', 'editions.city_id', '=', 'cities.id')
                    ->where('cities.name', 'like', "%" . $request->search . "%")
                    ->get();

            case 'editions':
                return $select
                    ->leftJoin('editions', 'books.edition_id', '=', 'editions.id')
                    ->where('editions.name', 'like', "%" . $request->search . "%")
                    ->get();

            case 'owners':
                return $select
                    ->leftJoin('editions', 'books.edition_id', '=', 'editions.id')
                    ->leftJoin('owners', 'editions.owner_id', '=', 'owners.id')
                    ->where('owners.name', 'like', "%" . $request->search . "%")
                    ->orWhere('owners.surname', 'like', "%" . $request->search . "%")
                    ->get();

            case 'readers':
                return $select
                    ->leftJoin('assessments', 'books.id', '=', 'assessments.book_id')
                    ->leftJoin('readers', 'assessments.reader_id', '=', 'readers.id')
                    ->where('readers.name', 'like', "%" . $request->search . "%")
                    ->orWhere('readers.surname', 'like', "%" . $request->search . "%")
                    ->get();

            default:
                dd('choose another filter');
        }
    }
}
