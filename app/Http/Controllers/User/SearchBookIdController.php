<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\FilterRequest;
use App\Http\Resources\User\DataBookIdResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class SearchBookIdController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $book = Book::find($request->get('book_id'));
        $authors = Author::all();
        $genres = Genre::all();
        return new DataBookIdResource($book);
        // return view('user.show_search_book', compact('book', 'authors', 'genres'));
    }
}
