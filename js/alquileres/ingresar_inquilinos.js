function inicio(){

  
    cargarEstados();
    cargarBancos('cboBancoN');
    cargarBancos('cboBancoJ');
    cargarBancos('cboBancop');
    cargarBancos('cboBancoNP');


}


function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}



function guardarInquilino(){

    $("#registrarinquilino").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

 
   if ($("#registroNombre").val() == "") {
    mensaje("Debe indicar el nombre del inquilino",1);
    return;
}

if ($("#registroApellido").val() == "") {
    mensaje("Debe indicar el apellido del inquilino",1);
    return;
}

if ($("#registroNacionalidad").val() == "") {
 mensaje("Debe indicar la nacionalidad del inquilino",1);
 return;
 }

 if ($("#registroCedula").val() == "") {
     mensaje("Debe indicar la cédula del inquilino",1);
     return;
     }
 
 if ($("#registroTeléfono").val() == "") {
     mensaje("Debe indicar el telefono del inquilino",1);
     return;
     }
 
 if ($("#registroCelular").val() == "") {
     mensaje("Debe indicar el celular del inquilino",1);
     return;
     }

 if ($("#registroRif").val() == "") {
     mensaje("Debe indicar el rif del inquilino",1);
     return;
     }
 
 if ($("#registroEstado").val() == "") {
         mensaje("Debe colocar el campo el estado ",1);
         return;
         }

 if ($("#registroMunicipio").val() == "") {
     mensaje("Debe colocar el campo el municipio ",1);
     return;
     }

 if ($("#registroParroquia").val() == "") {
     mensaje("Debe colocar el campo el parroqui ",1);
     return;
     }
 
 if ($("#registroDirecionH").val() == "") {
     mensaje("Debe indicar la dirección de habitación del propietario ",1);
     return;
     }

 if ($("#registroDirecionO").val() == "") {
     mensaje("Debe indicar la dirección de la oficina del propietario ",1);
     return;
     }
 

 if ($("#registroEmail").val() == "") {
     mensaje("Debe indicar una direccion de correo valida",1);
     return;
 } else {
     var respuesta = validateEmail($("#registroEmail").val());

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
       url: "app/handler/alquileres/hndregistroinquilino.php",
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
               limpiarCampos();
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


function limpiarCampos(){

    $("#hidinquilino").val("");
    $("#registroNombre").val("");
    $("#registroApellido").val("");
    $("#registroUsuario").val("");
    $("#registroEmail").val("");
    $("#registroContrasena").val("");

}







$(document).ready(function() {


    inicio();



});