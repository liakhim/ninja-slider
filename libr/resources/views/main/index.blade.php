@extends('layouts.app')

@section('content')
    <div id="main">
        <div class="container">
            <div class="row col-sm-12">
                @foreach($authors as $author)
                    <div class="row col-sm-12">
                        <h4>{{$author -> name}}</h4>
                    </div>
                    <div class="row col-sm-12">
                        @forelse ($author -> books as $item)
                            <div class="col-lg-3 col-md-4 col-6 book-card">
                                <div class="book-card__image">
                                    <img src="http://pngimg.com/uploads/book/book_PNG51077.png"
                                         alt="Book image">
                                </div>
                                <div class="book-card__description">
                                    <p>{{$item -> title}}</p>
                                </div>
                            </div>
                        @empty
                            <p>У этого автора книг нет</p>
                        @endforelse
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<!--
    <div class="col-lg-3 col-md-4 col-6 book-card">
                    <div class="book-card__image">
                        <img src="http://pngimg.com/uploads/book/book_PNG51077.png" alt="Book image">
                    </div>
                    <div class="book-card__description">
                        <h4>.</h4>
                        <p>{{$author}}</p>
                    </div>
                </div>
-->
