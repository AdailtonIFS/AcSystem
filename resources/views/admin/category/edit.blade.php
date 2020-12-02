@extends('templates.default')

@section('title')
    Categorias
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Editando-{{$category->description}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('categories.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <form method="POST" action="{{route('categories.update', ['category' => $category->id])}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id">id:</label>
                    <input required type="text" class="form-control"
                           id="id" name="id" value="{{$category->id}}">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input required type="text" class="form-control"
                    id="description" name="description" value="{{$category->description}}">
                </div>
                </div>
                <button type="submit" class="btn btn-outline-secondary cursor-pointer active">Editar</button>
            </form>
        </div>
    </div>
@endsection
