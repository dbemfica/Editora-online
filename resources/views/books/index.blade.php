@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h3>Listagem de LIvros</h3>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Novo Livro</a>
        </div>
        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>
                            <a href="{{route('books.edit',['book'=>$book->id])}}" class="btn btn-info" style="float: left; margin-right: 10px;">Edit</a>
                            <form action="{{route('books.destroy',['book'=>$book->id])}}" method="post" style="padding: 0; margin: 0;">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </div>
@endsection
