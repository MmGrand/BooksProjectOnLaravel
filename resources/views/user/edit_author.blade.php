@extends('layouts.main')
@section('title')
    Изменение данных автора
@endsection
@section('content')
    <div>
        <form action="{{ route('user.update_author', $author->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" id="author" value="{{ $author->author }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description">{{ $author->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date_of_birth</label>
                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ $author->date_of_birth }}">
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
        <div>
            <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
        </div>
    </div>
@endsection
