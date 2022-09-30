@extends('layouts.admin')
@section('title')
    EditBooks
@endsection
@section('content')
    <div>
        <form action="{{ route('admin.book.update', $book->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $book->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description">{{ $book->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="author_id" class="form-label">Author_id</label>
                <select class="form-select" aria-label="Сhoose an author" id="author_id" name="author_id">
                    <option selected>Сhoose an author</option>
                    @foreach($authors as $author)
                        <option
                            {{ $author->id === $book->author_id ? 'selected' : ''}}
                            value="{{$author->id}}">{{ $author->author}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="genre_id" class="form-label">Genre_id</label>
                <select class="form-select" multiple aria-label="Сhoose a genres" id="genres" name="genres[]">
                    @foreach($genres as $genre)
                        <option
                            @foreach($book->genres as $BookGenre)
                                {{ $genre->id === $BookGenre->id ? 'selected' : ''}}
                            @endforeach
                            value="{{$genre->id}}">{{ $genre->genre}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
