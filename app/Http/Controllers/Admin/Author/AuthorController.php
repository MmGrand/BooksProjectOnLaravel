<?php

namespace App\Http\Controllers\Admin\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends BaseController
{
    public function Index()
    {
        $authors = Author::withCount('books')->paginate(10);
        $books = Book::paginate(10);
        return view('admin.author.index', compact('authors', 'books'));
    }

    public function Create()
    {
        $books = Book::paginate(10);
        return view('admin.author.create', compact('books'));
    }

    public function Destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.author.index');
    }

    public function Edit(Author $author)
    {
        $books = Book::paginate(10);
        return view('admin.author.edit', compact('author', 'books'));
    }

    public function Show(Author $author)
    {
        $books = Book::paginate(10);
        return view('admin.author.show', compact('author', 'books'));
    }

    public function Store(StoreRequest $request)
    {
        $data = $request->validated();
        Author::create($data);
        return redirect()->route('admin.author.index');
    }

    public function Update(Author $author, UpdateRequest $request)
    {
        $data = $request->validated();
        $author->update($data);
        return redirect()->route('admin.author.show', $author->id);
    }
}
