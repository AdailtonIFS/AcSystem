@extends('templates.default')

@section('title')
    Ocorrência
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Editando-{{$occurrence->name}} </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" href="{{route('occurrences.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <form method="POST"
                  action="{{ route('occurrences.update',['occurrence' => $occurrence->id ])  }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="laboratory_id">Laboratórios:</label>
                    <select name="laboratory_id" id="laboratory_id" class="form-control">
                        @if($laboratories)
                            @foreach($laboratories as $laboratory)
                                <option @if($occurrence->laboratory_id == $laboratory->id) selected
                                        @endif value="{{$laboratory->id}}">{{$laboratory->description}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-2 col-form-label">Data:</label>
                    <div class="col-10">
                        <input class="form-control" type="date" value="{{($occurrence->date)}}" id="date"
                               name="date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hour" class="col-2 col-form-label">Hora:</label>
                    <div class="col-10">
                        <input class="form-control" type="time" value="{{$occurrence->hour}}" id="hour" name="hour" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="occurrence" class="col-form-label">Ocorrência:</label>
                    <textarea class="form-control" name="occurrence" id="occurrence" required>{{$occurrence->occurrence}}</textarea>
                </div>

                <div class="form-group">
                    <label for="observation" class="col-form-label">Observação:</label>
                    <textarea class="form-control" name="observation" id="observation" required>{{$occurrence->observation}}</textarea>
                </div>

                    <button type="submit" class="btn btn-outline-secondary cursor-pointer active">Editar</button>
            </form>
        </div>
    </div>
@endsection
