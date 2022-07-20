


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
               
               mensaje(json.mensaje,0);

               //$("#mensaje").html(html).fadeIn();
               limpiarCamposjuridico();
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


function limpiarCamposjuridico(){

    $("#hidinquilino").val("");
    $("#registroCodigoj").val("");
    $("#registroNombrej").val("");
    $("#registroRifj").val("");
    $("#registroDirecionj").val("");
    $("#registroactividad").val("");
    $("#registroCelularj").val("");
    $("#registroEmailj").val("");
    $("#registroPoder").val("");
    $("#nombreRegistro").val("");
    $("#fechaRegistro").val("");
    $("#numeroRegistro").val("");
    $("#tomoRegistro").val("");
    $("#foliRegistro").val("");
    $("#foliRegistro").val("");
    
    
    
  

}




function generarCodigoInquilinoj(){


    $("#registroNombrej").on('keyup', function () {

        var prmNombre= this.value;
        

        $("#registroCodigoj").val('');
        $("#registroCodigoj").val(codigoInquilino(prmNombre));

    });


}



