@extends('templates.default')

@section('title')
    Laborátorios
@endsection

@section('content')

    <div class="container p-5">

        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Laboratórios</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('labs.create')}}" role="button">Novo Laboratório</a>
            </div>
        </div>

        <form action="{{route('labs.index')}}" method="get" class="mt-4">
            @csrf
            <div class="row">
                <div class="form-group col-md-8">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{request('name') ?? ''}}">
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
        @if(session()->get('message'))
            <div class="alert alert-success" role="alert">
                <p class="m-0 text-black">{{session()->get('message')}}</p>
            </div>
        @endif
        <table id="tableUsers" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
            <thead>
            <tr>
                <th class="text-center" name='name'>Nome</th>
                <th class="text-center" name='status'>Status</th>
                @can('isAdmin')
                    <th class="text-center" name='action'>Ações</th>@endcan
            </tr>
            </thead>
            <tbody id="bodytable">
            @if($laboratories)
                @foreach($laboratories as $laboratory)
                    <tr class="text-center">
                        <td>
                            <a href="{{route('labs.show', ['labs' => $laboratory->id])}}">{{$laboratory->description}}</a>
                        </td>
                        <td><input disabled="disabled" type="checkbox" value=""
                                   name="status" {{ $laboratory->status == 1 ? 'checked' : '' }}></td>
                        @can('isAdmin')
                            <td>
                                <a href="{{route('labs.edit', ['labs' => $laboratory->id])}}">Editar</a> |
                                <a href="{{route('labs.delete', ['labs' => $laboratory->id])}}">Excluir</a>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            @endif

            </tbody>

        </table>
        @if(count($laboratories) == 0)
            <p class="d-flex justify-content-center">Nenhum laboratório encontrado</p>
        @endif

@endsection
