<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoriesRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{

    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepository $repository)
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
        $categories = $this->repository->paginate(10);
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $this->repository->create($request->all());
        Session::flash('message','Categoria cadastrado com sucesso');
        $url = $request->get('redirect_to',route('categories.index'));
        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoriesRequest|\Illuminate\Http\CategoriesRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function update(CategoriesRequest $request, $id)
    {
        $this->repository->update($request->all(),$id);
        Session::flash('message','Categoria alterada com sucesso');
        $url = $request->get('redirect_to',route('categories.index'));
        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     * @internal param Category $category
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        Session::flash('message','Categoria excluida com sucesso');
        return redirect()->route('categories.index');
    }
}
