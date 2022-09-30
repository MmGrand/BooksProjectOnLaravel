@extends('layouts.admin')
@section('title')
    CreateAuthors
@endsection
@section('content')
    <div>
        <form action="{{ route('admin.author.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" id="author">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" name="description" class="form-control" id="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date_of_birth</label>
                <input type="Date" name="date_of_birth" class="form-control" id="date_of_birth">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
