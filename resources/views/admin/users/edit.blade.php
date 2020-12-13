@extends('templates.default')

@section('title')
    Usuário
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Editando-{{$user->name}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('users.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            @if(session()->get('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form method="POST" action="{{ route('users.update',['user' => $user->registration ])  }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="registration">Matrícula:</label>
                    <input required value="{{$user->registration}}" type="text" class="form-control"
                           id="registration" name="registration" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input required value="{{$user->name}}" type="text" class="form-control"
                           id="name" name="name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required value="{{$user->email}}" type="text" class="form-control"
                           id="email" name="email">
                    @if(session()->get('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="checkbox" value="1"
                           name="status" {{ $user->status == 1 ? 'checked' : '' }}>
                </div>
                <div class="form-group">
                    <label for="category_id">Categoria:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @if($categories)
                            @foreach($categories as $category)
                                <option @if($usercategory->id == $category->id) selected
                                        @endif value="{{$category->id}}">{{$category->description}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-secondary cursor-pointer active">Editar</button>
            </form>
        </div>
    </div>
@endsection
