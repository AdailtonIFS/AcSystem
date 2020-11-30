@extends('templates.default')

@section('title')
    Usuário
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Categoria: {{$category->description}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{url()->previous()}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <div class="form-group">
                <label for="registration">Nome:</label>
                <input required value="{{$category->description}}" type="text" class="form-control"
                       id="registration" name="registration" readonly>
            </div>
        </div>


        <div class="container">
            <div class="header">
                <h4>Usuários</h4>
            </div>
            <table id="tableUsers" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center" name='name'>Matrícula</th>
                    <th class="text-center" name='status'>Nome</th>
                    <th class="text-center" name='status'>Email</th>
                    <th class="text-center" name='status'>Status</th>
                </tr>
                </thead>
                <tbody id="bodytable">
                @if(!empty($users))
                    @foreach($users as $user)
                            <tr class="text-center">
                                <td>
                                    <a href="{{route('users.show', ['user' => $user->registration])}}">{{$user->registration}}</a>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><input disabled="disabled" type="checkbox" value=""
                                           name="active" {{ $user->status == 1 ? 'checked' : '' }}></td>                                <td>
                            </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
