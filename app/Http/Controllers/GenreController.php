<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();

        return view('genre.index', compact('genres'));
    }

    public function create()
    {
        return view('genre.create');
    }

    public function store()
    {
        $data = request()->validate([
            'genre' => 'string',
            'description' => 'string',
        ]);
        Genre::create($data);
        return redirect()->route('genre.index');
    }

    public function show(Genre $genre)
    {
        return view('genre.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    public function update(Genre $genre)
    {
        $data = request()->validate([
            'genre' => 'string',
            'description' => 'string',
        ]);
        $genre->update($data);
        return redirect()->route('genre.show', $genre->id);
    }

    public function delete()
    {
        $genre = Genre::find(1);
        $genre->delete();
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre.index');
    }

    public function restore()
    {
        $genre = Genre::withTrashed()->find(1);
        $genre->restore();
    }
}
