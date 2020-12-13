@extends('templates.default')

@section('title')
    Relatório de Ocorrências
@endsection

@section('content')

    <div class="container h-100 p-5" >

        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Relatório das Ocorrências</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('occurrences.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <hr>

        @if(session()->get('error'))
            <div class="alert alert-danger" role="alert">
                <p class="m-0 text-black">{{session()->get('error')}}</p>
            </div>
        @endif
        @if(session()->get('message'))
            <div class="alert alert-success" role="alert">
                <p class="m-0 text-black">{{session()->get('message')}}</p>
            </div>
        @endif
        <form action="{{route('relatorio.store')}}" method="POST" class="d-flex flex-column justify-content-center align-items-center">
            @csrf
            <div class="form-group col-md-4  d-flex justify-content-center align-items-center  flex-column ">
                <label for="date">Data Início:</label>
                <div class="col-10">
                    <input class="form-control" type="date" id="date"
                           name="datestart" value={{request()->get('date')}}>
                </div>
            </div>
            <div class="form-group col-md-4 d-flex justify-content-center align-items-center flex-column ">
                <label for="date">Data final:</label>
                <div class="col-10">
                    <input class="form-control" type="date" id="date"
                           name="datefinal" value={{request()->get('datefinal')}}>
                </div>
            </div>
            <div class="form-group col-md-4 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-maincolor cursor-pointer active" style="width: 6rem">Gerar</button>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <h2 class="text-maincolor">Histórico de relatórios</h2>
            </div>
        </div>
            <table id="tableRelatorios" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
                <thead>
                <tr>
                    <th class="text-center" name='occurrence'>Arquivo</th>
                    <th class="text-center" name='user'>Usuário</th>
                    @can('isAdmin')
                        <th class="text-center" name='actions'>Gerado em</th>
                    @endcan
                </tr>
                </thead>
                <tbody id="bodytable">
                @if(!empty($relatorios))
                    @foreach($relatorios as $relatorio)
                        <tr class="text-center">
                            <td>
                                <a @can('isAdmin')href="{{route('relatorio.show', ['relatorio' => $relatorio->id])}}"@endcan>{{$relatorio->path}}</a>
                            </td>
                            <td>{{$relatorio->user->name}}</td>
                            <td>{{$relatorio->created_at->format('d/m/Y H:i:s')}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
    </div>

@endsection
