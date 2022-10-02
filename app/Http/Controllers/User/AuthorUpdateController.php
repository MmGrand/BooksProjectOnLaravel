<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Author\UpdateRequest;
use App\Http\Resources\User\AuthorResource;
use App\Models\Author;
use App\Models\Book;

class AuthorUpdateController extends BaseController
{
    public function __invoke(Author $author, UpdateRequest $request)
    {
        $data = $request->validated();
        $author->update($data);
        $author->fresh();
        return new AuthorResource($author);
       // return redirect()->route('user.index', $author->id);
    }
}
