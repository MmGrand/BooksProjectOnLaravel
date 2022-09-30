<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;

class DestroyController extends Controller
{
    public function __invoke(Book $book)
    {
        $book->delete();
        return redirect()->route('user.show_books_author');
    }
}
