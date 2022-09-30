@extends('layouts.main')
@section('title')
    Книги
@endsection
@section('content')
    <div>
        <div>
            <a href="{{ route('book.create') }} " class="btn btn-primary mt-2 mb-2">Создать публикацию</a>
        </div>
        @foreach($books as $book)
            <div>{{ $book->id }}. Название: <a href="{{ route('book.show', $book->id) }}">{{ $book->name }}</a><br>
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

        @endforeach
        <div class="mt-3">
            {{ $books->withQueryString()->links() }}
        </div>
    </div>
@endsection
