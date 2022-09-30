@extends('layouts.main')
@section('title')
    Пользовательская панель
@endsection
@section('content')
    <div class="list-group">
        <a href="{{ route('user.show_books') }}" class="list-group-item list-group-item-action">Получение списка книг с именем автора</a>
        <a href="{{ route('user.search_book_id') }}" class="list-group-item list-group-item-action">Получение данных книги по id</a>
        @can('viewUser', auth()->user())
        <a href="{{ route('user.show_books_author') }}" class="list-group-item list-group-item-action">Обновление данных книги</a>
        <a href="{{ route('user.show_books_author') }}" class="list-group-item list-group-item-action">Удаление книги</a>
        @endcan
        <a href="{{ route('user.list_authors') }}" class="list-group-item list-group-item-action">Получение списка авторов с указанием количества книг</a>
        <a href="{{ route('user.search_author_name') }}" class="list-group-item list-group-item-action">Получение данных автора со списком книг</a>
        @can('viewUser', auth()->user())
        <a href="{{ route('user.edit_author') }}" class="list-group-item list-group-item-action">Обновление данных автора</a>
        @endcan
    </div>

@endsection
