@extends('layouts.admin')
@section('title')
    EditGenres
@endsection
@section('content')
    <div>
        <form action="{{ route('admin.genre.update', $genre->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" id="genre" value="{{ $genre->genre }}">
                @error('genre')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description">{{ $genre->description }}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
