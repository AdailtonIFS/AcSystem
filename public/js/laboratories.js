            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#table_id').DataTable({

                processing: true,
                serverSide: true,
                info: false,
                responsive: true,

                ajax: {
                    "url": "/laboratorios/pegarDados"
                },
                "columns": [
                    { data: 'id', name: 'id' },
                    { data: 'description', name: 'description' },
                    { data: 'status', name: 'status' },
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
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": '_all',
                    "className": "text-center",
                    "orderable": false, //set not orderable
                }, ],



            });

            $('body').on('click', '.deleteLab', function() {

                var id = $(this).data("id");
                let _url = `laboratorios/${id}`;

                $.ajax({
                    url: _url,
                    type: "GET",
                    success: function(response) {
                        if (response) {
                            Swal.fire({
                                position: 'top',
                                title: 'Tem certeza que deseja excluir o laboratório?',
                                html: 'Laboratório:   ' + response.id + '</br>' +
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
                                        url: `laboratorios/${id}`,
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

            $('body').on('click', '.openEditLabModal', function(e) {

                e.preventDefault();

                var id = $(this).data("id");
                let _url = `laboratorios/${id}`;

                $.ajax({
                    url: _url,
                    type: "GET",
                    success: function(response) {

                        if (response) {
                            $('#editLabModal').modal('show');
                            $('#idEdit').val(response.id);
                            $('#descriptionEdit').val(response.description);
                            if (response.status == 0) {
                                $("select option[value='0']").attr("selected", "selected");
                                if ($("select option[value='1']").attr("selected", "selected")) {
                                    $("select option[value='1']").removeAttr("selected", "selected");
                                }
                            } else {
                                $("select option[value='1']").attr("selected", "selected");
                                if ($("select option[value='0']").attr("selected", "selected")) {
                                    $("select option[value='0']").removeAttr("selected", "selected");
                                }
                            }
                        }

                    }
                })
            });



            $("#addLab").click(function(e) {

                e.preventDefault();

                var id = $('#id').val();
                var description = $('#description').val();
                let _url = `laboratorios`;
                let _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: _url,
                    type: "POST",
                    data: {
                        id: id,
                        description: description,
                        _token: _token
                    },
                    success: function(response) {
                        if (response) {
                            table.draw();
                            if (!$('#idError').hasClass('d-none') || !$('#descriptionError').hasClass('d-none')) {
                                $('#idError').addClass('d-none')
                                $('#descriptionError').addClass('d-none')
                            }
                            $('#labForm').trigger("reset");
                            $('#addLabModal').modal('hide');

                            Swal.fire(
                                'Cadastrado!',
                                response.success,
                                'success'
                            )
                        }

                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        if ($.isEmptyObject(errors) == false) {
                            $.each(errors.errors, function(key, value) {
                                var ErrorID = '#' + key + 'Error';

                                $(ErrorID).removeClass('d-none');
                                $(ErrorID).text(value);
                            });
                        }
                    }
                })
            });



            $('.editLab').click(function(e) {

                $(this).attr('disabled', 'disabled');
                e.preventDefault();

                var id = $('#idEdit').val();
                var description = $('#descriptionEdit').val();
                var status = $("#status option:selected").val();

                let _url = `laboratorios/${id}`;
                let _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: _url,
                    type: "PUT",
                    data: {
                        id: id,
                        description: description,
                        status: status,
                        _token: _token
                    },
                    success: function(response) {
                        if (response) {
                            table.draw();
                            if (!$('#idError').hasClass('d-none') || !$('#descriptionError').hasClass('d-none')) {
                                $('#idError').addClass('d-none')
                                $('#descriptionError').addClass('d-none')
                            }
                            $('#editLabModal').modal('hide');
                            $('.editLab').removeAttr('disabled', 'disabled');

                            Swal.fire(
                                'Editado!',
                                response.success,
                                'success'
                            )
                        }

                    },
                    error: function(data) {
                        var errors = data.responseJSON;
                        if ($.isEmptyObject(errors) == false) {
                            $.each(errors.errors, function(key, value) {
                                var ErrorID = '#' + key + 'Error';

                                $(ErrorID).removeClass('d-none');
                                $(ErrorID).text(value);
                            });
                        }
                    }

                })


            });




            function openModal(evt, modal) {
                evt.preventDefault();
                $('#' + modal).modal('show');
            }

            function closeModal(evt, modal) {
                evt.preventDefault();
                $('#' + modal).modal('hide');
                $('#labForm').trigger("reset");
            }