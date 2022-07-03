function inicio(){

    $("#registrarusuario").on('submit', function(evt) {

        /*
        |-----------------------------------------------
        | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
        |-----------------------------------------------
        */
        evt.preventDefault();
        /**********************************************/        

        //alert("aqui registro el usuario");
        //return;


        $("#error").html("");

        $.ajax({
            url: "../handler/admin/hndregistrousuarios.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                //$("#preview").fadeOut();
                $("#error").fadeOut();
            },
            success: function (data) {
                
                console.log(data);

                $("#error").html("Archivo Invalido").fadeIn();
/*

                if (data == 'invalid') {
                    // invalid file format.
                    $("#error").html("Archivo Invalido"); //.fadeIn();
                } else if (data == 'badres') {
                    $("#error").html("La resolucion del archivo es incorrecta debe ser 640x427").fadeIn();
                }
                else {
                    // view uploaded file.
                    $("#preview").html(data).fadeIn();
                    $("#frmAgregar")[0].reset();
                }
*/
            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });



    });


}


function registrar(){




}

$(document).ready(function() {


    inicio();




});