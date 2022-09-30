<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;

class DestroyController extends Controller
{
    public function __invoke(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('admin.genre.index');
    }
}