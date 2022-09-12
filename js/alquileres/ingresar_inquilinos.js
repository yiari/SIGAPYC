function inicio(){

  

    cargarEstados();
    guardarInquilino();
    generarCodigoInquilino();


     /*
    |--------------------------------------------------
    | TODOS LOS CAMPOS DE TEXTO ESCRIBEN EN MAYUSCULA
    |--------------------------------------------------
    */
    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    /*------------------------------------------------*/
    
  
    jQuery("#registroNombre").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroApellido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroCedula").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9'.']/g, ''));
    });

    jQuery("#registroTelefono").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroCelular").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });



    /*
    |-------------------------
    | ESTO ES LO JURIDICO
    |------------------------------
    */


    guardarInquilinoJuridico();
    generarCodigoInquilinoj();

    jQuery("#registroNombreJ").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });


    jQuery("#registroCelularj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });





}


function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}



function guardarInquilino(){

    $("#registroinquilino").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

   if ($("#cbopagador").val() == "") {
    mensaje("Debe indicar si el inquilino posee pagador",1);
    return;
}
 
if ($("#registroNombre").val() == "") {
    mensaje("Debe indicar el nombre del inquilino",1);
    return;
}

if ($("#registroApellido").val() == "") {
    mensaje("Debe indicar el apellido del inquilino",1);
    return;
}



 if ($("#registroCedula").val() == "") {
     mensaje("Debe indicar la cédula del inquilino",1);
     return;
     }

if ($("#registroNacionalidad").val() == "") {
mensaje("Debe indicar la nacionalidad del inquilino",1);
return;
}

if ($("#registroRif").val() == "") {
        mensaje("Debe indicar el rif del inquilino",1);
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
 
if ($("#cboEstados").val() == "") {
    mensaje("Debe indicar el estado de residencia del inquilino",1);
    return;
    }

if ($("#cboMunicipios").val() == "") {
    mensaje("Debe indicar el Municipio de residencia del inquilino",1);
    return;
    }

if ($("#cboParroquia").val() == "") {
    mensaje("Debe indicar la parroquia de residencia del inquilino",1);
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
               
               limpiarFormulario(1);
               //botones(0);
               cargarInquilino();

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


function mensaje(mensaje, condicion){

    var html="";

    if(condicion == 0){//ESTOS SON MENSAJES CON EXITO

        html='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + mensaje;

    } else if (condicion == 1){//ESTOS SON MENSAJES CON ERROR

        html='<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color:#bf1d1d;"></i>&nbsp' + mensaje;
    }


    $('#spanMsg').html('');
    $('#spanMsg').html(html);
    //open the modal
    $('#msgModal').modal('show');

}



function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("registroinquilino").reset();
    }

}




function generarCodigoInquilino(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');

        codigoInquilino(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });


    });

    $("#registroApellido").on('keyup', function () {

        var prmNombre= $("#registroNombre").val(); 
        var prmApellido=this.value;

        $("#registroCodigo").val('');
        codigoInquilino(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });

    });
   

}








$(document).ready(function() {


    inicio();



});