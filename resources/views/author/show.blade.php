@extends('layouts.main')
@section('title')
    Авторы
@endsection
@section('content')
    <div>
        <div>{{ $author->id }}. {{ $author->author }}</div>
        <div><b>Описание:</b> {{ $author->description }}</div>
        <div><b>Дата рождения:</b> {{ $author->date_of_birth }}</div>
    </div>
    <div>
        <a href="{{ route('author.edit', $author->id) }}">Изменить</a>
    </div>
    <div>
        <form action="{{ route('author.delete', $author->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-primary">
        </form>
    </div>
    <div>
        <a href="{{ route('author.index') }}">Вернуться назад</a>
    </div>
@endsection
