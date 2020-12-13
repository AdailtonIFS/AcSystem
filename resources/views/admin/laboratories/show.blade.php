@extends('templates.default')

@section('title')
    Labotatório
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Laboratório: {{$laboratory->description}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{url()->previous()}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <div class="form-group">
                <label for="description">Nome:</label>
                <input required value="{{$laboratory->description}}" type="text" class="form-control"
                       id="description" name="description" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input disabled="disabled" type="checkbox" value=""
                       name="status" {{ $laboratory->status == 1 ? 'checked' : '' }}>
            </div>
        </div>


        <div class="container">
            <div class="header">
                <h4>Ocorrências</h4>
            </div>
            <hr>
            <table id="tableUsers" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center" name='occurrence'>Ocorrência</th>
                    <th class="text-center" name='user'>Usuário</th>
                    <th class="text-center" name='date'>Data</th>
                    <th class="text-center" name='hour'>Hora</th>
                    <th class="text-center" name='observation'>Observações</th>
                    @can('isAdmin')
                        <th class="text-center" name='actions'>Ações</th>
                    @endcan
                </tr>
                </thead>
                <tbody id="bodytable">
                @if(!empty($occurrences))
                    @foreach($occurrences as $occurrence)
                            <tr class="text-center">
                                <td>
                                    <a @can('isAdmin')href="{{route('occurrences.show', ['occurrence', $occurrence->id])}}"@endcan>{{$occurrence->occurrence}}</a>
                                </td>
                                <td>
                                    <a @can('isAdmin')href="{{route('users.show', ['user' => $user->registration])}}"@endcan>{{$user->name}}</a>
                                </td>
                                <td>{{$occurrence->date}}</td>
                                <td>{{$occurrence->hour}}</td>
                                <td>{{$occurrence->observation ?? 'Sem Observação'}}</td>
                                @can('isAdmin')
                                    <td>
                                        <a href="{{route('occurrences.edit', ['occurrence' => $occurrence->id])}}">Editar</a>
                                    </td>
                                @endcan
                            </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
