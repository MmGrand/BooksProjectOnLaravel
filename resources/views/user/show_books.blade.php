@extends('layouts.main')
@section('title')
    Книги и их авторы
@endsection
@section('content')
    <div>
        @foreach($books as $book)
            <div>{{ $book->id }}. Название: {{ $book->name }}<br>
                Автор: @foreach($authors as $author)
                    @if ($book->author_id === $author->id)
                        {{$author->author}}
                    @endif
                @endforeach
            </div>
        @endforeach
        <div class="mt-3">
            {{ $books->withQueryString()->links() }}
        </div>
            <div>
                <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
            </div>
    </div>
@endsection
