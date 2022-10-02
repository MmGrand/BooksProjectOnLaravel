<?php

namespace App\Services\Book;

use App\Models\Book;

class Service
{
    public function store($data)
    {
        $genres = $data['genres'];
        unset($data['genres']);
        $book = Book::create($data);

        $book->genres()->attach($genres);
    }

    public function update($book, $data)
    {
        $genres = $data['genres'];
        unset($data['genres']);
        $book->update($data);
        $book->genres()->sync($genres);
        return $book->fresh();
    }
}
