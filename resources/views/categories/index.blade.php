@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de Categorias</h3>
            {!! Button::primary('Nova Categoria')->asLinkTo(route('categories.create')) !!}
        </div>
        <div class="row">
            {!!
                Table::withContents($categories->items())->striped()
                 ->callback('Acçoes',function($field,$category){
                    $btnEdit = Button::info('Edit')->asLinkTo(route('categories.edit',['$category'=>$category->id]))->withAttributes(['style' => 'float: left; margin-right: 10px;']);
                    $btnDel = Button::danger('Excluir')->submit();
                    $routeDel = route('categories.destroy',['category'=>$category->id]);
                    return $btnEdit.
                    "<form action=\"$routeDel\" method=\"post\" style=\"padding: 0; margin: 0;\">".
                    csrf_field().
                    "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">".
                    $btnDel.
                    "</form>";
                 })
            !!}
            {{ $categories->links() }}
        </div>
    </div>
@endsection