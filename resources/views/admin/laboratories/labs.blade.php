@extends('templates.default')

@section('title')
    Laboratórios    
@endsection

@section('content')
    <div class="container p-5">

        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor">Laboratórios</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor" onclick="openModal(event,'addLabModal');" href="#" role="button">Novo Laboratório</a>
            </div>
    </div>
    
    <hr class="mb-3">
    
    <table id="table_id" class="table table-light shadow-sm dt-responsive nowrap">
        <thead>
            <tr>
                <th class="text-center" name='id'>Número</th>
                <th class="text-center" name='description'>Descrição</th>
                <th class="text-center" name='status'>Status</th>
                <th class="text-center" name='action'>Ações</th>
            </tr>
        </thead>
        <tbody id="bodytable">
            
        </tbody>
    </table>
        
    
        <div class="modal fade" data-backdrop="static" id="addLabModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        
                        <form id="labForm" autocomplete="off">
                            
                            <div class="form-group">
                            <h3 class="text-center">Novo Laboratório</h3>
                        </div>
                        
                        <div class="form-group">
                            <label for="numLab" class="col-form-label">Laboratório:</label>
                            <input type="text" class="form-control" name="id" id="id"required>
                        
                            <div id="idError" class="alert alert-danger d-none">
                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="col-form-label">Descrição:</label>
                            <textarea class="form-control" name="description" id="description" required></textarea>
                            <div id="descriptionError" class="alert alert-danger d-none">
                            </div>
                        </div>

                        <button onclick="closeModal(event,'addLabModal');" id="cancel" class="btn btn-danger">Cancelar</button>
                        <button id="addLab" class="btn btn-maincolor">Cadastrar</button>
                    </form>
                    
                    
                </div>
            </div>
        </div>
          </div>
          
          
          <div class="modal fade" id="editLabModal"  data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <form id="editForm" autocomplete="off" >
                          
                          <div class="form-group">
                            <h3>Editar Laboratório:</h3>
                        </div>
                        <div class="form-group">
                            
                            <label for="numLab" class="col-form-label">Laboratório:</label>
                            <input type="text" class="form-control" name="idEdit" id="idEdit" required readonly>
                            <div id="idError" class="alert alert-danger d-none">
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <label for="description" class="col-form-label">Descrição:</label>
                            <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" required></textarea>
                            <div id="descriptionError" class="alert alert-danger d-none">
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select multiple class="form-control" name='status' id="status">
                                <option value="1">Ativado</option>
                                <option value="0">Desativado</option>
                            </select>
                        </div>
                        
                        <button class="btn btn-primary editLab">Confirmar</button>
                    </form>

                </div>
            </div>
            </div>
        </div>

    </div>
        @endsection
@section('scripts')
    <script src="{{ url(mix('/js/laboratories.js')) }}"></script>
    @endsection