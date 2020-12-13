@extends('templates.default')

@section('title')
    Usuário
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Deletando - {{$user->name}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{url()->previous()}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <form method="POST" action="{{ route('users.destroy')  }}">
                @csrf
                @method('DELETE')
                <div class="form-group">
                    <label for="registration">Matrícula:</label>
                    <input required value="{{$user->registration}}" type="text" class="form-control"
                           id="registration" name="registration" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input required value="{{$user->name}}" type="text" class="form-control"
                           id="name" name="name" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required value="{{$user->email}}" type="text" class="form-control"
                           id="email" name="email" readonly>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input disabled="disabled" type="checkbox" value=""
                           name="status" {{ $user->status == 1 ? 'checked' : '' }}>
                </div>
                <div class="form-group">
                    <label for="category">Categoria:</label>
                    <input required value="{{$category->description}}" type="text" class="form-control"
                           id="email" name="email" readonly>
                </div>
            </form>
        </div>
    </div>
@endsection
