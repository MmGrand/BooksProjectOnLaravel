<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class EditController extends Controller
{
    public function __invoke(Author $author)
    {
        $books = Book::paginate(10);
        return view('admin.author.edit', compact('author', 'books'));
    }
}
