@extends('templates.default')

@section('title')
    Ocorrência
@endsection

@section('content')

    <div class="container p-5">

        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Ocorrências</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('occurrences.create')}}" role="button">Nova Ocorrência</a>
            </div>
        </div>

        <hr class="mb-3">

        <table id="tableCategory" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
            <thead>
            <tr>
                <th class="text-center" scope="col" name='registration'>Usuário</th>
                <th class="text-center" scope="col" name='laboratory'>Laboratório</th>
                <th class="text-center" scope="col" name='date'>Data</th>
                <th class="text-center" scope="col" name='hour'>Hora</th>
                <th class="text-center" scope="col" name='occurrence'>Ocorrência</th>
                <th class="text-center" scope="col" name='observation'>Observações</th>
                <th class="text-center" scope="col" name='action'>Ações</th>
            </tr>
            </thead>
            <tbody id="bodytable">
            @if($occurrences)
                @foreach($occurrences as $occurrence)
                    <tr class="text-center">
                        <td><a href="{{route('users.show', ['user' => $occurrence->user_registration])}}">{{$occurrence->user_name}}</a></td>
                        <td>
                            <a href="{{route('labs.show', ['labs' => $occurrence->laboratory_id])}}">{{$occurrence->laboratory_description}}</a>
                        </td>
                        <td>{{$occurrence->date}}</td>
                        <td>{{$occurrence->hour}}</td>
                        <td>{{$occurrence->occurrence}}</td>
                        <td>{{$occurrence->observation}}</td>
                        <td>
                            <a href="{{route('occurrences.edit', ['occurrence' => $occurrence->id])}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
@endsection
