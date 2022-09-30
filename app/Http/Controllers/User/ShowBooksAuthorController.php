<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\FilterRequest;
use App\Models\Book;

class ShowBooksAuthorController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $books = Book::all();
        return view('user.show_books_author', compact('books'));
    }
}
