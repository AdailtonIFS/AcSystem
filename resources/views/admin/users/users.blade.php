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
                <a class="btn btn-maincolor" href="#" role="button">Novo Usuário</a>
            </div>
    </div>

    <hr class="mb-3">

    <table id="tableUsers" class="table table-light shadow-sm">
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
     

@endsection

@section('scripts')
    <script src="{{ url(mix('/js/users.js')) }}"></script>
@endsection
