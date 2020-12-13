@extends('templates.default')

@section('title')
    Laboraórios
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Excluindo - {{$laboratory->description}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('labs.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            @if(isset($error))
                <div class="alert alert-danger" role="alert">
                    <p class="m-0 text-black">{{$error ?? ''}}</p>
                </div>
            @endif
            <form method="POST" action="{{ route('labs.destroy',['labs' => $laboratory->id ]) }}">
                @csrf
                @method('DELETE')
                <div>
                    <div class="form-group">
                        <label for="description">Nome:</label>
                        <input required value="{{$laboratory->description}}" type="text" class="form-control"
                               id="description" name="description" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="checkbox" value="1"
                               name="status" {{ $laboratory->status == 1 ? 'checked' : '' }} disabled>
                    </div>
                </div>
                <button type="submit" class="btn btn-maincolor cursor-pointer active">Excluir</button>
            </form>
        </div>
    </div>
@endsection
