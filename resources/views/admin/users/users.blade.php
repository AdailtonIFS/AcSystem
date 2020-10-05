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

    <table id="tableUsers" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
        <thead>
            <tr>
                <th class="text-center" name='registration'>Matrícula</th>
                <th class="text-center" name='name'>Nome</th>
                <th class="text-center" name='email'>Email</th>
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
                    <button type="button" class="close" data-dismiss="modal" id="#cancelNewUser1" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="newUser" autocomplete="off">

                        <div class="form-group">
                            <label for="registration">Matrícula</label>
                            <input type="text" name="registration" id="registration" class="form-control" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Essa é a matrícula que a instituição disponibiliza ao usuário</small>
                            {{-- Error div --}}
                            <div id="registrationError" class="alert alert-danger d-none"></div>
                        </div>

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control">
                            {{-- Error div --}}
                            <div id="nameError" class="alert alert-danger d-none"></div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            {{-- Error div --}}
                            <div id="emailError" class="alert alert-danger d-none"></div>
                        </div> 

                        <div class="form-group">
                            <label for="category">Categorias:</label>
                            <input list="category" value="Escolha a categoria" class="col-sm-6 custom-select custom-select-sm">
                            <datalist id="category">
                                
                            </datalist>
                            <small id="helpId" class="text-muted">Esse é o papel que o usuário desempenha na instituição</small>
                            {{-- Error div --}}
                            <div id="categoryError" class="alert alert-danger d-none"></div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select multiple class="form-control" name="status" id="status">
                                <option value="1">Ativado</option>
                                <option value="0">Desativado</option>
                            </select>
                            {{-- Error div --}}
                            <div id="statusError" class="alert alert-danger d-none"></div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" id="cancelNewUser" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="createNewUser">Cadastrar</button>
                </div>

            </div>
        </div>
    </div>

{{-- Modal Edit --}}

    <div class="modal" data-backdrop="static" id="modalEditUser" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Editando Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" id="#cancelNewUser1" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form id="newUser" autocomplete="off">

                        <div class="form-group">
                            <label for="registration">Matrícula</label>
                            <input type="text" name="registration" id="registration" class="form-control" aria-describedby="helpId" readonly>
                        </div>

                        <div class="form-group">
                            <label for="category">Nome</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="category">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div> 

                        <div class="form-group">
                            <label for="category">Categorias:</label>
                            <select class="form-control" name="category" id="category" aria-describedby="helpId">
                                <option value="">Escolha a categoria</option>
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
                    <button type="button" class="btn btn-success" id="createNewUser">Cadastrar</button>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ url(mix('/js/users.js')) }}"></script>
@endsection
