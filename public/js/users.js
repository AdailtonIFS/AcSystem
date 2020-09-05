$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var table = $('#tableUsers').DataTable({
                    
    processing : true,
    serverSide: true,
    info:false,
    ajax : {
        "url" : "api/users"
    },
    "columns" : [ 
        {data: 'registration', name: 'registration'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'status', name: 'status'},
        {data: 'description', name: 'description'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
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
        "columnDefs": [
            {
                "targets": '_all',
                "className": "text-center",
                },
        ],
});
    $('.addUser').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "api/categories",
            success: function (response) {
                if($.isEmptyObject(response.data) == false){
                    $.each(response.data, function(key, data) {
                        $('#category').append($("<option></option>").attr("value", data.id).text(data.description));
                    });
                    $('#modalAddUser').modal('show')
                }else{
                    Swal.fire(
                        'Por favor, cadastre as categorias!',
                        '',
                        'warning'
                    )
                }
            }
        });
    })

    $('#cancelNewUser','#cancelNewUser1').click(function (e) {
        $ ('#category').empty().append('<option value="error">Escolha a categoria</option>');
    })

    $('#createNewUser').click(function (){
        $( this ).attr('disabled','disabled').text('Cadastrando...');
        let _token   = $('meta[name="csrf-token"]').attr('content');
        var data =$('#newUser').serialize()+'&_token='+_token;
        console.log(data);
        $.ajax({
            type: "POST",
            url: "api/users",
            data: data,
            success: function (response) {
            table.draw();
            $('#modalAddUser').modal('hide');
            $('#createNewUser').removeAttr('disabled', 'disabled').text('Cadastrar');
            $('#category').empty().append('<option value="error">Escolha a categoria</option>');
            $('#newUser').trigger('reset');
            Swal.fire(
                'Cadastrado!',
                response.success,
                'success'
            )
            },error: function(requestObject, error, errorThrown) {
                console.log(error);
                console.log(errorThrown);
                console.log(requestObject);
            }
        });
    })

    $('body').on('click', '.deleteUser', function() {
        var registration = $(this).data("id");
        let _url = `api/users/${registration}`;
        $.ajax({
            url: _url,
            type: "GET",
            success: function(response) {
                if (response) {
                    Swal.fire({
                        position: 'top',
                        title: 'Essa ação é irreversível',
                        text: 'Tem certeza que deseja excluir o '+response[0].name+' de matricula '+response[0].registration,
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
                                url: `api/users/${registration}`,
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
                                },
                            })
                        }
                    })
                }
            },error: function(requestObject, error, errorThrown) {
                console.log(error);
                console.log(errorThrown);
                console.log(requestObject);
            }
        })
    });
