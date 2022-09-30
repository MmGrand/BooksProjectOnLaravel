<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class IndexController extends Controller
{
    public function __invoke()
    {
        $authors = Author::withCount('books')->paginate(10);
        $books = Book::paginate(10);
        return view('admin.author.index', compact('authors', 'books'));
    }
}
