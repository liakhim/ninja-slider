
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
        <h3>Редактирование книги</h3>
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{route('books.update',$book->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="book-title">Название</label>
                        <input name="title" value="{{$book -> title}}" type="text" class="form-control" id="book-title">
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="book-author">Автор книги</label>
                            </div>
                            <select name="author" class="custom-select" id="book-author">
                                @foreach($authors as $author)
                                    <option value="{{$author -> id}}">{{$author -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row col-sm-12">
                        <a href="{{route('authors.create')}}">Добавить нового автора</a>
                    </div>
                    <button class="btn btn-success mt-3" type="submit">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>
@endsection
