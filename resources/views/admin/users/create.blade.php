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
                           id="registration" name="registration" value="{{old('registration')}}">
                    @error('registration')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input required type="text" class="form-control"
                           id="name" name="name" value="{{old('name')}}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="text" class="form-control"
                           id="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="checkbox" value="1"
                           name="status" @if(old('status') == 1) checked @endif>
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria:</label>
                    <select name="category_id" id="category_id" class="form-control">
                    <option value="" selected>Escolha uma categoria</option>
                    @if($categories)
                            @foreach($categories as $category)
                                <option @if(old('category_id') == $category->id) checked @endif value="{{$category->id}}">{{$category->description}}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-maincolor cursor-pointer active">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
