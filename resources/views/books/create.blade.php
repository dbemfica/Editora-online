@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Novo Livro</h3>
        </div>
        <div class="row">
            <form class="form" action="{{ route('books.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{hasError('title',$errors)}}">
                    <label class="control-label">Titulo</label>
                    <input type="text" name="title" class="form-control">
                    {!! helpBlock('title',$errors) !!}
                </div>
                <div class="form-group{{hasError('price',$errors)}}">
                    <label class="control-label">Preço</label>
                    <input type="text" name="price" class="form-control">
                    {!! helpBlock('price',$errors) !!}
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="subtitle" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Criar Livro
                </div>
            </form>
        </div>
    </div>
@endsection
