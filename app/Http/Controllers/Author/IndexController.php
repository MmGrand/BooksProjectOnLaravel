<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class IndexController extends Controller
{
    public function __invoke()
    {
        $authors = Author::withCount('books')->paginate(5);
        return view('author.index', compact('authors'));
    }
}
