<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class ShowController extends Controller
{
    public function __invoke(Book $book)
    {
        $books = Book::paginate(10);
        return view('admin.book.show', compact('books', 'book'));
    }
}
