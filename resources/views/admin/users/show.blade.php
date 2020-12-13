@extends('templates.default')

@section('title')
    Usuário
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Usuário: {{$user->name}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{url()->previous()}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
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
        </div>


        <div class="container">
            <div class="header">
                <h4>Ocorrências</h4>
            </div>
            <table id="tableUsers" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center" name='name'>Laboratório</th>
                    <th class="text-center" name='email'>Ocorrência</th>
                    <th class="text-center" name='status'>Data</th>
                    <th class="text-center" name='status'>Hora</th>
                    <th class="text-center" name='status'>Observações</th>
                    <th class="text-center" name='status'>Ações</th>
                </tr>
                </thead>
                <tbody id="bodytable">
                @if(!empty($occurrences))
                    @foreach($occurrences as $occurrence)
                            <tr class="text-center">
                                <td>
                                    <a href="{{route('labs.show', ['labs' => $laboratories->id])}}">{{$laboratories->description}}</a>
                                </td>
                                <td>
                                    <a href="{{route('occurrences.show', ['occurrence' => $occurrence->id])}}">{{$occurrence->occurrence}}</a>
                                </td>
                                <td>{{$occurrence->date}}</td>
                                <td>{{$occurrence->hour}}</td>
                                <td>{{$occurrence->observation ?? 'Sem Observação'}}</td>
                                <td>
                                    <a href="#">Editar</a>
                                </td>
                            </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
