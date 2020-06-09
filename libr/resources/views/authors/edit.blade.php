
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
        <h3>Редактирование автора</h3>
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{route('authors.update',$authors->id)}}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="book-title">Имя</label>
                        <input name="name" value="{{$authors -> name}}" type="text" class="form-control" id="book-title">
                    </div>
                    <button class="btn btn-success" type="submit">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>
@endsection
