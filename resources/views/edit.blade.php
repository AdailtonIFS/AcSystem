@extends('templates.default')

@section('title')
    Editar    
@endsection

@section('content')

        <form autocomplete="off" action="{{ route('labs.update',['labs' => $labs->id]) }}" method="post">
            
            @csrf
            @method('put')

            <div class="form-group">
                <h3>Editar Laboratório:</h3>
            </div>
            <div class="form-group">
                <label for="numLab" class="col-form-label">Laboratório:</label>
                <input type="text" class="form-control  @error('id') is-invalid @enderror" name="id" id="id" value="{{$labs->id}}" required readonly>
                @error('id')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="col-form-label">Descrição:</label>

                <textarea class="form-control  @error('description') is-invalid @enderror" name="description" id="description" required>{{$labs->description}}</textarea>
                @error('description')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect2">Status</label>
                <select multiple class="form-control" name='status' id="status">
                  <option value="1" @if ($labs->status == 1) selected @endif>Ativado</option>
                  <option value="0" @if ($labs->status == 0) selected @endif>Desativado</option>
                </select>
              </div>

            <button type="submit"  class="btn btn-primary">Confirmar</button>
        </form>

@endsection