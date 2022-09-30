@extends('layouts.main')
@section('title')
    Жанры
@endsection
@section('content')
    <div>
        <div>
            <a href="{{ route('genre.create') }} " class="btn btn-primary mt-2 mb-2">Создать жанр</a>
        </div>
        @foreach($genres as $genre)
        <div><a href="{{ route('genre.show', $genre->id) }}">{{ $genre->id }}. {{ $genre->genre }}</a></div>
        @endforeach
        <div class="mt-3">
            {{ $genres->links() }}
        </div>
    </div>
@endsection
