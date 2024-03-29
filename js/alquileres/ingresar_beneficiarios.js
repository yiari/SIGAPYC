function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    $('#id_prop').val(getParameterByName('idpro'));
    $('#id_propietarioj').val(getParameterByName('idpro'));
    $('#tipo_propietario').val(getParameterByName('codtip'));
    $('#tipo_propietarioj').val(getParameterByName('codtip'));

    let idPropietario = getParameterByName('idpro');
    let prmCodPro = getParameterByName('codpro');
    let prmTipo = getParameterByName('codtip');
    /*--------------------------------------*/    

    codigoPropietario(prmCodPro);
    atrasbeneficiario(idPropietario,prmCodPro,prmTipo);
 
    generarCodigoBeneficiario();
    cargarEstados();
    cargarBancos('cboBancoN');
    cargarBancos('cboBancoNP');
    guardarBeneficiario();


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
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z  ]/g, ''));
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
        jQuery(this).val(jQuery(this).val().replace(/[^0-9'.']/g, ''));
    });

    jQuery("#cel_pmov").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });
/*
    |-------------------------
    | ESTO ES LO JURIDICO
    |------------------------------
    */
    
    guardarBeneficiarioJ();
    generarCodigoBeneficiarioj();
    

    cargarBancos('cboBancoj');
    cargarBancos('cboBancop');
 

    jQuery("#registroNombrej").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ^0-9'.']/g, ''));
    });

    jQuery("#registroCelularj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9'.']/g, ''));
    });

    jQuery("#num_cuenj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#ced_pmovj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9'.']/g, ''));
    });

    jQuery("#cel_pmovj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });


}

function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}


function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}

function atrasbeneficiario(prmIdPro,prmCodPro,prmTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/beneficiarios&idpro=' + prmIdPro  + '&codpro=' + prmCodPro + '&codtip=' + prmTipo;
    
        $(".codpro").prop("href", html);


    //}

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







function guardarBeneficiario(){

    $("#registrarbeneficiario").on('submit', function(evt) {
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
       mensaje("Debe indicar el nombre del beneficiario",1);
       return;
   }

   if ($("#registroApellido").val() == "") {
       mensaje("Debe indicar el apellido del beneficiario",1);
       return;
   }

   if ($("#registroNacionalidad").val() == "") {
    mensaje("Debe indicar la nacionalidad del beneficiario",1);
    return;
    }

    if ($("#registroCedula").val() == "") {
        mensaje("Debe indicar la cédula del beneficiario",1);
        return;
        }
    
    if ($("#registroTeléfono").val() == "") {
        mensaje("Debe indicar el telefono del beneficiario",1);
        return;
        }
    
    if ($("#registroCelular").val() == "") {
        mensaje("Debe indicar el celular del beneficiario",1);
        return;
        }

    if ($("#registroRif").val() == "") {
        mensaje("Debe indicar el rif del beneficiario",1);
        return;
        }
    
    if ($("#cboEstados").val() == "") {
            mensaje("Debe colocar el campo el estado ",1);
            return;
            }

    if ($("#cboMunicipios").val() == "") {
        mensaje("Debe colocar el campo el municipio ",1);
        return;
        }

    if ($("#cboParroquia").val() == "") {
        mensaje("Debe colocar el campo el parroqui ",1);
        return;
        }
    
   /* if ($("#registroDirecionH").val() == "") {
        mensaje("Debe indicar la dirección de habitación del beneficiario ",1);
        return;
        }*/

   /* if ($("#registroDirecionO").val() == "") {
        mensaje("Debe indicar la dirección de la oficina del beneficiario ",1);
        return;
        }*/
    
     /*   if ($("#registroEmail").val() == "") {
            mensaje("Debe indicar una direccion de correo valida",1);
            return;
        } else {
            var respuesta = validateEmail($("#registroEmail").val());
    
            if (respuesta == false) {
                mensaje("La direccion de correo es invalida",1);
                return;
            }
        }*/
    
    
    
   /* if ($("#cboBancoN").val() == "") {
        mensaje("Debe indicar el banco del beneficiario",1);
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


        }*/
 
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
            url: "app/handler/alquileres/hndregistrobeneficiarios.php",
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
                    
                    let urlATRAS  =$('.atrasURL').attr('href')
                    mensaje(json.mensaje,0,urlATRAS);

                    //$("#mensaje").html(html).fadeIn();
                    limpiarFormulario(1);
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



function guardarBeneficiarioJ(){

    $("#registrarbeneficiarioj").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        


   //mensajeNatural();
   //return;


   if ($("#registroNombrej").val() == "") {
       mensaje("Debe indicar el nombre del beneficiario juridico",1);
       return;
   }


    if ($("#registroRifj").val() == "") {
        mensaje("Debe indicar el rif del beneficiario",1);
        return;
        }

    if ($("#registroCelularj").val() == "") {
        mensaje("Debe indicar el celular del beneficiario juridico",1);
        return;
        }
    
   
    if ($("#registroDirecionHj").val() == "") {
        mensaje("Debe indicar la dirección de habitación del beneficiario ",1);
        return;
        }

    if ($("#registroActividad").val() == "") {
        mensaje("Debe indicar la actividad comencial del beneficiario ",1);
        return;
        }

    

   /* if ($("#registroEmailj").val() == "") {
        mensaje("Debe indicar una direccion de correo valida",1);
        return;
    } else {
        var respuesta = validateEmail($("#registroEmailj").val());

        if (respuesta == false) {
            mensaje("La direccion de correo es invalida",1);
            return;
        }
    }*/


   /* if ($("#cboBancoj").val() == "") {
        mensaje("Debe indicar el banco del beneficiario",1);
        return;
        }

    if ($("#num_cuenj").val() == "") {
        mensaje("Debe indicar el numero de cuenta del banco",1);
        return;
        } else {

            var numcuentaTMP = $("#num_cuenj").val(); 

            if (numcuentaTMP.length<20){
                mensaje("El Numero de cuenta debe ser de 20 digitos.",1);
                return;

            } else {

                if(validarCuentaBanco('cboBancoj',numcuentaTMP) == false){
                    mensaje("El Numero de cuenta registrado no concuerda con el banco seleccionado.",1);
                    return;
                }

            } 


        }*/


        
 
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
            url: "app/handler/alquileres/hndregistrobeneficiariosj.php",
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
                    
                    let urlATRAS  =$('.atrasURL').attr('href')

                    mensaje(json.mensaje,0,urlATRAS);

                    //$("#mensaje").html(html).fadeIn();
                    limpiarFormulario(1);
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


function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("registrarbeneficiario").reset();
    }

}






function generarCodigoBeneficiario(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');
        codigoBeneficiario(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });
        /*
        $("#registroCodigo").val(codigoApoderado(prmNombre + ' ' + prmApellido));
        */
    });

    $("#registroApellido").on('keyup', function () {

        var prmNombre= $("#registroNombre").val(); 
        var prmApellido=this.value;

        $("#registroCodigo").val('');
        codigoBeneficiario(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });
        /*
        $("#registroCodigo").val(codigoApoderado(prmNombre + ' ' + prmApellido));
        */
    });
   

}







$(document).ready(function() {


    inicio();



});