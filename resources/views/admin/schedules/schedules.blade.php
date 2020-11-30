@extends('templates.default')

@section('title')
    Horários
@endsection

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-6">
                <h2 class="text-maincolor font-weight-bold">Horários</h2>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="btn btn-maincolor addLab font-weight-bold" href="#" role="button"></a>
            </div>
        </div>

        <hr class="mb-3">

        <table id="table_id" class="table table-light shadow-sm dt-responsive nowrap" style="width: 100%">
            <thead>
            <tr>
                <th class="text-center" name='id'>Segunda-Feira</th>
                <th class="text-center" name='description'>Terça-Feira</th>
                <th class="text-center" name='status'>Quarta-Feira</th>
                <th class="text-center" name='action'>Quinta-Feira</th>
                <th class="text-center" name='action'>Sexta-Feira</th>
            </tr>
            </thead>
            <tbody id="bodytable">

            </tbody>
        </table>

@endsection

