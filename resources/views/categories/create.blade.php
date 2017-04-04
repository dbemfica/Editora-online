@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Nova Categorias</h3>
        </div>
        <div class="row">
            <form class="form" action="{{ route('categories.store') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="redirect_to" value="{{ URL::previous() }}">
                <div class="form-group{{hasError('name',$errors)}}">
                    <label class="control-label">Nome</label>
                    <input type="text" name="name" class="form-control">
                    {!! helpBlock('name',$errors) !!}
                </div>
                <div class="form-group">
                    {!! Button::primary('Criar Categoria')->submit() !!}
                </div>
            </form>
        </div>
    </div>
@endsection
