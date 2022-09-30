<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class EditController extends Controller
{
    public function __invoke(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('book.edit', compact('book', 'authors', 'genres'));
    }
}
