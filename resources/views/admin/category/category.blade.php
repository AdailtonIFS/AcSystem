@extends('templates.default')

@section('title')
    Categorias   
@endsection

@section('content')

<div class="container p-5">

    <div class="row">
        <div class="col-6">
            <h2 class="text-maincolor">Categorias</h2>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a class="btn btn-maincolor addCategory" href="#" role="button">Nova Categoria</a>
        </div>
</div>

<hr class="mb-3">

<table id="tableCategory" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center" scope="col" name='id'>ID</th>
            <th class="text-center" scope="col" name='description'>Descrição</th>
            <th class="text-center" scope="col" name='action'>Ações</th>
        </tr>
    </thead>
    <tbody id="bodytable">
        
    </tbody>
    
</table>

<div class="modal" data-backdrop="static" id="modalAddCategory" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cadastrando categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="newCategory" autocomplete="off">

                <div class="form-group">
                    <label for="category">ID</label>
                    <input type="text" name="id" id="id" class="form-control">
                </div> 
                <div class="form-group">
                    <label for="category">Descrição</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div> 


            </form>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" id="createNewCategory">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>


<div class="modal" data-backdrop="static" id="modalEditCategory" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editando categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="editCategory" autocomplete="off">

                <div class="form-group">
                    <label for="category">ID</label>
                    <input type="text" name="idEdit" id="idEdit" class="form-control" readonly>
                </div> 
                <div class="form-group">
                    <label for="category">Descrição</label>
                    <input type="text" name="descriptionEdit" id="descriptionEdit" class="form-control">
                </div> 


            </form>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-success" id="ButtonEditCategory">Editar</button>
        </div>
      </div>
    </div>
  </div>

 

@endsection

@section('scripts')
    <script src="{{ url(mix('/js/category.js')) }}"></script>
@endsection
