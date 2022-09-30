<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;

class IndexController extends Controller
{
    public function __invoke()
    {
        $books = Book::paginate(10);
        $genres = Genre::paginate(10);

        return view('admin.genre.index', compact('genres', 'books'));
    }
}
