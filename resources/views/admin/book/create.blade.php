@extends('layouts.admin')
@section('title')
    CreateBooks
@endsection
@section('content')
    <div>
        <form action="{{ route('admin.book.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    value="{{ old('name') }}"
                    type="text" name="name" class="form-control" id="name" placeholder="name">

                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description" placeholder="description">{{ old('description') }}</textarea>

                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author_id</label>
                <select class="form-select" aria-label="Сhoose an author" id="author_id" name="author_id">
                        @foreach($authors as $author)
                            <option
                                {{ old('author_id') == $author->id ? 'selected' : '' }}
                                value="{{$author->id}}">{{ $author->author}}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre_id</label>
                <select class="form-select" multiple aria-label="Сhoose a genres" id="genres" name="genres[]">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}">{{ $genre->genre}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
