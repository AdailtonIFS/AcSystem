$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var table = $('#tableUsers').DataTable({
                    
    processing : true,
    serverSide: true,
    info:false,
    responsive: true,

    ajax : {
        "url" : "/usuarios/pegarDados"
    },
    "columns" : [ 
        {data: 'registration', name: 'registration'},
        {data: 'name', name: 'name'},
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
                  "orderable": false, //set not orderable
                  "className": "text-center",
                },
          ],
         
});

    $('.addUser').click(function (e) {

        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "categorias/pegarDados",
            success: function (response) {
                $.each(response, function(key, data) {
                    $('#category').append($("<option></option>").attr("value", data.id).text(data.description));
                });
            }
        });
        $('#modalAddUser').modal('show')
    })

    $('#createNewUser').click(function (){
        $( this ).attr('disabled','disabled').text('Cadastrando...');

        let _token   = $('meta[name="csrf-token"]').attr('content');

        var data =$('#newUser').serialize()+'&_token='+_token;

        console.log(data);

        $.ajax({

            type: "POST",
            url: "usuarios",
            data: data,
            success: function (response) {
                alert(response.success)
            },error: function(response){
                alert('não foi')
            }
        });
    })