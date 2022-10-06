<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// web routes
    Route::get("/", 'App\HTTP\Controllers\User\UserController@index')->name('user.index');

Route::group(['namespace'=>'App\HTTP\Controllers\User', 'prefix' => 'user'], function () {
    Route::get("/show_books_author", 'UserController@ShowBooksAuthor')->name('user.show_books_author');
    Route::get("/search_book_id", 'UserController@SearchBookId')->name('user.search_book_id');
    Route::get("/search_author_name", 'UserController@SearchAuthorName')->name('user.search_author_name');
    Route::get("/show_books_author/{book}/edit", 'UserController@EditBook')->name('user.edit_book');
    Route::get("/edit", 'UserController@AuthorEdit')->name('user.edit_author');
});

Route::group(['namespace'=>'App\HTTP\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get("/", 'MainController@index')->name('admin.index');
    Route::group(['namespace'=>'Book', 'prefix' => 'books'], function () {
        Route::get("/", 'BookController@Index')->name('admin.book.index');
        Route::get("/create", 'BookController@Create')->name('admin.book.create');
        Route::post("/", 'BookController@Store')->name('admin.book.store');
        Route::get("/{book}", 'BookController@Show')->name('admin.book.show');
        Route::get("/{book}/edit", 'BookController@Edit')->name('admin.book.edit');
        Route::patch("/{book}", 'BookController@Update')->name('admin.book.update');
        Route::delete("/{book}", 'BookController@Destroy')->name('admin.book.delete');
    });
    Route::group(['namespace'=>'Author', 'prefix' => 'authors'], function () {
        Route::get("/", 'AuthorController@Index')->name('admin.author.index');
        Route::get("/create", 'AuthorController@Create')->name('admin.author.create');
        Route::post("/", 'AuthorController@Store')->name('admin.author.store');
        Route::get("/{author}", 'AuthorController@Show')->name('admin.author.show');
        Route::get("/{author}/edit", 'AuthorController@Edit')->name('admin.author.edit');
        Route::patch("/{author}", 'AuthorController@Update')->name('admin.author.update');
        Route::delete("/{author}", 'AuthorController@Destroy')->name('admin.author.delete');
    });
    Route::group(['namespace'=>'Genre', 'prefix' => 'genres'], function () {
        Route::get("/", 'GenreController@Index')->name('admin.genre.index');
        Route::get("/create", 'GenreController@Create')->name('admin.genre.create');
        Route::post("/", 'GenreController@Store')->name('admin.genre.store');
        Route::get("/{genre}", 'GenreController@Show')->name('admin.genre.show');
        Route::get("/{genre}/edit", 'GenreController@Edit')->name('admin.genre.edit');
        Route::patch("/{genre}", 'GenreController@Update')->name('admin.genre.update');
        Route::delete("/{genre}", 'GenreController@Destroy')->name('admin.genre.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
