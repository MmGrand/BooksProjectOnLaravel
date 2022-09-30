<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class ShowController extends Controller
{
    public function __invoke(Author $author)
    {
        $books = Book::paginate(10);
        return view('admin.author.show', compact('author', 'books'));
    }
}
