@extends('layouts.main')
@section('title')
    Жанры
@endsection
@section('content')
    <div>
        <form action="{{ route('genre.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" class="form-control" id="genre">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
