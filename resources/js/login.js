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
            console.log(response)
            if(response.message === 'sucess'){
                window.location.href = "/home";
            }
            else{
                $('#Error').removeClass('d-none').text(response.message)
            }
        }, error: function (request, status, data){
            console.log(request,status,data);
        }   
    });
});