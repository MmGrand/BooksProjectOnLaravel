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

//Books route
//Route::group(['namespace'=>'App\HTTP\Controllers\Book'], function () {
//    Route::get("/books", 'IndexController')->name('book.index');
//    Route::get("/books/create", 'CreateController')->name('book.create');
//    Route::post("/books", 'StoreController')->name('book.store');
//    Route::get("/books/{book}", 'ShowController')->name('book.show');
//    Route::get("/books/{book}/edit", 'EditController')->name('book.edit');
//    Route::patch("/books/{book}", 'UpdateController')->name('book.update');
//    Route::delete("/books/{book}", 'DestroyController')->name('book.delete');
//});


//Authors route
//Route::group(['namespace'=>'App\HTTP\Controllers\Author'], function () {
//    Route::get("/authors", 'IndexController')->name('author.index');
//    Route::get("/authors/create", 'CreateController')->name('author.create');
//    Route::post("/authors", 'StoreController')->name('author.store');
//    Route::get("/authors/{author}", 'ShowController')->name('author.show');
//    Route::get("/authors/{author}/edit", 'EditController')->name('author.edit');
//    Route::patch("/authors/{author}", 'UpdateController')->name('author.update');
//    Route::delete("/authors/{author}", 'DestroyController')->name('author.delete');
//});


//Genres routes
//Route::group(['namespace'=>'App\HTTP\Controllers\Genre'], function () {
//    Route::get("/genres", 'IndexController')->name('genre.index');
//    Route::get("/genres/create", 'CreateController')->name('genre.create');
//    Route::post("/genres", 'StoreController')->name('genre.store');
//    Route::get("/genres/{genre}", 'ShowController')->name('genre.show');
//    Route::get("/genres/{genre}/edit", 'EditController')->name('genre.edit');
//    Route::patch("/genres/{genre}", 'UpdateController')->name('genre.update');
//    Route::delete("/genres/{genre}", 'DestroyController')->name('genre.delete');
//});


//Route::get("/books/update", 'App\Http\Controllers\BookController@update');
//Route::get("/books/delete", 'App\Http\Controllers\BookController@delete');
    Route::get("/", 'App\HTTP\Controllers\User\MainController@index')->name('user.index');

Route::group(['namespace'=>'App\HTTP\Controllers\User', 'prefix' => 'user'], function () {
    Route::get("/show_books", 'ShowBooksController')->name('user.show_books');
    Route::get("/show_books_author/", 'ShowBooksAuthorController')->name('user.show_books_author');
    Route::get("/search_book_id", 'SearchBookIdMainController')->name('user.search_book_id');
    Route::get("search_book_id/show_search_book", 'SearchBookIdController')->name('user.show_search_book');
    Route::get("/search_author_name", 'SearchAuthorNameController')->name('user.search_author_name');
    Route::get("search_author_name/show_search_author", 'ShowSearchAuthorController')->name('user.show_search_author');
    Route::get("/authors", 'ListAuthorsController')->name('user.list_authors');
    Route::get("/show_books_author/{book}/edit", 'EditController')->name('user.edit_book');
    Route::patch("/show_books_author/{book}", 'UpdateController')->name('user.update_book');
    Route::get("/edit", 'AuthorEditController')->name('user.edit_author');
    Route::patch("/{author}", 'AuthorUpdateController')->name('user.update_author');
    Route::delete("/show_books_author/{book}", 'DestroyController')->name('user.delete_book');
});

Route::group(['namespace'=>'App\HTTP\Controllers\Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get("/", 'MainController@index')->name('admin.index');
    Route::group(['namespace'=>'Book'], function () {
        Route::get("/books", 'IndexController')->name('admin.book.index');
        Route::get("/books/create", 'CreateController')->name('admin.book.create');
        Route::post("/books", 'StoreController')->name('admin.book.store');
        Route::get("/books/{book}", 'ShowController')->name('admin.book.show');
        Route::get("/books/{book}/edit", 'EditController')->name('admin.book.edit');
        Route::patch("/books/{book}", 'UpdateController')->name('admin.book.update');
        Route::delete("/books/{book}", 'DestroyController')->name('admin.book.delete');
    });
    Route::group(['namespace'=>'Author'], function () {
        Route::get("/authors", 'IndexController')->name('admin.author.index');
        Route::get("/authors/create", 'CreateController')->name('admin.author.create');
        Route::post("/authors", 'StoreController')->name('admin.author.store');
        Route::get("/authors/{author}", 'ShowController')->name('admin.author.show');
        Route::get("/authors/{author}/edit", 'EditController')->name('admin.author.edit');
        Route::patch("/authors/{author}", 'UpdateController')->name('admin.author.update');
        Route::delete("/authors/{author}", 'DestroyController')->name('admin.author.delete');
    });
    Route::group(['namespace'=>'Genre'], function () {
        Route::get("/genres", 'IndexController')->name('admin.genre.index');
        Route::get("/genres/create", 'CreateController')->name('admin.genre.create');
        Route::post("/genres", 'StoreController')->name('admin.genre.store');
        Route::get("/genres/{genre}", 'ShowController')->name('admin.genre.show');
        Route::get("/genres/{genre}/edit", 'EditController')->name('admin.genre.edit');
        Route::patch("/genres/{genre}", 'UpdateController')->name('admin.genre.update');
        Route::delete("/genres/{genre}", 'DestroyController')->name('admin.genre.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
