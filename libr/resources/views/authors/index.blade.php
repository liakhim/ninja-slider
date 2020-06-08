@extends('layouts.app')

@section('content')
    <div class="container">
        <h5>Список книг:</h5>
        @foreach($books as $book)
            <div class="block">
                <span>{{$book->id}})</span>
                <span><b>Название книги: </b>{{$book->title}}</span>
                <span><b>Автор:</b> ({{$book->authors->name}})</span>
            </div>
        @endforeach
        <hr>
        <h5>Список авторов с количеством:</h5>
        @foreach($authors as $author)
            <div class="block">
                <span>{{$author->id}}.</span>
                <span>{{$author->name}}</span>
                <span>({{$author->books->count()}})</span>
            </div>
        @endforeach
    </div>
@endsection
