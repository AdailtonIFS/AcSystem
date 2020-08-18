@extends('templates.default')

@section('title')
    Cadastro    
@endsection

@section('content')

        <form autocomplete="off" action="{{ route('labs.store') }}" method="post">

            @csrf
            <div class="form-group">
                <h3>Cadastrar Laboratório:</h3>
            </div>

                <div class="form-group">
                    <label for="numLab" class="col-form-label">Laboratório:</label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id" value="{{ old('id') }}" required>
                    @error('id')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>

            <div class="form-group">


            <label for="description" class="col-form-label">Descrição:</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" required>{{ old('description') }}</textarea>

                    @error('description')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
            </div>

            <button type="submit"  class="btn btn-success">Cadastrar</button>
        </form>

@endsection 