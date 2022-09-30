<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class ListAuthorsController extends Controller
{
    public function __invoke()
    {
        $authors = Author::withCount('books')->paginate(10);
        return view('user.list_authors', compact('authors'));
    }
}
