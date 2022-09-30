@extends('layouts.admin')
@section('title')
    ShowBooks
@endsection
@section('content')
    <div>
        <div><b>Название: </b>{{ $book->name }}</div>
        <div><b>Описание:</b> {{ $book->description }}</div>
    </div>
    <div>
        <a href="{{ route('admin.book.edit', $book->id) }}">Изменить</a>
    </div>
    <div>
        <form action="{{ route('admin.book.delete', $book->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-primary">
        </form>
    </div>
    <div>
        <a href="{{ route('admin.book.index') }}">Вернуться назад</a>
    </div>
@endsection
