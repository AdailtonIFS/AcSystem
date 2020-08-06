@extends('templates.default')
@section('title')
    Laboratórios
@endsection

@section('content')
<div>
    <h1>Laboratórios</h1>
</div>
<table id="table_id" class="table table-hover table-striped table-light table-bordered">
    <thead>
        <tr>
            <th>Lab</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        
    </tbody>
</table>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-backdrop="static">Cadastrar</button>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrando Laboratórios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- my form -->
                <form id="formRegister">
                    <div class="form-group">
                        <label for="numLab" class="col-form-label">Numéro do Laboratórios:</label>
                        <input type="text" class="form-control" id="numLab">
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="col-form-label">Descrição</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alert" data-dismiss="modal">Cancelar</button>
                        <input type="submit" form="formRegister" class="btn btn-primary" value="Cadastrar" /><br><br>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection