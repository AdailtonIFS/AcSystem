@extends('templates.default')

@section('title')
    Laboratórios
@endsection

@section('content')

    <table id="table_id" class="table table-hover table-light table-bordered border-primary shadow-sm">
    <thead>
            <tr>
                <th class="text-center">Laboratório</th>
                <th class="text-center">Descrição</th>
                <th class="text-center">Status</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Excluir</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($labs as $lab) 
                    <tr>
                        <td class="text-center"> {{$lab->id}}</td>
                        <td class="text-center">{{$lab->description}}</td>
                        <td class="text-center">@if($lab->status==0)Desativado @else Ativado @endif</td>
                        <td class="text-center"><a href="{{route('labs.edit',['labs'=> $lab->id])}}"  class="btn btn-primary text-white">Editar</a></td>
                        <td class="text-center"><a href="{{route('labs.delete',['labs'=> $lab->id])}}"  class="btn btn-danger text-white">Excluir</a></td>
                    </tr>
                @endforeach
                </tbody>

                <caption>            
                    <a name="" id="" class="btn btn-success" href="{{route('labs.create')}}" role="button">Cadastrar</a>
                </caption>
            
    </table>



@endsection