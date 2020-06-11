@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
        </div>
        <h5>Список книг:</h5>
        <div class="row col-sm-12">
            <a href="{{route('books.create')}}" class="btn btn-success text-white">
                Добавить книгу
            </a>
        </div>
        <div class="row col-sm-12">
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Автор</th>
                    <th width="240" scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($books as $book)
                <tr>
                    <th scope="row">{{$book->id}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{$book->authors->name}}</td>
                    <td align="center" class="d-flex">
                        <form action="{{ route('books.destroy', $book)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash text-white"></i></button>
                        </form>
                        <a class="btn btn-outline-secondary mr-3 ml-3" href="{{route('books.edit',$book)}}" class="mr-3 ml-3"><i class="fas fa-pen"></i></a>
                    </td>
                </tr>
                @empty
                    <tr style="background: transparent">
                        <th scope="row"><span style="color: red">Список книг пуст!</span></th>
                        <td></td>
                        <td></td>
                        <td align="center" class="d-flex">

                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <hr>
        <h5>Список авторов с количеством:</h5>
        @forelse($authors as $author)
            <div class="row col-sm-12">
                <div class="block w-100 d-flex align-items-center mb-3">
                    <p class="m-0">{{$author->id}}.</p>
                    <p class="m-0">{{$author->name}}</p>
                    <p class="m-0">({{$author->books->count()}})</p>
                    <form class="m-0" action="{{ route('authors.destroy', $author)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm ml-1" type="submit"><i class="fas fa-trash text-white"></i></button>
                    </form>
                </div>
            </div>
        @empty
            <p style="color: red">Список авторов пуст!</p>
        @endforelse
        <a class="btn btn-primary mt-3 mb-3" href="{{route('authors.create')}}">Добавить автора</a>
    </div>
@endsection
