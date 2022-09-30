@extends('layouts.main')
@section('title')
    Найденная книга по id
@endsection
@section('content')
    <div>
            <div>{{ $book->id }}. Название: {{ $book->name }}<br>
                Автор: @foreach($authors as $author)
                    @if ($book->author_id === $author->id)
                        {{$author->author}}
                    @endif
                @endforeach
                <br>Жанры: @foreach($genres as $genre)
                    @foreach($book->genres as $BookGenre)
                        @if ($genre->id === $BookGenre->id)
                            {{$genre->genre}}
                        @endif
                    @endforeach
                @endforeach
            </div>
        <div>
            <a href="{{ route('user.search_book_id') }}">Вернуться назад</a>
        </div>
        <div>
            <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
        </div>
    </div>
@endsection
