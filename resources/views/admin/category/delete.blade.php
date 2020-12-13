@extends('templates.default')

@section('title')
    Categorias
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Deletando - {{$category->description}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('categories.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>

            <hr>
            @if(isset($error))
                <div class="alert alert-danger" role="alert">
                    <p class="m-0 text-black">{{$error ?? ''}}</p>
                </div>
            @endif
            <h3>Tem certeza que deseja excluir essa categoria?</h3>
            <form method="POST" action="{{route('categories.destroy', ['category' => $category->id])}}">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <label for="id">id:</label>
                    <input required type="text" class="form-control"
                           id="id" name="id" value="{{$category->id}}" disabled>
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input required type="text" class="form-control"
                           id="description" name="description" value="{{$category->description}}" disabled>
                </div>
                <button type="submit" class="btn btn-outline-danger cursor-pointer active">Excluir</button>
            </form>
        </div>
    </div>
@endsection
