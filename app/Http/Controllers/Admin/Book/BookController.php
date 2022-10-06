<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class BookController extends BaseController
{
    public function Index()
    {
        $books = Book::paginate(10);
        $authors = Author::all();
        $genres = Genre::all();
        return view('admin.book.index', compact('books', 'authors', 'genres'));
    }

    public function Create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        $books = Book::paginate(10);
        return view('admin.book.create', compact('authors', 'genres', 'books'));
    }

    public function Destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.book.index');
    }

    public function Edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $books = Book::paginate(10);

        return view('admin.book.edit', compact('book', 'authors', 'genres', 'books'));
    }

    public function Show(Book $book)
    {
        $books = Book::paginate(10);
        return view('admin.book.show', compact('books', 'book'));
    }

    public function Store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);


        return redirect()->route('admin.book.index');
    }

    public function Update(Book $book, UpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->update($book, $data);

        return redirect()->route('admin.book.show', $book->id);
    }
}
