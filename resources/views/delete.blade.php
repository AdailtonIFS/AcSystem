@extends('templates.default')

@section('title')
    Deletar    
@endsection

@section('content')

        <form  action="{{ route('labs.destroy',['labs' => $labs->id]) }}" method="post">
            
            @csrf
            @method('delete')
            <div class="form-group">
                <h3>Deletar Laboratório:</h3>
            </div>
            <div class="form-group">
            <label for="numLab" class="col-form-label">Laboratório:</label>
            <input type="text" class="form-control" name="id" id="id" value="{{$labs->id}}" required readonly>
            </div>
            <div class="form-group">
            <label for="description" class="col-form-label">Descrição:</label>
            <textarea class="form-control" name="description" id="description" required readonly >{{$labs->description}}</textarea>
            </div>
            <div class="form-group">
                <h3>Tem certeza que deseja excluir?</h3>
            </div>
            <button type="submit"  class="btn btn-danger">Excluir</button>
        </form>

@endsection