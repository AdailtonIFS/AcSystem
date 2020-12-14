@extends('templates.default')

@section('title')
    Home
@endsection

@section('content')

    <div class="container h-25  d-flex justify-content-center align-items-center position-absolute">
        @if(now()->format('H') >= 5 && now()->format('i') > 1 && now()->format('H') <= 12)
            <h2 class="mb-5">
                {{'Bom dia' .auth()->user()->name}}
            </h2>

        @endif
        @if(now()->format('H') >= 12 && now()->format('i') > 1 && now()->format('H') <= 18)
            <h2 class="mb-5">
                {{'Boa tarde' .auth()->user()->name}}
            </h2>
        @endif
        @if(now()->format('H') >= 18 && now()->format('i') > 1 && now()->format('H') <= 24)
            <h2  class="mb-5">
                {{'Boa noite ' .auth()->user()->name}}
            </h2>

        @endif
    </div>
    <div class="Welcome w-100 h-100 d-flex flex-column justify-content-center align-items-center ">

        @if(now()->format('H') >= 0 && now()->format('H') <= 5)
            {{'Boa noite ' .auth()->user()->name}}
        @endif
        <h1 class="system-name text-maincolor">Seja bem vindo ao ACSystem</h1>

        <h3 class="mt-4">Separei as ocorrências de hoje para você</h3>
            <table id="tableUsers" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center" name='occurrence'>Ocorrência</th>
                    <th class="text-center" name='user'>Usuário</th>
                    <th class="text-center" name='date'>Data</th>
                    <th class="text-center" name='hour'>Hora</th>
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
                                <a @can('isAdmin')href="{{route('occurrences.show', ['occurrence' => $occurrence->id])}}@endcan">{{$occurrence->occurrence}}</a>
                            </td>
                            <td>
                                <a @can('isAdmin')href="{{route('users.show', ['user' => $occurrence->user_registration])}}"@endcan>{{$occurrence->user_name}}</a>
                            </td>
                            <td>{{$occurrence->date}}</td>
                            <td>{{$occurrence->hour}}</td>
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
        @if(count($occurrences) == 0)
            <p>Nenhuma ocorrência por enquanto</p>
        @endif
    </div>

@endsection
