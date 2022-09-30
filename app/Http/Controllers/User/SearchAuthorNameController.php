<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class SearchAuthorNameController extends Controller
{
    public function __invoke()
    {
        return view('user.search_author_name');
    }
}
