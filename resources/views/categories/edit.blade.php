@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova Categorias</h3>
        </div>
        <div class="row">
            <form class="form" action="{{ route('categories.update',['categoty' => $category->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group{{hasError('name',$errors)}}">
                    <label class="control-label">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    {!! helpBlock('name',$errors) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar Categoria
                </div>
            </form>
        </div>
    </div>
@endsection
