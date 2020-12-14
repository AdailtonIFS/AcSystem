@extends('templates.default')

@section('title')
    Categorias
@endsection

@section('content')

    <div class="container p-5">

        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Categorias</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('categories.create')}}" role="button">Nova Categoria</a>
            </div>
        </div>

        <hr class="mb-3">
        @if(session()->get('message'))
            <div class="alert alert-success" role="alert">
                <p class="m-0 text-black">{{session()->get('message')}}</p>
            </div>
        @endif
        <table id="tableCategory" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
            <thead>
            <tr>
                <th class="text-center" scope="col" name='description'>Número</th>
                <th class="text-center" scope="col" name='description'>Descrição</th>
                <th class="text-center" scope="col" name='action'>Ações</th>
            </tr>
            </thead>
            <tbody id="bodytable">
            @if($categories)
                @foreach($categories as $category)
                    <tr class="text-center">
                        <td>{{$category->id}}</td>
                        <td>
                            <a href="{{route('categories.show', ['category' => $category->id])}}">{{$category->description}}</a>
                        </td>
                        <td>
                            <a href="{{route('categories.edit', ['category' => $category->id])}}">Editar</a> |
                            <a href="{{route('categories.delete', ['category' => $category->id])}}">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        @if(count($categories) == 0)
            <p class="d-flex justify-content-center">Nenhuma categoria encontrada</p>
    @endif


@endsection
