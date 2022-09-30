<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class IndexController extends Controller
{
    public function __invoke()
    {
        $genres = Genre::paginate(5);

        return view('genre.index', compact('genres'));
    }
}
