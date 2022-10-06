<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Api routes
Route::group(['namespace'=>'App\HTTP\Controllers\User', 'prefix' => 'user'], function () {
    Route::get("/show_books", 'UserController@ShowBooks')->name('user.show_books');
    Route::get("search_book_id/show_search_book", 'UserController@ShowBookId')->name('user.show_search_book');
    Route::get("search_author_name/show_search_author", 'UserController@ShowSearchAuthor')->name('user.show_search_author');
    Route::get("/authors", 'UserController@ListOfAuthors')->name('user.list_authors');
    Route::patch("/show_books_author/{book}", 'UserController@UpdateBook')->name('user.update_book');
    Route::patch("/{author}", 'UserController@AuthorUpdate')->name('user.update_author');
    Route::delete("/show_books_author/{book}", 'UserController@DestroyBook')->name('user.delete_book');
});
