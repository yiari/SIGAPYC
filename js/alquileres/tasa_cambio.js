function inicio(){

    consultarTasaCambio();
    guardarTasaCambio();
    limpiarCampos();


}


function consultarTasaCambio(){

       /*
        |-----------------------------------------------
        | AQUI SE CAPTURA LOS DATOS DEL FORMULARIO 
        |-----------------------------------------------
        */
        var formData = new FormData();
        /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        formData.append('opcion','C');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistrotasacambio.php",
            type: "POST",
            data: formData, //new FormData(this),
            contentType: false,
            dataType: "json",
            cache: false,
            processData: false,
            beforeSend: function () {
                //$("#preview").fadeOut();
                $("#error").fadeOut();
            },
            success: function (data) {
            var json = data;
            var html = "";

                console.log("Mensaje del JSON: " + json.mensaje);

                if(json.error == 0){
                    
                    $("#hidcambio").val(json.Items[0].id);
                    $("#registroMonto").val(json.Items[0].cambio);


                    //mensaje(json.mensaje,0);

                    //$("#mensaje").html(html).fadeIn();
                    //limpiarCampos();


                }else {

                    //mensaje(json.mensaje,1);

                    //$("#mensaje").html(html).fadeIn();
                }



            },
            error: function (e) {
                //$("#error").html(e).fadeIn();
                mensaje(e,1);
                
            }
        });



}

function guardarTasaCambio(){

         $("#tasacambio").on('submit', function(evt) {
        /*
        |-----------------------------------------------
        | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
        |-----------------------------------------------
        */
        evt.preventDefault();
        /**********************************************/        



        if ($("#registroMonto").val() == "") {
            mensaje("Debe indicar la tasa de cambio del día según el BCV",1);
            return;
        }
    

        /*
        |-----------------------------------------------
        | LIMPIA EL CAMPO MENSAJE 
        |-----------------------------------------------
        */
        $("#error").html("Ejecutando...");
        /*
        |-----------------------------------------------
        | AQUI SE CAPTURA LOS DATOS DEL FORMULARIO 
        |-----------------------------------------------
        */
        var formData = new FormData(this);
        /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        formData.append('opcion','ITC');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistrotasacambio.php",
            type: "POST",
            data: formData, //new FormData(this),
            contentType: false,
            dataType: "json",
            cache: false,
            processData: false,
            beforeSend: function () {
                //$("#preview").fadeOut();
                $("#error").fadeOut();
            },
            success: function (data) {
            var json = data;
            var html = "";

                console.log("Mensaje del JSON: " + json.mensaje);

                if(json.error == 0){
                    
                    let urlATRAS  =$('.atrasURL').attr('href')
                    mensaje(json.mensaje,0,urlATRAS);

                    //$("#mensaje").html(html).fadeIn();
                    limpiarCampos();
                    consultarTasaCambio();

                }else {

                    mensaje(json.mensaje,1);

                    //$("#mensaje").html(html).fadeIn();
                }



            },
            error: function (e) {
                //$("#error").html(e).fadeIn();
                mensaje(e,1);
                
            }
        });



    });

}


function limpiarCampos(){

        $("#hid").val("");
        $("#registroMonto").val("");
        
    

}



function mensaje(mensaje, condicion, url = ""){

    var html="";
    var urlhtml="";

    if(condicion == 0){//ESTOS SON MENSAJES CON EXITO

        if(url != ""){
            $('#btnMensajeNormal').hide(); //OCULTO EL BOTON NORMAL
            $('#btnMensajeAtras').show(); //MUESTRO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
                       
            html='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + mensaje;

            urlhtml = '<a class="btn btn-primary" href="' + url + '"  role="button">Aceptar</a>';


        } else {
            $('#btnMensajeNormal').show(); //MUESTRO EL BOTON NORMAL
            $('#btnMensajeAtras').hide(); //OCUTLO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
            html='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + mensaje;
        }


        

    } else if (condicion == 1){//ESTOS SON MENSAJES CON ERROR
        $('#btnMensajeNormal').show(); //MUESTRO EL BOTON NORMAL
        $('#btnMensajeAtras').hide(); //OCUTLO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
        html='<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color:#bf1d1d;"></i>&nbsp' + mensaje;
    }


    $('#spanMsg').html('');
    $('#spanMsg').html(html);

    if(url != ""){
        $('#btnMensajeAtras').html('');
        $('#btnMensajeAtras').html(urlhtml);
    }

    //open the modal
    $('#msgModal').modal('show');

}



$(document).ready(function() {


    inicio();



});