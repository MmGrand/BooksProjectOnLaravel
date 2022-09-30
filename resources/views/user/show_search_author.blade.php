@extends('layouts.main')
@section('title')
    Информация об авторе и его книги
@endsection
@section('content')
    <div>
            <div>
                <div><b>Имя автора:</b> {{ $author->author }}</div>
                <div><b>Описание автора:</b> {{ $author->description }}</div>
                <div><b>Дата рождения:</b> {{ $author->date_of_birth }}</div>
                        <div><b>Книги:</b></div>
                @foreach($books as $book)
                    @if ($book->author_id === $author->id)
                        {{$book->id}}. {{$book->name}}<br>
                    @endif
                @endforeach
            </div>
        <div>
            <a href="{{ route('user.search_author_name') }}">Вернуться назад</a>
        </div>
        <div>
            <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
        </div>
    </div>
@endsection
