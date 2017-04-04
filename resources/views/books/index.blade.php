@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de LIvros</h3>
            {!! Button::primary('Nova Livro')->asLinkTo(route('books.create')) !!}
        </div>
        <div class="row">
            {!!
                Table::withContents($books->items())->striped()
                 ->callback('Acçoes',function($field,$book){
                    $btnEdit = Button::info('Edit')->asLinkTo(route('books.edit',['book'=>$book->id]))->withAttributes(['style' => 'float: left; margin-right: 10px;']);
                    $btnDel = Button::danger('Excluir')->submit();
                    $routeDel = route('books.destroy',['book'=>$book->id]);
                    return $btnEdit.
                    "<form action=\"$routeDel\" method=\"post\" style=\"padding: 0; margin: 0;\">".
                    csrf_field().
                    "<input type=\"hidden\" name=\"_method\" value=\"DELETE\">".
                    $btnDel.
                    "</form>";
                 })
            !!}
            {{ $books->links() }}
        </div>
    </div>
@endsection
