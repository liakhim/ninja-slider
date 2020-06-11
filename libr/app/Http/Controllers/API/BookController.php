<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookResource::collection(new BookResource(Book::all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Book::where('id', $id)->exists()) {
            return response(new BookResource(Book::find($id)),200);
        } else {
            return response("Book not found",404);
        }
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
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->title = is_null($request->title) ? $book->title : $request->title;
            $book->authors_id = is_null($request->authors_id) ? $book->authors_id : $request->authors_id;
            $book->update($request->all());

            $book->save();

            return response(['Update book with id='.$book->id.' is success'], 200);
        } else {
            return response(['Book not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Book::where('id', $id)->exists()) {
            $book = Book::find($id);
            $book->delete();

            return response('Deleted book with id='.$book->id.' is success');
        } else {
            return response('Book not found');
        }
    }
}
