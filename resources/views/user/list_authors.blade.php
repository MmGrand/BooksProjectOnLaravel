@extends('layouts.main')
@section('title')
    Авторы
@endsection
@section('content')
    <div>
        @foreach($authors as $author)
            <div>{{ $author->id }}. {{ $author->author }}.</div>
            <div> Количество книг  = {{ $author->books_count}} </div>
        @endforeach
        <div class="mt-3">
            {{ $authors->links() }}
        </div>
            <div>
                <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
            </div>
    </div>
@endsection
