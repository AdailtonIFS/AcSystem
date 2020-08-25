$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var table = $('#tableCategory').DataTable({
    processing: true,
    serverSide: true,
    info: false,

    ajax: {
        "url": "categorias/pegarDados"
    },
    "columns": [
        { data: 'id', name: 'id' },
        { data: 'description', name: 'description' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
    ],

    autowidth: false,

    language: {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar",
        "oPaginate": {
            "sNext": "Próximo",
            "sPrevious": "Anterior",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
    },
    //set column definition initialisation properties.
    "columnDefs": [{
        "targets": '_all',
        "className": "text-center",
    }, ],

});

$('.addCategory').click(function(e) {
    e.preventDefault();

    $('#modalAddCategory').modal('show')
})

$('#createNewCategory').click(function() {
    $(this).attr('disabled', 'disabled').text('Cadastrando...');

    let _token = $('meta[name="csrf-token"]').attr('content');

    var data = $('#newCategory').serialize() + '&_token=' + _token;

    console.log(data);

    $.ajax({

        type: "POST",
        url: "categorias",
        data: data,
        success: function(response) {

            table.draw();
            $('#modalAddCategory').modal('hide');
            $('#createNewCategory').removeAttr('disabled', 'disabled').text('Cadastrar');
            $('#newCategory').trigger('reset');

            Swal.fire(
                'Cadastrado!',
                response.success,
                'success'
            )
        },
        error: function(response) {
            alert('não foi')
        }
    });
})

$('body').on('click', '.deleteCategory', function() {

    var id = $(this).data("id");
    let _url = `categorias/${id}`;

    $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
            if (response) {
                Swal.fire({
                    position: 'top',
                    title: 'Tem certeza que deseja excluir a categoria?',
                    html: 'Categoria:   ' + response.id + '</br>' +
                        'Descrição:   ' + response.description,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Deletar'

                }).then((result) => {
                    if (result.value) {

                        let _token = $('meta[name="csrf-token"]').attr('content');

                        $.ajax({
                            type: "DELETE",
                            url: `categorias/${id}`,
                            data: {
                                _token: _token
                            },
                            success: function(response) {
                                table.draw();

                                Swal.fire({
                                    position: 'top',
                                    title: 'Excluido!',
                                    text: response.success,
                                    icon: 'success'
                                })
                            }
                        })
                    }
                })
            }
        }
    })


});

$('body').on('click', '.openEditCategoryModal', function(e) {

    e.preventDefault();

    var id = $(this).data("id");
    let _url = `categorias/${id}`;

    $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
            if (response) {

                $('#modalEditCategory').modal('show');
                $('#idEdit').val(response.id);
                $('#descriptionEdit').val(response.description);

            }
        }
    })
});

$('#ButtonEditCategory').click(function() {

    $(this).attr('disabled', 'disabled').text('Editando...');

    var id = $('#idEdit').val();
    var description = $('#descriptionEdit').val();

    let _url = `categorias/${id}`;
    let _token = $('meta[name="csrf-token"]').attr('content');

    console.log(id);
    console.log(description);
    console.log(_url);
    console.log(_token);

    $.ajax({
        url: _url,
        type: "PUT",
        data: {
            id: id,
            description: description,
            token: _token
        },
        dataType: "JSON",

        success: function(response) {
            if (response) {
                table.draw();

                $('#modalEditCategory').modal('hide');
                $('#ButtonEditCategory').removeAttr('disabled', 'disabled').text('Editar');

                Swal.fire(
                    'Editado!',
                    response.success,
                    'success'
                )
            }

        },
        error: function(requestObject, error, errorThrown) {
            console.log(error);
            console.log(errorThrown);
            console.log(requestObject);

        }


    })
});
