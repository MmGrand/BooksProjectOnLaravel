@extends('layouts.main')
@section('title')
    Обновление данных книги
@endsection
@section('content')
    <div>
        <form action="{{ route('user.update_book', $book->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $book->name }}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description">{{ $book->description }}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
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
            <div class="mb-3">
                <input type="hidden" name="author_id" value="{{ $book->author_id }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Обновить</button>
        </form>
        <div>
            <a href="{{ route('user.show_books_author') }}">Вернуться назад</a>
        </div>
        <div>
            <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
        </div>
    </div>
@endsection
