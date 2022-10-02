<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\FilterRequest;
use App\Http\Resources\User\AuthorByNameResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class ShowSearchAuthorController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $books = Book::all();
        $author = Author::where('author', $request->get('author_name'))->first();
        return new AuthorByNameResource($author);
        // return view('user.show_search_author', compact('books', 'author'));
    }
}
