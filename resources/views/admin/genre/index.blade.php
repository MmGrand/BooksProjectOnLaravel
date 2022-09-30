@extends('layouts.admin')
@section('title')
    Genres
@endsection
@section('content')
    <div>
        <div>
            <a href="{{ route('admin.genre.create') }} " class="btn btn-primary mt-2 mb-2">Создать жанр</a>
        </div>
        @foreach($genres as $genre)
        <div><a href="{{ route('admin.genre.show', $genre->id) }}">{{ $genre->id }}. {{ $genre->genre }}</a></div>
        @endforeach
        <div class="mt-3">
            {{ $genres->links() }}
        </div>
    </div>
@endsection
