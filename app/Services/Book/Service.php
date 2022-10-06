<?php

namespace App\Services\Book;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            if (isset($data['genres'])) {
                $genres = $data['genres'];
                unset($data['genres']);
            }
        $book = Book::create($data);

            if(isset($genres)) {
                $book->genres()->attach($genres);
            }
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
    }

    public function update($book, $data)
    {
        try {
            Db::beginTransaction();
            if (isset($data['genres'])) {
                $genres = $data['genres'];
                unset($data['genres']);
            }
        $book->update($data);
            if(isset($genres)) {
                $book->genres()->sync($genres);
            }
            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            abort(500);
        }
        return $book->fresh();
    }
}
