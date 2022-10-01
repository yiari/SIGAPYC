function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    $('#id_propietarioj').val(getParameterByName('idpro'));
    $('#tipo_propietarioj').val(getParameterByName('codtip'));
    $('#id').val(getParameterByName('idbene'));

    
    let idPropietario = getParameterByName('idpro');
    let prmCodPro = getParameterByName('codpro');
    let prmTipo = getParameterByName('codtip');


    let idBeneficiario = getParameterByName('idbene');
    let codigoBeneficiario = getParameterByName('codbene');
    let tipoBeneficiario = getParameterByName('codtipbene');
    
    

    if(tipoBeneficiario == 1){
        $("#nav-juridica_bene-tab").hide();
        $("#nav-juridica_bene").hide();
        $("#nav-bene_natural").addClass('show').addClass('active');

    } else if (tipoBeneficiario == 2) { 
        $("#nav-bene_natural-tab").hide(); 
        $("#nav-bene_natural").hide();
        $("#nav-juridica_bene").addClass('show').addClass('active');
    }

    //codigoPropietario(prmCodPro);
    //atrasbeneficiario(idPropietario,prmCodPro,prmTipo);

    /*--------------------------------------*/    
    //codigoPropietario(prmCodPro);
   // atrasBeneficiario(idPropietario,prmCodPro);  

    generarCodigoBeneficiario()
    cargarEstados();
    cargarBancos('cboBancoN');
    cargarBancos('cboBancoNP');
    
    atrasbeneficiario(idBeneficiario,codigoBeneficiario,prmTipo,idPropietario,prmCodPro);
   
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

    jQuery("#num_cuen").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#ced_pmov").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#cel_pmov").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

   
    generarCodigoBeneficiarioj();
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
| DESPUES DE CARGAR LAS FUNCIONES Y VALIDACIONES, ENTONCES SOLICITO LOS DATOS DEL BENEFICIARIO
|-------------------------------------------------------------------------------------------------
*/

if(tipoBeneficiario == 1){

    consultarBeneficiario(idBeneficiario,codigoBeneficiario,tipoBeneficiario);

} else if (tipoBeneficiario == 2) { 
    consultarBeneficiarioJuridico(idBeneficiario,codigoBeneficiario,tipoBeneficiario);
}

    guardarBeneficiarioJ();

}





function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}

function atrasbeneficiario(prmIdPro,prmCodPro,prmTipo,idBeneficiario,){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/beneficiarios&idpro=' + prmIdPro  + '&codpro=' + prmCodPro + '&codtip=' + prmTipo + '&idbene=' + idBeneficiario ;
    
        $(".codpro").prop("href", html);


    //}

}



