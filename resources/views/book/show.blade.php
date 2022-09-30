@extends('layouts.main')
@section('title')
    Книги
@endsection
@section('content')
    <div>
        <div><b>Название: </b>{{ $book->name }}</div>
        <div><b>Описание:</b> {{ $book->description }}</div>
    </div>
    <div>
        <a href="{{ route('book.edit', $book->id) }}">Изменить</a>
    </div>
    <div>
        <form action="{{ route('book.delete', $book->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-primary">
        </form>
    </div>
    <div>
        <a href="{{ route('book.index') }}">Вернуться назад</a>
    </div>
@endsection
