<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Book\FilterRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);

        $books = Book::filter($filter)->paginate(10);
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.index', compact('books', 'authors', 'genres'));
    }
}
