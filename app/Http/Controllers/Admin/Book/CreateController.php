<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class CreateController extends Controller
{
    public function __invoke()
    {
        $authors = Author::all();
        $genres = Genre::all();
        $books = Book::paginate(10);
        return view('admin.book.create', compact('authors', 'genres', 'books'));
    }
}
