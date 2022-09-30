<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\UpdateRequest;
use App\Models\Genre;

class UpdateController extends BaseController
{
    public function __invoke(Genre $genre, UpdateRequest $request)
    {
        $data = $request->validated();
        $genre->update($data);
        return redirect()->route('genre.show', $genre->id);
    }
}
