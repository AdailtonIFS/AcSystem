@extends('templates.default')

@section('title')
    Ocorrências
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor font-weight-bold">Ocorrências </h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor addOccurrence font-weight-bold" href="#" role="button">Nova Ocorrência</a>
            </div>
        </div>

        <hr class="mb-3">

        <table id="table_id" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
            <thead>
            <tr>
                <th class="text-center" name='id'>Usuário</th>
                <th class="text-center" name='description'>Laboratório</th>
                <th class="text-center" name='status'>Data</th>
                <th class="text-center" name='action'>Hora</th>
                <th class="text-center" name='action'>Ocorrência</th>
                <th class="text-center" name='action'>Observação</th>
            </tr>
            </thead>
            <tbody id="bodytable">

            </tbody>
        </table>

        <div class="modal fade" data-backdrop="static" id="addOccurrenceModal" tabindex="-1" role="dialog"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrando Ocorrência</h5>
                        <button type="button" class="close" data-dismiss="modal" id="cancelNewLab" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="occurrenceForm" autocomplete="off">
                            <div class="form-group">
                                <label for="laboratory_id" class="col-form-label">Laboratório:</label>
                                <input type="text" class="form-control" name="laboratory_id" id="laboratory_id" required>
                                <div id="occurrenceError" class="alert alert-danger d-none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="occurrence" class="col-form-label">Ocorrência:</label>
                                <textarea class="form-control" name="occurrence" id="occurrence" required></textarea>
                                <div id="occurrenceError" class="alert alert-danger d-none">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="observation" class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="observation" id="observation" required></textarea>
                                <div id="observationError" class="alert alert-danger d-none"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-danger" id="cancelNewOccurrence" data-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-success" id="createNewOccurrence">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script src="{{ url(mix('/js/occurrences.js')) }}"></script>
@endsection
