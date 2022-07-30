
function inicio(){

  
    generarCodigoPropietario();
    cargarEstados();
    cargarBancos('cboBancoN');
    cargarBancos('cboBancoJ');
    cargarBancos('cboBancop');
    cargarBancos('cboBancoNP');
    guardarPropietarios();
    

    jQuery("#registroNombre").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroApellido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });




    jQuery("#registroCedula").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroTelefono").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroCelular").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#num_cuen").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#ced_pmov").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#cel_pmov").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });


}

function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}


function guardarPropietarios(){

    $("#registrarpropietario").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        


   //mensajeNatural();
   //return;


   if ($("#registroNombre").val() == "") {
       mensaje("Debe indicar el nombre del propietario",1);
       return;
   }

   if ($("#registroApellido").val() == "") {
       mensaje("Debe indicar el apellido del propietario",1);
       return;
   }

   if ($("#registroNacionalidad").val() == "") {
    mensaje("Debe indicar la nacionalidad del propietario",1);
    return;
    }

    if ($("#registroCedula").val() == "") {
        mensaje("Debe indicar la cédula del propietario",1);
        return;
        }
    
    if ($("#registroTeléfono").val() == "") {
        mensaje("Debe indicar el telefono del propietario",1);
        return;
        }
    
    if ($("#registroCelular").val() == "") {
        mensaje("Debe indicar el celular del propietario",1);
        return;
        }

    if ($("#registroRif").val() == "") {
        mensaje("Debe indicar el rif del propietario",1);
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


    if ($("#registroEstado").val() == "") {
        mensaje("Debe indicar el estado de residencia del propietario",1);
        return;
        }
    
    if ($("#registroMunicipio").val() == "") {
        mensaje("Debe indicar el Municipio de residencia del propietario",1);
        return;
        }

    if ($("#registroParroquia").val() == "") {
        mensaje("Debe indicar la parroquia de residencia del propietario",1);
        return;
        }
    
    
    if ($("#cboBancoN").val() == "") {
        mensaje("Debe indicar el banco del propietario",1);
        return;
        }

    if ($("#num_cuen").val() == "") {
        mensaje("Debe indicar el numero de cuenta del banco",1);
        return;
        } else {

            var numcuentaTMP = $("#num_cuen").val(); 

            if (numcuentaTMP.length<20){
                mensaje("El Numero de cuenta debe ser de 20 digitos.",1);
                return;

            } else {

                if(validarCuentaBanco('cboBancoN',numcuentaTMP) == false){
                    mensaje("El Numero de cuenta registrado no concuerda con el banco seleccionado.",1);
                    return;
                }

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
            url: "app/handler/alquileres/hndregispropietarios.php",
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

                //console.log("Mensaje del JSON: " + json.mensaje);

                if(json.error == 0){
                    
                    mensaje(json.mensaje,0);

                    //$("#mensaje").html(html).fadeIn();
                    //limpiarCampos();
                    //limpiarTabla();
                    botones(0);

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



function botones(opcion){

    if(opcion == 1){
    
        $(".cancelar").show();
    
    } else {
        
        $(".cancelar").hide();
    
    }
    
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



function mensajeNatural(){

    
    var htmlContenido="";
    var htmlApoderado="";
    var htmlInmueble="";
   
    htmlContenido='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + 'P-JEAN PERAZA-0001';


  
    htmlApoderado='<a href="index.php?url=app/vistas/alquileres/ingresar_apoderado&parametros=1" class="btn btn-primary">Apoderado</a>';
    htmlInmueble='<a href="index.php?url=app/vistas/alquileres/ingresar_inmueble&parametros=1" class="btn btn-primary">Inmueble</a>';

    $('#spanMsgProNatu').html('');
    $('#spanApoderado').html('');
    $('#spanInmueble').html('');

    $('#spanMsgProNatu').html(htmlContenido);
    $('#spanApoderado').html(htmlApoderado);
    $('#spanInmueble').html(htmlInmueble);

    //open the modal
    $('#msgModalProNatu').modal('show');

}


function mensajeJuridico(){

    var htmlContenido="";
    var htmlApoderado="";
    var htmlInmueble="";
   
    htmlContenido='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + 'P-JEAN PERAZA-0001';

    htmlApoderado='<a href="index.php?url=app/vistas/alquileres/representante" class="btn btn-primary">Representante</a>';
    htmlInmueble='<a href="index.php?url=app/vistas/alquileres/inmuebles" class="btn btn-primary">Inmueble</a>';

    $('#spanMsgProNatu').html('');
    $('#spanApoderado').html('');
    $('#spanInmueble').html('');

    $('#spanMsgProNatu').html(htmlContenido);
    $('#spanApoderado').html(htmlApoderado);
    $('#spanInmueble').html(htmlInmueble);

    //open the modal
    $('#msgModalProNatu').modal('show');


}




function generarCodigoPropietario(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');
        $("#registroCodigo").val(codigoPropietario(prmNombre + ' ' + prmApellido));

    });

    $("#registroApellido").on('keyup', function () {

        var prmNombre= $("#registroNombre").val(); 
        var prmApellido=this.value;

        $("#registroCodigo").val('');
        $("#registroCodigo").val(codigoPropietario(prmNombre + ' ' + prmApellido));

    });
   

}





$(document).ready(function() {


    inicio();



});