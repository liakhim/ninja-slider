@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{route('books.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="book-title">Название</label>
                        <input name="title" value="{{old('name')}}" type="text" class="form-control" id="book-title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="book-author">Автор книги</label>
                        <select name="author" class="custom-select" id="book-author">
                            @forelse($authors as $author)
                                <option value="{{$author -> id}}">{{$author -> name}}</option>
                            @empty
                                <option value="">На сайте пока нет авторов</option>
                            @endforelse
                        </select>
                        <a href="{{route('authors.create')}}">Добавить нового автора</a>
                    </div>
                    <button class="btn btn-success" type="submit">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
