@extends('templates.default')

@section('title')
    Laboratórios
@endsection

@section('content')


    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Cadastrando Laboratório</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor align-items-center" href="{{route('labs.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <form method="POST" action="{{ route('labs.store')  }}">
                @csrf
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input required type="text" class="form-control"
                           id="id" name="id" value="{{old('id')}}">
                    @error('id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Nome:</label>
                    <input required type="text" class="form-control"
                           id="description" name="description" value="{{old('description')}}">
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-maincolor cursor-pointer active">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
