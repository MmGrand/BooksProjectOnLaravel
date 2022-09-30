@extends('layouts.main')
@section('title')
    Книги автора
@endsection
@section('content')
    <div>
        <div>
            <a href="{{ route('user.index') }}">Вернуться в главное меню</a>
        </div>
        @foreach($books as $book)
            <div>
                    @if ($book->author_id === auth()->user()->id)
                        Название: {{ $book->name }}<br>
                    <div>
                        <a href="{{ route('user.edit_book', $book->id) }}">Изменить</a>
                    </div>
                        <form action="{{ route('user.delete_book', $book->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Удалить" class="btn btn-primary">
                        </form><br>

                    @endif
            </div>
        @endforeach
    </div>
@endsection
