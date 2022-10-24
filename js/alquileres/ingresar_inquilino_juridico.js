


function guardarInquilinoJuridico(){

  
    $("#registroinquilinoj").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        


   //alert("llamo a las funciones juridicas");

if ($("#cbopagadorj").val() == "") {
    mensaje("Debe indicar si el inquilino posee pagador",1);
    return;
}
 
if ($("#registroNombrej").val() == "") {
    mensaje("Debe indicar el Nombre o Razón Social del inquilino",1);
    return;
}



if ($("#registroactividad").val() == "") {
    mensaje("Debe indicar la Actividad Comercial del inquilino",1);
    return;
}


if ($("#registroRifj").val() == "") {
        mensaje("Debe indicar el rif del inquilino",1);
        return;
        }
 
if ($("#registroDirecionj").val() == "") {
    mensaje("Debe indicar la Dirección Fiscal del inquilino ",1);
    return;
    }
 
 if ($("#registroCelularj").val() == "") {
     mensaje("Debe indicar el celular del inquilino",1);
     return;
     }


 if ($("#registroEmailj").val() == "") {
     mensaje("Debe indicar una direccion de correo valida",1);
     return;
 } else {
     var respuesta = validateEmail($("#registroEmailj").val());

     if (respuesta == false) {
         mensaje("La direccion de correo es invalida",1);
         return;
     }
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
   formData.append('opcion','I');
   /*
   |-----------------------------------------------
   | AQUI SE LLAMA EL AJAX 
   |-----------------------------------------------
   */
   $.ajax({
       url: "app/handler/alquileres/hndregistroinquilinosj.php",
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
               limpiarFormulario(1);
               //limpiarTabla();
               //botones(0);
               //cargarUsuarios();

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



function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("registroinquilinoj").reset();
    }

}



function generarCodigoInquilinoj(){


    $("#registroNombrej").on('keyup', function () {

        var prmNombre= this.value;
      

        $("#registroCodigoj").val('');

        codigoInquilino(prmNombre,function(result){
            $("#registroCodigoj").val(result);
        });


    });

   
   

}



