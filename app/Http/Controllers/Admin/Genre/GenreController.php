<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\StoreRequest;
use App\Http\Requests\Genre\UpdateRequest;
use App\Models\Book;
use App\Models\Genre;

class GenreController extends BaseController
{
    public function Index()
    {
        $books = Book::paginate(10);
        $genres = Genre::paginate(10);

        return view('admin.genre.index', compact('genres', 'books'));
    }

    public function Create()
    {
        $books = Book::paginate(10);
        return view('admin.genre.create', compact('books'));
    }

    public function Destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('admin.genre.index');
    }

    public function Edit(Genre $genre)
    {
        $books = Book::paginate(10);
        return view('admin.genre.edit', compact('genre', 'books'));
    }

    public function Show(Genre $genre)
    {
        $books = Book::paginate(10);
        return view('admin.genre.show', compact('genre', 'books'));
    }

    public function Store(StoreRequest $request)
    {
        $data = $request->validated();
        Genre::create($data);
        return redirect()->route('admin.genre.index');
    }

    public function Update(Genre $genre, UpdateRequest $request)
    {
        $data = $request->validated();
        $genre->update($data);
        return redirect()->route('admin.genre.show', $genre->id);
    }
}
