@extends('templates.default')

@section('title')
    Usuários    
@endsection

@section('content')

    <div class="container p-5">

        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Usuários</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor addUser" href="#" role="button">Novo Usuário</a>
            </div>
    </div>

    <hr class="mb-3">

    <table id="tableUsers" class="table table-light shadow-sm dt-responsive nowrap">
        <thead>
            <tr>
                <th class="text-center" name='registration'>Matrícula</th>
                <th class="text-center" name='name'>Nome</th>
                <th class="text-center" name='status'>Status</th>
                <th class="text-center" name='description'>Descrição</th>
                <th class="text-center" name='action'>Ações</th>
            </tr>
        </thead>
        <tbody id="bodytable">
            
        </tbody>
        
    </table>

    <div class="modal" data-backdrop="static" id="modalAddUser" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cadastrando Usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="newUser" autocomplete="off">

                    <div class="form-group">
                      <label for="registration">Matrícula</label>
                      <input type="text" name="registration" id="registration" class="form-control" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">Essa é a matrícula que a instituição disponibiliza ao usuário</small>
                    </div>

                    <div class="form-group">
                        <label for="category">Nome</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div> 

                    <div class="form-group">
                      <label for="category">Categorias:</label>
                      <select class="form-control" name="category" id="category" aria-describedby="helpId">
                        <option value="error">Escolha a categoria</option>
                      </select>
                      <small id="helpId" class="text-muted">Esse é o papel que o usuário desempenha na instituição</small>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select multiple class="form-control" name="status" id="status">
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-danger" id="cancelNewUser" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sucess" id="createNewUser">Cadastrar</button>
            </div>
          </div>
        </div>
      </div>
      
    <div class="modal" data-backdrop="static" id="modalAddUser" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cadastrando Usuário</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="newUser" autocomplete="off">

                    <div class="form-group">
                      <label for="registration">Matrícula</label>
                      <input type="text" name="registration" id="registration" class="form-control" aria-describedby="helpId">
                      <small id="helpId" class="text-muted">Essa é a matrícula que a instituição disponibiliza ao usuário</small>
                    </div>

                    <div class="form-group">
                        <label for="category">Nome</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div> 

                    <div class="form-group">
                      <label for="category">Categorias:</label>
                      <select class="form-control" name="category" id="category" aria-describedby="helpId">
                        <option value="error">Escolha a categoria</option>
                      </select>
                      <small id="helpId" class="text-muted">Esse é o papel que o usuário desempenha na instituição</small>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select multiple class="form-control" name="status" id="status">
                        <option value="1">Ativado</option>
                        <option value="0">Desativado</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-danger" id="cancelNewUser" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-sucess" id="createNewUser">Cadastrar</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('scripts')
    <script src="{{ url(mix('/js/users.js')) }}"></script>
@endsection
