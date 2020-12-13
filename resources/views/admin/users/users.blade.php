@extends('templates.default')

@section('title')
    Usuários
@endsection

@section('content')

    <div class="container p-5">

        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Usuários</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor addUser" href="{{route('users.create')}}" role="button">Novo Usuário</a>
            </div>
        </div>
        <hr>
        @if(session()->get('message'))
            <div class="alert alert-success">{{ session()->get('message') }}</div>
        @endif
        <form action="{{route('users.index')}}" method="get" class="mt-4">
            @csrf
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="query">Nome ou Email:</label>
                    <input type="text" class="form-control" name="query" id="query" value="{{request('query') ?? ''}}">
                </div>
                <div class="form-group col-md-2">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option @if(request('status') === '') selected @endif value="">Todos</option>
                        <option @if(request('status') === '1') selected @endif value="1">Ativos</option>
                        <option @if(request('status') === '0') selected @endif value="0">Inativos</option>
                    </select>
                </div>
                <div class="form-group col-md-2 text-right" style="margin-top: 30px;">
                    <button type="submit" class="btn btn-outline-secondary cursor-pointer active">Buscar</button>
                </div>
            </div>
        </form>
        <hr class="mb-3">


        <table id="tableUsers" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
            <thead>
            <tr>
                <th class="text-center" name='name'>Nome</th>
                <th class="text-center" name='email'>Email</th>
                <th class="text-center" name='status'>Status</th>
                <th class="text-center" name='action'>Ações</th>
            </tr>
            </thead>
            <tbody id="bodytable">
            @if($users)
                @foreach($users as $user)
                    <tr class="text-center">
                        <td><a href="{{route('users.show', ['user' => $user->registration])}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td><input disabled="disabled" type="checkbox" value=""
                                   name="active" {{ $user->status == 1 ? 'checked' : '' }}></td>
                        <td>
                            <a href="{{route('users.edit', ['user' => $user->registration])}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>Nenhum Usuário encontrado</td>
                </tr>
            @endif
            </tbody>

        </table>

@endsection

