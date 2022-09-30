@extends('layouts.main')
@section('title')
    Поиск книги по Id
@endsection
@section('content')
    <div>
        <form action="{{ route('user.show_search_book') }}" method="get">
            @csrf
            <div class="mb-3">
                <label for="book_id_key" class="form-label">book_id</label>
                <input type="text" name="book_id" class="form-control" id="book_id">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Найти</button>
        </form>
        <div>
            <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
        </div>
    </div>
@endsection
