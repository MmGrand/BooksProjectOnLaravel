<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Book\FilterRequest;
use App\Http\Resources\User\BooksWithAuthorResource;
use App\Models\Author;
use App\Models\Book;

class ShowBooksController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);

        $books = Book::filter($filter)->paginate(10);
        $authors = Author::all();
        return BooksWithAuthorResource::collection($books);
        // return view('user.show_books', compact('books', 'authors'));
    }
}
