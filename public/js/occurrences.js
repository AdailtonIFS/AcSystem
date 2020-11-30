/**
 * Open addOccurrenceModal
 */
$('.addOccurrence').click(function (e) {
    e.preventDefault();
    $('#addOccurrenceModal').modal('show');
    // Verify if the inputs have any content
    if (!$('#observationError').hasClass('d-none') || !$('#occurrenceError').hasClass('d-none')) {
        $('#observationError').addClass('d-none')
        $('#occurrenceError').addClass('d-none')
    }
    $('#occurrenceForm').trigger("reset");
})

/**
 * Ajax request to route.
 */
$("#createNewOccurrence").click(function (e) {
    e.preventDefault();
    $(this).attr('disable', 'disable').text('Cadastrando...')
    let occurrence = $('#occurrence').val();
    let observation = $('#observation').val();
    let laboratory_id = $('#laboratory_id').val();
    let _url = `api/occurrences`;
    let _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: _url,
        type: "POST",
        data: {
            occurrence: occurrence,
            observation: observation,
            laboratory_id: laboratory_id,
            _token: _token
        },
        success: function (response) {
            if (response) {
                $('#occurrenceForm').html(response);
            }
        },
        error: function (data) {
            console.log(data)
            $('#occurrenceForm').html(data);
            var errors = data.responseJSON;
            if ($.isEmptyObject(errors) == false) {
                $.each(errors.errors, function (key, value) {
                    var ErrorID = '#' + key + 'Error';
                    $(ErrorID).removeClass('d-none');
                    $(ErrorID).text(value);
                });
            }
        }
    })
});
