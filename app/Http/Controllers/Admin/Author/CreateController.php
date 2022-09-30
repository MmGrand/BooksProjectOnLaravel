<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Models\Book;

class CreateController extends Controller
{
    public function __invoke()
    {
        $books = Book::paginate(10);
        return view('admin.author.create', compact('books'));
    }
}
