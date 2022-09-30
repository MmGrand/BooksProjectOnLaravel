<?php

namespace App\Http\Controllers\User;

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

        return view('user.edit_book', compact('book', 'authors', 'genres'));
    }
}