function consultarBeneficiario(id,codigo,tipo){

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
        formData.append('opcion','CB');

        formData.append('idbeneficiario',id);
        formData.append('codigoBeneficiario',codigo);
        formData.append('tipoBeneficiario',tipo);
        
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
            let idPropietario = 0;
                console.log("Mensaje del JSON: " + json);

                if(json.error == 0){
                    
                    //mensaje(json.mensaje,0);
                    if(json.Items.length > 0){


                        //<input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                        $('#hidbeneficiario').val(json.Items[0].id_bene);
                        $('#hidcuenta_id_nacional').val(json.Items[0].id_banco_nacional);
                        $('#hidcuenta_id_internacional').val(json.Items[0].id_banco_internacional);
                        $('#hidcuenta_id_paypal').val(json.Items[0].id_banco_internacional);
                        $('#hidcuenta_id_zelle').val(json.Items[0].id_banco_internacional);

                       
                        /*
                        |------------------------------------------------------
                        | DATOS PRINCIPALES
                        |------------------------------------------------------
                        */
                        $('#registroNombre').val(json.Items[0].nom_bene);
                        $('#registroApellido').val(json.Items[0].ape_bene);
                        
                        $("select[name='registroNacionalidad']").val(json.Items[0].nac_bene).change();


                        
                        $('#registroCedula').val(json.Items[0].ci_bene);
                        $('#registrorif').val(json.Items[0].rif_bene);
                        $('#registroTelefono').val(json.Items[0].loc_bene);
                        $('#registroCelular').val(json.Items[0].cel_bene);
                        $('#registroEmail').val(json.Items[0].cor_bene);


                        $("select[name='cboEstados']").val(json.Items[0].est_bene).change();
                        setTimeout(function(){ $("select[name='cboMunicipios']").val(json.Items[0].mun_bene).change() }, 2000);
                        setTimeout(function(){ $("select[name='cboParroquia']").val(json.Items[0].par_bene).change() }, 4000);

                        
                        $('#registroDirecionH').val(json.Items[0].dir_bene);
                        $('#registroDirecionO').val(json.Items[0].ofi_bene);


                        $("#registroCodigo").val(json.Items[0].cod_bene);

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






function consultarBeneficiarioJuridico(id,codigo,tipo){

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
            formData.append('opcion','CB');
    
            formData.append('idbeneficiario',id);
            formData.append('codigoBeneficiario',codigo);
            formData.append('tipoBeneficiario',tipo);
            
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
                let idPropietario = 0;
                    console.log("Mensaje del JSON: " + json);
    
                    if(json.error == 0){
                        
                        //mensaje(json.mensaje,0);
                        if(json.Items.length > 0){
    
    
                            //<input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                            $('#hidbeneficiarioj').val(json.Items[0].id);
                            $('#hidcuenta_id_nacionalj').val(json.Items[0].id_banco_nacionalj);
                            $('#hidcuenta_id_internacionalj').val(json.Items[0].id_banco_internacionalj);
                            $('#hidcuenta_id_paypalj').val(json.Items[0].id_banco_internacionalj);
                            $('#hidcuenta_id_zellej').val(json.Items[0].id_banco_internacionalj);
    
                           
                            /*
                            |------------------------------------------------------
                            | DATOS PRINCIPALES
                            |------------------------------------------------------
                            */
                            $('#registroNombrej').val(json.Items[0].nom_benej);
                            $('#registroRifj').val(json.Items[0].rif_benej);
                            $('#registroEmailj').val(json.Items[0].cor_benej);
                            $('#registroActividad').val(json.Items[0].act_benej);
    
    
                            $('#registroDirecionj').val(json.Items[0].dir_benej);
                            $('#registroCelularj').val(json.Items[0].cel_benej);
                            $("#registroCodigoj").val(json.Items[0].cod_bene);
    
  
                            /*
                            |------------------------------------------------------
                            | DATOS BANCOS NACIONALES
                            |------------------------------------------------------
                            */
                            
                            $("select[name='cboBancoj']").val(json.Items[0].id_bancoj).change();
                            $('#num_cuenj').val(json.Items[0].num_cuenj);
                            $('#ced_pmovj').val(json.Items[0].pagomovil_cedulaj);
                            $("select[name='cboBancop']").val(json.Items[0].pagomovil_id_bancoj).change();
                            $('#cel_pmovj').val(json.Items[0].pagomovil_telefonoj);
                            
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
    
    if ($("#registroDirecionH").val() == "") {
        mensaje("Debe indicar la dirección de habitación del beneficiario ",1);
        return;
        }

    if ($("#registroDirecionO").val() == "") {
        mensaje("Debe indicar la dirección de la oficina del beneficiario ",1);
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
    
    
    if ($("#cboBancoN").val() == "") {
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
                    
                    mensaje(json.mensaje,0);

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











function generarCodigoBeneficiario(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');
        codigoApoderado(prmNombre + ' ' + prmApellido,function(result){
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
        codigoApoderado(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });
        /*
        $("#registroCodigo").val(codigoApoderado(prmNombre + ' ' + prmApellido));
        */
    });
   

}



function generarCodigoBeneficiarioj(){


    $("#registroNombrej").on('keyup', function () {

        var prmNombre= this.value;
       

        $("#registroCodigoj").val('');

        codigoBeneficiarioj(prmNombre,function(result){
            $("#registroCodigoj").val(result);
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
                    
                    mensaje(json.mensaje,0);

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




$(document).ready(function() {


    inicio();



});