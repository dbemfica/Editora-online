<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BooksRequest;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::query()->paginate(10);
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BooksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BooksRequest $request)
    {
        $book = new Book();
        $book->user_id = Auth::getUser()->id;
        $book->title = $request->get('title');
        $book->price = $request->get('price');
        $book->subtitle = $request->get('subtitle');
        $book->save();

        $url = $request->get('redirect_to',route('books.index'));
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BooksRequest  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BooksRequest $request, Book $book)
    {
        $book->fill($request->all());
        $book->save();

        $url = $request->get('redirect_to',route('books.index'));
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}