@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova Categorias</h3>
        </div>
        <div class="row">
            <form action="{{ route('categories.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Criar Categoria
                </div>
            </form>
        </div>
    </div>
@endsection
