@extends('layouts.main')
@section('title')
    Поиск автора по имени
@endsection
@section('content')
    <div>
        <form action="{{ route('user.show_search_author') }}" method="get">
            @csrf
            <div class="mb-3">
                <label for="author_name_key" class="form-label">Введите имя автора:</label>
                <input type="text" name="author_name" class="form-control" id="author_name">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Найти</button>
        </form>
        <div>
            <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
        </div>
    </div>
@endsection
