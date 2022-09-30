<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
            #ManyToMany
//        $book = Book::find(1);
//        dd($book->genres);
           #OneToMany
//        $author = Author::find(1);
//        dd($author->books);

        $books = Book::all();

        return view('book.index', compact('books'));
    }

    public function create()
        # Cначала в массив записываем данные, а потом через цикл всё добавляем в базу
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.create', compact('authors', 'genres'));
//        $booksArr = [
//            [
//                'name' => 'Война и мир',
//                'description' => '«Война и мир» (рус. дореф. «Война и миръ») — роман-эпопея Льва Николаевича Толстого, описывающий русское общество в эпоху войн против Наполеона в 1805—1812 годах. Эпилог романа доводит повествование до 1820 года.',
//                'author' => 'Толстой Л.Н.',
//                'genre' => 'роман-эпопея',
//            ]
//        ];
//
//        foreach ($booksArr as $item) {
//            Book::create($item);
//        }
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'author' => 'string',
            'genre' => 'string',
            'author_id' => '',
            'genres' => '',
        ]);
        $genres = $data['genres'];
        unset($data['genres']);
        $book = Book::create($data);

        $book->genres()->attach($genres);
                #Непрофессиональный метод
        //        foreach ($genres as $genre) {
//            BookGenre::firstOrCreate([
//                'genre_id' => $genre,
//                'book_id' => $book->id,
//            ]);
//        }
        return redirect()->route('book.index');
    }

    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('book.edit', compact('book', 'authors', 'genres'));
    }

    public function update(Book $book)
        # Выбираем объект по айди и меняем данные на заданные, необязательно всё выбирать
    {
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'author' => 'string',
            'genre' => 'string',
            'author_id' => '',
            'genres' => '',
        ]);
        $genres = $data['genres'];
        unset($data['genres']);

        $book->update($data);
        $book->genres()->sync($genres);
        return redirect()->route('book.show', $book->id);
//        $book = Book::find(1);
//
//        $book->update([
//            'name' => ' ',
//            'description' => '',
//            'author' => '',
//            'genre' => '',
//        ]);
    }

    public function delete()
        # Выбираем объект по айди и удаляем его в мусорку
    {
        $book = Book::find(1);
        $book->delete();
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }

    public function restore()
        # Выбираем объект по айди и проверяем есть ли он в мусорке, тогда восстанавливаем
    {
        $book = Book::withTrashed()->find(1);
        $book->restore();
    }


}
