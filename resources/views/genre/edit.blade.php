@extends('layouts.main')
@section('title')
    Жанры
@endsection
@section('content')
    <div>
        <form action="{{ route('genre.update', $genre->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" id="genre" value="{{ $genre->genre }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description">{{ $genre->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
