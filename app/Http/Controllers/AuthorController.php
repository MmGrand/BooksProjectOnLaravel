<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();

        return view('author.index', compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store() {
        $data = request()->validate([
            'author'=> 'string',
            'description'=> 'string',
            'date_of_birth'=> 'date',
        ]);
        Author::create($data);
        return redirect()->route('author.index');
    }

    public function show(Author $author) {
        return view('author.show', compact('author'));
    }

    public function edit(Author $author) {
        return view('author.edit', compact('author'));
    }

    public function update(Author $author)
    {
        $data = request()->validate([
            'author'=> 'string',
            'description'=> 'string',
            'date_of_birth'=> 'date',
        ]);
        $author->update($data);
        return redirect()->route('author.show', $author->id);
    }

    public function delete()
    {
        $author = Author::find(1);
        $author->delete();
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index');
    }

    public function restore()
    {
        $author = Author::withTrashed()->find(1);
        $author->restore();
    }
}
