$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#systemLogin').click(function (e) { 
    e.preventDefault();
    
    let _token = $('meta[name="csrf-token"]').attr('content');
    var data = $('#formLogin').serialize()+'&_token='+_token;

    console.log(data)

    $.ajax({
        type: "post",
        url: "/login/todo",
        data: data,
        dataType: 'json',
        success: function (response) {
            $('#registrationError').addClass('d-none').html('');
            $('#passwordError').addClass('d-none').html('');
            if(response.message === 'sucess'){
                window.location.href = "/home";
            }
            else{
                $('#Error').removeClass('d-none').text(response.message)
            }
        }, error: function (data){
                $('#registrationError').addClass('d-none').html('');
                $('#passwordError').addClass('d-none').html('');
                var errors = data.responseJSON;
                console.log(errors);
                if ($.isEmptyObject(errors) == false) {
                    $.each(errors.errors, function(key, value) {
                        var ErrorID = '#' + key + 'Error';
                        $(ErrorID).removeClass('d-none');
                        $(ErrorID).text(value);
                    });
                }
        }   
    });
});