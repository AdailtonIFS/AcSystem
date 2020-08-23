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
          //Set column definition initialisation properties.
          "columnDefs": [
              {
                  "targets": '_all',
                  "orderable": false, //set not orderable
                  "className": "dt-center",
                },
          ],
         
      });