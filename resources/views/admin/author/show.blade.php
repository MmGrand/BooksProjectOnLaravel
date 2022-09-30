@extends('layouts.admin')
@section('title')
    ShowAuthors
@endsection
@section('content')
    <div>
        <div>{{ $author->id }}. {{ $author->author }}</div>
        <div><b>Описание:</b> {{ $author->description }}</div>
        <div><b>Дата рождения:</b> {{ $author->date_of_birth }}</div>
    </div>
    <div>
        <a href="{{ route('admin.author.edit', $author->id) }}">Изменить</a>
    </div>
    <div>
        <form action="{{ route('admin.author.delete', $author->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-primary">
        </form>
    </div>
    <div>
        <a href="{{ route('admin.author.index') }}">Вернуться назад</a>
    </div>
@endsection
