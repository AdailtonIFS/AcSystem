@extends('templates.default')

@section('title')
    Ocorrência
@endsection

@section('content')

    <div class="container p-5">

        <div class="row no-print">
            <div class="col-6">
                <h2 class="text-maincolor">{{ !request('all') ? 'Minhas Ocorrências' : 'Ocorrências'}}</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('occurrences.create')}}" role="button">Nova Ocorrência</a>
            </div>
        </div>

        <hr class="mb-3">
        @if(session()->get('error'))
            <div class="alert alert-danger" role="alert">
                <p class="m-0 text-black">{{session()->get('error')}}</p>
            </div>
        @endif
        <form action="{{route('occurrences.index')}}" method="get" class="mt-4">
            <div class="row no-print">

                <div class="form-group col-md-3">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{request('name') ?? ''}}">
                </div>

                <div class="form-group col-md-3 ">
                    <label for="date">Data:</label>
                    <div class="col-10">
                        <input class="form-control" type="date" id="date"
                               name="date" value={{request()->get('date')}}>
                    </div>
                </div>

                @can('isAdmin')
                    <div class="form-group col-md-@if(empty(request('all'))){{4}}@else{{2}}@endif">
                        <label for="status">Filtrar:</label>
                        <select name="all" id="all" class="form-control">
                            <option @if(!request('all')) @endif value="">Minhas</option>
                            <option @if(request('all')) selected @endif value="true">Todos</option>
                        </select>
                    </div>
                @endcan

                @can('isAdmin')
                    @if(request('all'))
                        <div class="form-group col-md-3">
                            <label for="user">Usuários:</label>
                            <select name="user" id="user" class="form-control">
                                <option value="">Escolha um usuário</option>
                                @if($users)
                                    @foreach($users as $user)
                                        <option value="{{$user->registration}}">{{$user->name}}</option>
                                    @endforeach
                                @else
                                    <option value="">Nenhum usuário encontrado</option>
                                @endif
                            </select>
                        </div>
                    @endif
                @endcan

                <div class="form-group col-md-1  text-right" style="margin-top: 30px;">
                    <button type="submit" class="btn btn-outline-secondary cursor-pointer active">Buscar</button>
                </div>
            </div>
            <div class="row no-print">
                <div class="form-group col-md-6 d-flex justify-content-end" style="margin-top: 5px;">
                    <a href="{{route('occurrences.index')}}" class="btn btn-outline-info cursor-pointer active">Limpar Filtros</a>
                </div>
                @can('isAdmin')
                    <div class="form-group col-md-6 d-flex justify-content-end" >
                        <button class="btn btn-danger" onclick="window.print()">Exportar para PDF</button>
                    </div>
                @endcan
            </div>
        </form>

        <table id="tableCategory" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
            <thead>
            <tr>
                <th class="text-center" scope="col" name='occurrence'>Ocorrência</th>
                @if(request('all'))
                    <th class="text-center" scope="col" name='registration'>Usuário</th>@endif
                <th class="text-center" scope="col" name='laboratory'>Laboratório</th>
                <th class="text-center" scope="col" name='date'>Data</th>
                <th class="text-center" scope="col" name='hour'>Hora</th>
                <th class="text-center no-print" scope="col" name='action'>Ações</th>
            </tr>
            </thead>
            <tbody id="bodytable">
            @if($occurrences)
                @foreach($occurrences as $occurrence)
                    <tr class="text-center">
                        <td>
                            <a href="{{route('occurrences.show', ['occurrence' => $occurrence->id])}}">
                                {{$occurrence->occurrence}}
                            </a>
                        </td>
                        @if(request('all'))
                            <td>
                                <a href="{{route('users.show', ['user' => $occurrence->user->registration])}}">{{$occurrence->user->name}}</a>
                            </td>@endif
                        <td>
                            <a href="{{route('labs.show', ['labs' => $occurrence->laboratory->id])}}">{{$occurrence->laboratory->description}}</a>
                        </td>
                        <td>{{$occurrence->date}}</td>
                        <td>{{$occurrence->hour}}</td>
                        <td class="no-print">
                            <a href="{{route('occurrences.edit', ['occurrence' => $occurrence->id])}}">Editar</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        @if(count($occurrences) == 0)
            <p class="d-flex justify-content-center">Nenhuma ocorrência encontrada</p>
        @endif

@endsection
