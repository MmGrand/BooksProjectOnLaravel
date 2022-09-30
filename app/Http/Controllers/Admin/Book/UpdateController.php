<?php

namespace App\Http\Controllers\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\FilterRequest;
use App\Models\Author;
use App\Models\Book;

class UpdateController extends BaseController
{
    public function __invoke(Book $book, FilterRequest $request)
    {
        $data = $request->validated();

        $this->service->update($book, $data);

        return redirect()->route('admin.book.show', $book->id);
    }
}
