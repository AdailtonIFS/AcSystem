@extends('templates.default')

@section('title')
    Usuário
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Cadastrando Usuário </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor align-items-center" href="{{route('users.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <form method="POST" action="{{ route('users.store')  }}">
                @csrf
                <div class="form-group">
                    <label for="registration">Matrícula:</label>
                    <input required type="text" class="form-control"
                           id="registration" name="registration">
                </div>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input required type="text" class="form-control"
                           id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="text" class="form-control"
                           id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="checkbox" value="1"
                           name="status">
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @if($categories)
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->description}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-maincolor cursor-pointer active">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
