
function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */

    $('#id_prop').val(getParameterByName('idpro'));
    let idPropietario = getParameterByName('idpro');
    let prmCodPro = getParameterByName('codpro');

    let codigoApoderado = getParameterByName('codapod');
    let idApoderado = getParameterByName('idapod');

    /*--------------------------------------*/  

    codigoPropietario(prmCodPro);
    atrasApoderado(idPropietario,prmCodPro);  


    generarCodigoApoderado();
    cargarEstados();
    //cargarBancos('cboBancoN');
    //cargarBancos('cboBancoNP');
    
   
    guardarApoderado();
    
    
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

    


   
/*
|------------------------------------------------------------------------------------------------
| DESPUES DE CARGAR LAS FUNCIONES Y VALIDACIONES, ENTONCES SOLICITO LOS DATOS DEL PROPIETARIO
|-------------------------------------------------------------------------------------------------
*/

consultarApoderado(idApoderado,codigoApoderado);



}


function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}

function atrasApoderado(prmIdPro, prmCodPro){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/apoderado&idpro=' + prmIdPro  + '&codpro=' + prmCodPro;
    
        $(".codpro").prop("href", html);


    //}

}



function consultarApoderado(id,codigo){

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
        formData.append('opcion','CA');

        formData.append('idApoderado',id);
        formData.append('codigoApoderado',codigo);
       

        //formData.append('tipoPropietario',tipo);
        
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistroapoderados.php",
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
                        $('#hidapoderado').val(json.Items[0].id_apod);
                        $('#hidcuenta_id_nacional').val(json.Items[0].id_banco_nacional);
                        $('#hidcuenta_id_internacional').val(json.Items[0].id_banco_internacional);
                        $('#hidcuenta_id_paypal').val(json.Items[0].id_banco_internacional);
                        $('#hidcuenta_id_zelle').val(json.Items[0].id_banco_internacional);

                        /*
                        |------------------------------------------------------
                        | DATOS PRINCIPALES
                        |------------------------------------------------------
                        */
                        $('#registroNombre').val(json.Items[0].nom_apod);
                        $('#registroApellido').val(json.Items[0].ape_apod);
                        
                        $("select[name='registroNacionalidad']").val(json.Items[0].nac_apod).change();


                        
                        $('#registroCedula').val(json.Items[0].ci_apod);
                        $('#registroRif').val(json.Items[0].rif_apod);
                        $('#registroTelefono').val(json.Items[0].loc_apod);
                        $('#registroCelular').val(json.Items[0].cel_apod);
                        $('#registroEmail').val(json.Items[0].cor_apod);


                        $("select[name='cboEstados']").val(json.Items[0].est_apod).change();
                        setTimeout(function(){ $("select[name='cboMunicipios']").val(json.Items[0].mun_apod).change() }, 2000);
                        setTimeout(function(){ $("select[name='cboParroquia']").val(json.Items[0].par_apod).change() }, 4000);

                        
                        $('#registroDirecionH').val(json.Items[0].dir_apod);
                        $('#registroDirecionO').val(json.Items[0].ofi_apod);


                        $("#registroCodigo").val(json.Items[0].cod_apod);


                        $('#cod_pode').val(json.Items[0].cod_pode);
                        $('#not_pode').val(json.Items[0].not_pode);
                        $('#fec_pode').val(json.Items[0].fec_pode);
                        $('#num_pode').val(json.Items[0].num_pode);
                        $('#tom_pode').val(json.Items[0].tom_pode);
                        $('#fol_pode').val(json.Items[0].fol_pode);

                        /*
                        |------------------------------------------------------
                        | DATOS BANCOS NACIONALES
                        |------------------------------------------------------
                       
                        
                        $("select[name='cboBancoN']").val(json.Items[0].id_banco).change();
                        $('#num_cuen').val(json.Items[0].num_cuen);
                        $('#ced_pmov').val(json.Items[0].pagomovil_cedula);
                        $("select[name='cboBancoNP']").val(json.Items[0].pagomovil_id_banco).change();
                        $('#cel_pmov').val(json.Items[0].pagomovil_telefono); */
                        
                        
                       

		  
                        
                        
                        /*
                        |------------------------------------------------------
                        | DATOS BANCOS INTERNACIONALES
                        |------------------------------------------------------
                       

                       
                        $('#ban_extr').val(json.Items[0].ban_extr);
                        $('#age_extr').val(json.Items[0].age_extr);
                        $('#dc_extr').val(json.Items[0].dc_extr);
                        $('#cue_extr').val(json.Items[0].cue_extr);
                        $('#iba_extr').val(json.Items[0].iba_extr);
                        $('#bic_extr').val(json.Items[0].bic_extr); */


                       /*
                        |------------------------------------------------------
                        | DATOS PAYPAL
                        |------------------------------------------------------
                       

                     
                        $('#cor_payp').val(json.Items[0].cor_payp);
                        $('#nom_payp').val(json.Items[0].nom_payp); */

                        /*
                        |------------------------------------------------------
                        | DATOS zelle
                        |------------------------------------------------------
                       
                     
                        $('#tel_zelle').val(json.Items[0].tel_zelle);
                        $('#cor_zelle').val(json.Items[0].cor_zelle);
                        $('#nom_zelle').val(json.Items[0].nom_zelle); */
                      



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




function guardarApoderado(){

    $("#registrarapoderado").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

  

   if ($("#registroNombre").val() == "") {
       mensaje("Debe indicar el nombre del apoderado",1);
       return;
   }

   if ($("#registroApellido").val() == "") {
       mensaje("Debe indicar el apellido del apoderado",1);
       return;
   }

   if ($("#registroNacionalidad").val() == "") {
    mensaje("Debe indicar la nacionalidad del apoderado",1);
    return;
    }

    if ($("#registroCedula").val() == "") {
        mensaje("Debe indicar la cédula del apoderado",1);
        return;
        }
    
    if ($("#registroTeléfono").val() == "") {
        mensaje("Debe indicar el telefono del apoderado",1);
        return;
        }
    
    if ($("#registroCelular").val() == "") {
        mensaje("Debe indicar el celular del apoderado",1);
        return;
        }

    if ($("#registroRif").val() == "") {
        mensaje("Debe indicar el rif del apoderado",1);
        return;
        }
    
    
    
    if ($("#registroDirecionH").val() == "") {
        mensaje("Debe indicar la dirección de habitación del apoderado ",1);
        return;
        }

    if ($("#registroDirecionO").val() == "") {
        mensaje("Debe indicar la dirección de la oficina del apoderado ",1);
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


    if ($("#cboEstados").val() == "") {
        mensaje("Debe indicar el estado de residencia del apoderado",1);
        return;
        }
    
    if ($("#cboMunicipios").val() == "") {
        mensaje("Debe indicar el Municipio de residencia del apoderado",1);
        return;
        }

    if ($("#cboParroquia").val() == "") {
        mensaje("Debe indicar la parroquia de residencia del apoderado",1);
        return;
        }
    
    /*
    if ($("#cboBancoN").val() == "") {
        mensaje("Debe indicar el banco del apoderado",1);
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
*/


   
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
            url: "app/handler/alquileres/hndregistroapoderados.php",
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
                    //limpiarCampos();
                    limpiarFormulario(1);
                    //botones(0);

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




function generarCodigoApoderado(){


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













$(document).ready(function() {


    inicio();



});