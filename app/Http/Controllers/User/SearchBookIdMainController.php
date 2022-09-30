<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class SearchBookIdMainController extends Controller
{
    public function __invoke(Book $book)
    {
        return view('user.search_book_id');
    }
}
