@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar Livro</h3>
        </div>
        <div class="row">
            <form class="form" action="{{ route('books.update',['book' => $book->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" name="title" class="form-control" value="{{$book->title}}">
                </div>
                <div class="form-group">
                    <label>Preço</label>
                    <input type="text" name="price" class="form-control" value="{{$book->price}}">
                </div>
                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="subtitle" class="form-control">{{$book->subtitle}}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar Livro
                </div>
            </form>
        </div>
    </div>
@endsection