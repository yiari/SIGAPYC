
function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */


    let idPropietario = getParameterByName('idpro');
    let codigoPropietario = getParameterByName('codpro');
    let tipoPropietario = getParameterByName('codtip');


    if(tipoPropietario == 1){
        $("#nav-prop_juridico-tab").hide();
        $("#nav-prop_juridico").hide();
        $("#nav-prop_natural").addClass('show').addClass('active');

    } else if (tipoPropietario == 2) { 
        $("#nav-prop_natural-tab").hide(); 
        $("#nav-prop_natural").hide();

        $("#nav-prop_juridico").addClass('show').addClass('active');
    }

    /*--------------------------------------*/    


    generarCodigoPropietario();
    cargarEstados();
    cargarBancos('cboBancoN');
    cargarBancos('cboBancoNP');
    
   
    guardarPropietarios();
    
    
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


     /*
    |-------------------------
    | ESTO ES LO JURIDICO
    |------------------------------
    */


    //guardarPropietariosj();
    generarCodigoPropietarioj();
  
    cargarBancos('cboBancoj');
    cargarBancos('cboBancop');
 

   

    jQuery("#registroCelularj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#ced_pmovj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#cel_pmovj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

     jQuery("#num_cuenj").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#tel_zellej").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });



/*
|------------------------------------------------------------------------------------------------
| DESPUES DE CARGAR LAS FUNCIONES Y VALIDACIONES, ENTONCES SOLICITO LOS DATOS DEL PROPIETARIO
|-------------------------------------------------------------------------------------------------
*/


if(tipoPropietario == 1){

    consultarPropietario(idPropietario,codigoPropietario,tipoPropietario);

} else if (tipoPropietario == 2) { 
    consultarPropietarioJuridico(idPropietario,codigoPropietario,tipoPropietario);
}

guardarPropietariosjuridico();


}



