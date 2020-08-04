$('#formRegister').submit(function(e){
    e.preventDefault();

    var u_name = $('#numLab').val();
    var u_comment = $('#description').val();

    console.log(u_name, u_comment);

});