@extends('layouts.admin')
@section('title')
    ShowGenres
@endsection
@section('content')
    <div>
        <div>{{ $genre->id }}. {{ $genre->genre }}</div>
        <div><b>Описание:</b> {{ $genre->description }}</div>
    </div>
    <div>
        <a href="{{ route('admin.genre.edit', $genre->id) }}">Изменить</a>
    </div>
    <div>
        <form action="{{ route('admin.genre.delete', $genre->id) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Удалить" class="btn btn-primary">
        </form>
    </div>
    <div>
        <a href="{{ route('admin.genre.index') }}">Вернуться назад</a>
    </div>
@endsection
