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
                <form method="POST" action="{{route('authors.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="book-title">Имя</label>
                        <input name="name" value="{{old('title')}}" type="text" class="form-control" id="book-title">
                    </div>
{{--                    <div class="input-group mb-3">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                            <label class="input-group-text" for="book-author">Автор книги</label>--}}
{{--                        </div>--}}
{{--                        <select name="author" class="custom-select" id="book-author">--}}
{{--                            @foreach($authors as $author)--}}
{{--                                <option value="{{$author -> id}}">{{$author -> name}}</option>--}}
{{--                            @endforeach--}}
{{--                            <a href="#">Добавить автора</a>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <button class="btn btn-success" type="submit">Добавить автора</button>
                </form>
            </div>
        </div>
    </div>
@endsection
