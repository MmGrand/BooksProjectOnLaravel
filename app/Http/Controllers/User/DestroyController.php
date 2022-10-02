<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\BookResource;
use App\Models\Author;
use App\Models\Book;

class DestroyController extends Controller
{
    public function __invoke(Book $book)
    {
        $book->delete();
        return new BookResource($book);
        //return redirect()->route('user.show_books_author');
    }
}
