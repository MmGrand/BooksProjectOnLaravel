<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;
use App\Models\Book;

class AuthorUpdateController extends BaseController
{
    public function __invoke(Author $author, UpdateRequest $request)
    {
        $data = $request->validated();
        $author->update($data);
        return redirect()->route('user.index', $author->id);
    }
}
