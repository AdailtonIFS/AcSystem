@extends('templates.default')

@section('title')
    Usuário
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Cadastrando Ocorrência</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor align-items-center" href="{{route('occurrences.index')}}" role="button">Voltar</a>
            </div>
        </div>
        <div>
            <hr>
            <form method="POST" action="{{ route('occurrences.store')  }}">
                @csrf
                <div class="form-group">
                    <label for="laboratory_id">Laboratórios:</label>
                    <select name="laboratory_id" id="laboratory_id" class="form-control" required>
                        @if($laboratories)
                            @foreach($laboratories as $laboratory)
                                <option value="{{$laboratory->id}}">{{$laboratory->description}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group row">
                    <label for="date" class="col-2 col-form-label">Data:</label>
                    <div class="col-10">
                        <input class="form-control" type="date" id="date"
                               name="date" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hour" class="col-2 col-form-label">Hora:</label>
                    <div class="col-10">
                        <input class="form-control" type="time" step='1' min="00:00:00" max="24:00:00" id="hour" name="hour"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="occurrence" class="col-form-label">Ocorrência:</label>
                    <textarea class="form-control" name="occurrence" id="occurrence" required></textarea>
                </div>

                <button type="submit" class="btn btn-maincolor cursor-pointer active">Cadastrar</button>
            </form>
        </div>
    </div>
@endsection
