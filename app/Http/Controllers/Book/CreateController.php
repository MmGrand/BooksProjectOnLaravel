<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Genre;

class CreateController extends Controller
{
    public function __invoke()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.create', compact('authors', 'genres'));
    }
}
