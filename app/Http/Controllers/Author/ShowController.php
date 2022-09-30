<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class ShowController extends Controller
{
    public function __invoke(Author $author)
    {
        return view('author.show', compact('author'));
    }
}
