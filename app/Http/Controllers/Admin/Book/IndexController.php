<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class IndexController extends Controller
{
    public function __invoke()
    {
        $books = Book::paginate(10);
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.book.index', compact('books', 'authors', 'genres'));
    }
}
