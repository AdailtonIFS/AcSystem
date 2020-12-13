@extends('templates.default')

@section('title')
    Ocorrência
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Ocorrência - {{$occurrence->name}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('occurrences.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <div class="form-group row">
                <label for="date" class="col-2 col-form-label">Data:</label>
                <div class="col-10">
                    <input class="form-control" type="date" value="{{($occurrence->date)}}" id="date"
                           name="date" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="hour" class="col-2 col-form-label">Hora:</label>
                <div class="col-10">
                    <input class="form-control" type="time" value="{{$occurrence->hour}}" id="hour" name="hour"
                           disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="occurrence" class="col-form-label">Ocorrência:</label>
                <textarea class="form-control" name="occurrence" id="occurrence"
                          disabled>{{$occurrence->occurrence}}</textarea>
            </div>
        </div>
@endsection
