<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class AuthorEditController extends Controller
{
    public function __invoke()
    {
        $author = Author::find(auth()->user()->id);
        return view('user.edit_author', compact('author'));
    }
}