function consultarPropietario(id,codigo,tipo){

console.log("consultando");

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
        var formData = new FormData();
        /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        formData.append('opcion','CP');

        formData.append('idPropietario',id);
        formData.append('codigoPropietario',codigo);
        formData.append('tipoPropietario',tipo);

    
        
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
            let idPropietario = 0;
                console.log("Mensaje del JSON: " + json);

                if(json.error == 0){
                    
                    //mensaje(json.mensaje,0);
                    if(json.Items.length > 0){


                        //<input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                        $('#hidpropietario').val(json.Items[0].id_prop);
                        $('#hidcuenta_id_nacional').val(json.Items[0].id_banco_nacional);
                        $('#hidcuenta_id_internacional').val(json.Items[0].id_banco_internacional);
                        $('#hidcuenta_id_paypal').val(json.Items[0].id_banco_internacional);
                        $('#hidcuenta_id_zelle').val(json.Items[0].id_banco_internacional);


                        /*
                        |------------------------------------------------------
                        | DATOS PRINCIPALES
                        |------------------------------------------------------
                        */
                        $('#registroNombre').val(json.Items[0].nom_prop);
                        $('#registroApellido').val(json.Items[0].ape_prop);
                        
                        $("select[name='registroNacionalidad']").val(json.Items[0].id_nacionalidad).change();


                        
                        $('#registroCedula').val(json.Items[0].cedula_prop);
                        $('#registroRif').val(json.Items[0].rif_prop);
                        $('#registroTelefono').val(json.Items[0].telefono_prop);
                        $('#registroCelular').val(json.Items[0].cel_prop);
                        $('#registroEmail').val(json.Items[0].correo_prop);


                        $("select[name='cboEstados']").val(json.Items[0].id_estado).change();
                        setTimeout(function(){ $("select[name='cboMunicipios']").val(json.Items[0].id_municipio).change() }, 2000);
                        setTimeout(function(){ $("select[name='cboParroquia']").val(json.Items[0].id_parroquia).change() }, 4000);

                        
                        $('#registroDirecionH').val(json.Items[0].dir_prop);
                        $('#registroDirecionO').val(json.Items[0].ofi_prop);


                        $("#registroCodigo").val(json.Items[0].cod_prop);

                        /*
                        |------------------------------------------------------
                        | DATOS BANCOS NACIONALES
                        |------------------------------------------------------
                        */
                        
                        $("select[name='cboBancoN']").val(json.Items[0].id_banco).change();
                        $('#num_cuen').val(json.Items[0].num_cuen);
                        $('#ced_pmov').val(json.Items[0].pagomovil_cedula);
                        $("select[name='cboBancoNP']").val(json.Items[0].pagomovil_id_banco).change();
                        $('#cel_pmov').val(json.Items[0].pagomovil_telefono);
                        
                        /*
                        |------------------------------------------------------
                        | DATOS BANCOS INTERNACIONALES
                        |------------------------------------------------------
                        */

                       
                        $('#ban_extr').val(json.Items[0].ban_extr);
                        $('#age_extr').val(json.Items[0].age_extr);
                        $('#dc_extr').val(json.Items[0].dc_extr);
                        $('#cue_extr').val(json.Items[0].cue_extr);
                        $('#iba_extr').val(json.Items[0].iba_extr);
                        $('#bic_extr').val(json.Items[0].bic_extr);


                       /*
                        |------------------------------------------------------
                        | DATOS PAYPAL
                        |------------------------------------------------------
                        */

                     
                        $('#cor_payp').val(json.Items[0].cor_payp);
                        $('#nom_payp').val(json.Items[0].nom_payp);

                        /*
                        |------------------------------------------------------
                        | DATOS zelle
                        |------------------------------------------------------
                        */
                     
                        $('#tel_zelle').val(json.Items[0].tel_zelle);
                        $('#cor_zelle').val(json.Items[0].cor_zelle);
                        $('#nom_zelle').val(json.Items[0].nom_zelle);
                      



                    }

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


}




function consultarPropietarioJuridico(id,codigo,tipo){

    console.log("consultando");
    
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
            var formData = new FormData();
            /*
            |-----------------------------------------------------
            | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
            |-----------------------------------------------------
            */
            formData.append('opcion','CP');
    
            formData.append('idPropietario',id);
            formData.append('codigoPropietario',codigo);
            formData.append('tipoPropietario',tipo);
    
        
            
            /*
            |-----------------------------------------------
            | AQUI SE LLAMA EL AJAX 
            |-----------------------------------------------
            */
            $.ajax({
                url: "app/handler/alquileres/hndregispropietariosj.php",
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
                let idPropietario = 0;
                    console.log("Mensaje del JSON: " + json);
    
                    if(json.error == 0){
                        
                        //mensaje(json.mensaje,0);
                        if(json.Items.length > 0){
    
    
                            //<input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                            $('#hiid_propj').val(json.Items[0].id_propj);
                            $('#hidcuenta_id_nacionalj').val(json.Items[0].id_banco_nacionalj);
                            $('#hidcuenta_id_internacionalj').val(json.Items[0].id_banco_internacionalj);
                            $('#hidcuenta_id_paypalj').val(json.Items[0].id_banco_internacionalj);
                            $('#hidcuenta_id_zellej').val(json.Items[0].id_banco_internacionalj);
    
    
                            /*
                            |------------------------------------------------------
                            | DATOS PRINCIPALES
                            |------------------------------------------------------
                            */

                           
                            $('#registroNombrej').val(json.Items[0].nom_proj);
                            $('#registroRifj').val(json.Items[0].rif_proj);
                            $('#registroTelefonoj').val(json.Items[0].tel_proj);
                            $('#registroEmailj').val(json.Items[0].cor_proj);
                            $('#registroactividad').val(json.Items[0].act_proj);

                            $('#registroDirecionj').val(json.Items[0].dir_proj);
                            $('#registroCelularj').val(json.Items[0].tel_proj);
                            $("#registroCodigoj").val(json.Items[0].cod_prop);
    
                            /*
                            |------------------------------------------------------
                            | DATOS BANCOS NACIONALES
                            |------------------------------------------------------
                            */
                            
                            $("select[name='cboBancoj']").val(json.Items[0].id_bancoj).change();
                            $('#num_cuenj').val(json.Items[0].num_cuenj);
                            $('#pagomovil_cedulaj').val(json.Items[0].pagomovil_cedulaj);
                            $("select[name='cboBancop']").val(json.Items[0].pagomovil_id_bancoj).change();
                            $('#pagomovil_telefonoj').val(json.Items[0].pagomovil_telefonoj);
                            
                            /*
                            |------------------------------------------------------
                            | DATOS BANCOS INTERNACIONALES
                            |------------------------------------------------------
                            */
    
                           
                            $('#ban_extrj').val(json.Items[0].ban_extrj);
                            $('#age_extrj').val(json.Items[0].age_extrj);
                            $('#dc_extrj').val(json.Items[0].dc_extrj);
                            $('#cue_extrj').val(json.Items[0].cue_extrj);
                            $('#iba_extrj').val(json.Items[0].iba_extrj);
                            $('#bic_extrj').val(json.Items[0].bic_extrj);
    
    
                           /*
                            |------------------------------------------------------
                            | DATOS PAYPAL
                            |------------------------------------------------------
                            */
    
                         
                            $('#cor_paypj').val(json.Items[0].cor_paypj);
                            $('#nom_paypj').val(json.Items[0].nom_paypj);
    
                            /*
                            |------------------------------------------------------
                            | DATOS zelle
                            |------------------------------------------------------
                            */
                         
                            $('#tel_zellej').val(json.Items[0].tel_zellej);
                            $('#cor_zellej').val(json.Items[0].cor_zellej);
                            $('#nom_zellej').val(json.Items[0].nom_zellej);
                          
    
    
    
                        }
    
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

/*
   mensajeNatural();
   return;
*/


        /*
        |---------------------------------------------------
        | AQUI VALIDO EL CODIGO DEL PROPIETARIO ANTES
        | DE GUARDAR, POR SI SE HA GENERADO OTRO DOCUMENTO
        |---------------------------------------------------
        */
   
      //  validarCodigoPropietario();

       // syncDelay(5000); //ESTO VA A ESPERAR 5 SEGUNDOS;

        /*-------------------------------------------------*/


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
            let idPropietario = 0;
                console.log("Mensaje del JSON: " + json);

                if(json.error == 0){
                    
                    mensaje(json.mensaje,0);
                    /*
                    if(json.Items.length > 0){

                        //console.log("Datos del Propietario: " + json.Items[0].ID_PROPIETARIO);
                        idPropietario = json.Items[0].ID_PROPIETARIO;

                    }

                    if(idPropietario > 0){
                        mensajeNatural(idPropietario,  $("#registroCodigo").val());
                        limpiarFormulario(1);
                        botones(0);
                        
                    } else {
                        mensaje("Hubo un problema con el codigo de propietario.",1);
                    }
                    */
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
        document.getElementById("registrarpropietario").reset();
    }

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







function generarCodigoPropietario(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');

        codigoPropietario(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });


    });

    $("#registroApellido").on('keyup', function () {

        var prmNombre= $("#registroNombre").val(); 
        var prmApellido=this.value;

        $("#registroCodigo").val('');
        codigoPropietario(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });

    });
   

}


function generarCodigoPropietarioj(){


    $("#registroNombrej").on('keyup', function () {

        var prmNombre= this.value;
      

        $("#registroCodigoj").val('');

        codigoPropietarioj(prmNombre,function(result){
            $("#registroCodigoj").val(result);
        });


    });

   
   

}







function validarCodigoPropietario(){

    var prmNombre= $("#registroNombre").val(); 
    var prmApellido= $("#registroApellido").val();

    $("#registroCodigo").val('');
    codigoPropietario(prmNombre + ' ' + prmApellido,function(result){
        $("#registroCodigo").val(result);
    });

}



function guardarPropietariosjuridico(){

    $("#registrarpropietarioj").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

/*
   mensajeNatural();
   return;
*/


        /*
        |---------------------------------------------------
        | AQUI VALIDO EL CODIGO DEL PROPIETARIO ANTES
        | DE GUARDAR, POR SI SE HA GENERADO OTRO DOCUMENTO
        |---------------------------------------------------
        */
   
      //  validarCodigoPropietario();

       // syncDelay(5000); //ESTO VA A ESPERAR 5 SEGUNDOS;

        /*-------------------------------------------------*/


   if ($("#registroNombrej").val() == "") {
       mensaje("Debe indicar el Nombre o Razón Social del propietario",1);
       return;
   }


    if ($("#registroRifj").val() == "") {
        mensaje("Debe indicar el rif Jurídico del propietario",1);
        return;
        }

    
    if ($("#registroactividad").val() == "") {
        mensaje("Debe indicar la  actividad comercial del propietario ",1);
        return;
        }
    
    if ($("#registroDirecionj").val() == "") {
        mensaje("Debe indicar la  dirección fiscal del propietario ",1);
        return;
        }
    
    if ($("#registroCelularj").val() == "") {
        mensaje("Debe indicar el celular del propietario",1);
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

    if ($("#cboBancoj").val() == "") {
        mensaje("Debe indicar el banco del propietario",1);
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
            url: "app/handler/alquileres/hndregispropietariosj.php",
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
            let idPropietario = 0;
                console.log("Mensaje del JSON: " + json);

                if(json.error == 0){
                    
                    mensaje(json.mensaje,0);
                    /*
                    if(json.Items.length > 0){

                        //console.log("Datos del Propietario: " + json.Items[0].ID_PROPIETARIO);
                        idPropietario = json.Items[0].ID_PROPIETARIO;

                    }

                    if(idPropietario > 0){
                        mensajeNatural(idPropietario,  $("#registroCodigo").val());
                        limpiarFormulario(1);
                        botones(0);
                        
                    } else {
                        mensaje("Hubo un problema con el codigo de propietario.",1);
                    }
                    */

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
        document.getElementById("guardarPropietariosj").reset();
    }

}










$(document).ready(function() {


    inicio();



});