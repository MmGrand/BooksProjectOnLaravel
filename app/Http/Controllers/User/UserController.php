<?php

namespace App\Http\Controllers\User;

use App\Http\Filters\BookFilter;
use App\Http\Requests\Author\UpdateRequest;
use App\Http\Requests\Book\FilterRequest;
use App\Http\Resources\User\AuthorByNameResource;
use App\Http\Resources\User\AuthorResource;
use App\Http\Resources\User\AuthorsWithCountBooksResource;
use App\Http\Resources\User\BookResource;
use App\Http\Resources\User\BooksWithAuthorResource;
use App\Http\Resources\User\DataBookIdResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function AuthorEdit()
    {
        $author = Author::find(auth()->user()->id);
        return view('user.edit_author', compact('author'));
    }

    public function AuthorUpdate(Author $author, UpdateRequest $request)
    {
        $data = $request->validated();
        $author->update($data);
        $author->fresh();
        return new AuthorResource($author);
        // return redirect()->route('user.index', $author->id);
    }

    public function DestroyBook(Book $book)
    {
        $book->delete();
        return new BookResource($book);
        //return redirect()->route('user.show_books_author');
    }

    public function EditBook(Book $book)
    {
        $authors = Author::all();
        $genres = Genre::all();

        return view('user.edit_book', compact('book', 'authors', 'genres'));
    }

    public function ListOfAuthors()
    {
        $authors = Author::withCount('books')->paginate(5);
        return AuthorsWithCountBooksResource::collection($authors);
        // return view('user.list_authors', compact('authors'));
    }

    public function index() {
        return view('user.index');
    }

    public function SearchAuthorName()
    {
        return view('user.search_author_name');
    }

    public function SearchBookId(Book $book)
    {
        return view('user.search_book_id');
    }

    public function ShowBookId(FilterRequest $request)
    {
        $book = Book::find($request->get('book_id'));
        $authors = Author::all();
        $genres = Genre::all();
        return new DataBookIdResource($book);
        // return view('user.show_search_book', compact('book', 'authors', 'genres'));
    }

    public function ShowBooksAuthor()
    {
        $books = Book::all();
        $user = Auth::user();
        return view('user.show_books_author', compact('books', 'user'));
    }

    public function ShowBooks(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);

        $books = Book::filter($filter)->paginate(10);
        $authors = Author::all();
        return BooksWithAuthorResource::collection($books);
        // return view('user.show_books', compact('books', 'authors'));
    }

    public function ShowSearchAuthor(FilterRequest $request)
    {
        $books = Book::all();
        $author = Author::where('author', $request->get('author_name'))->first();
        return new AuthorByNameResource($author);
        // return view('user.show_search_author', compact('books', 'author'));
    }

    public function UpdateBook(Book $book, \App\Http\Requests\Book\UpdateRequest $request)
    {
        $data = $request->validated();
        $book = $this->service->update($book, $data);
        return new BookResource($book);
        // return redirect()->route('user.show_books_author');
    }
}
