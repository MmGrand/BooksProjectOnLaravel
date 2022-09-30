<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class DestroyController extends Controller
{
    public function __invoke(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index');
    }
}
