<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class ShowController extends Controller
{
    public function __invoke(Genre $genre)
    {
        $books = Book::paginate(10);
        return view('admin.genre.show', compact('genre', 'books'));
    }
}
