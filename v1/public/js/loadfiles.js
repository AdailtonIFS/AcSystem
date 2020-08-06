
    $("#lab").click(function(e){
        $.ajax({
            url: "http://localhost/AirConditioning/app/controller/auxController",
            method: "POST",
            dataType: "json",
            data: {request:'laboratorios',controller:'LabsController', method:'index'},
        }).done(function(result){
            console.log(result);
        }).fail(function(jqXHR, textStatus,error) {
            console.log(error, textStatus);
        }).always(function(data) {
            console.log(data);
        })

    });
