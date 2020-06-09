<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Author;
use App\Book;
use voku\helper\ASCII;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // с использованием DB
        //$authors = DB::table('authors')->get();

        $books = Book::all();
        $authors = Author::all();

        return view('authors.index',compact('books','authors'));

        //в старой документации без использования compact
        //return view('authors.index',['authors'=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('authors.create',compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $books = new Author([
            'name' => $request->get('name'),
            //'authors_id' => $request->get('author'),
        ]);
        $books->save();
        return redirect('/authors')->with('success', 'Автор успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors =Author::all();
        $book = Book::find($id);
        return view('authors.edit',compact('book','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
        ]);

        $book = Book::find($id);
        $book->title =  $request->get('title');
        $book->author = $request->get('author');
        $book->save();

        return redirect('/books')->with('success', 'Книга обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $author = Author::find($id);
        $quantity = $author->books()->count();
        $author->books()->delete();
        $author->delete();

        return redirect('/authors')->with('success', 'Автор и его '.$quantity.' книги удалены!');
    }
}
