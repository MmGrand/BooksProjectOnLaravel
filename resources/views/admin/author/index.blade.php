@extends('layouts.admin')
@section('title')
    Authors
@endsection
@section('content')
    <div>
        <div>
            <a href="{{ route('admin.author.create') }} " class="btn btn-primary mt-2 mb-2">Создать автора</a>
        </div>
        @foreach($authors as $author)
        <div><a href="{{ route('admin.author.show', $author->id) }}">{{ $author->id }}. {{ $author->author }}</a>. Количество книг = {{ $author->books_count}}</div>
        @endforeach
        <div class="mt-3">
            {{ $authors->links() }}
        </div>
    </div>
@endsection
