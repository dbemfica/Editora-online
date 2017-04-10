<?php

namespace App\Http\Controllers;

use App\Http\Requests\BooksRequest;
use App\Repositories\BookRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
{
    /**
     * @var BookRepository
     */
    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->repository->paginate(10);
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
        $data = $request->all();
        $data['author_id'] = Auth::getUser()->id;
        $this->repository->create($data);

        Session::flash('message','Livro cadastrado com sucesso');
        $url = $request->get('redirect_to',route('books.index'));
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Book $book
     */
    public function edit($id)
    {
        $book = $this->repository->find($id);
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BooksRequest|\Illuminate\Http\BooksRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Book $book
     */
    public function update(BooksRequest $request, $id)
    {
        $this->repository->update($request->except('author_id'),$id);
        Session::flash('message','Livro alterado com sucesso');
        $url = $request->get('redirect_to',route('books.index'));
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        Session::flash('message','Livro excluido com sucesso');
        return redirect()->route('books.index');
    }
}