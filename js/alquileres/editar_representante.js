function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */


    let idPropietario = getParameterByName('idpro');
    let prmCodRepr = getParameterByName('codrepre');
    let tipoPropietario = getParameterByName('codtip');
    let idRepresentante = getParameterByName('idrepr');
    let codpropietario = getParameterByName('codpro');

    

    /*--------------------------------------*/    


    generarCodigoRepresentante()
    cargarEstados();
    cargarBancos('cboBancoN');
    cargarBancos('cboBancoNP');
    
    atrasRepresentante(idRepresentante,prmCodRepr,idPropietario,codpropietario);
    guardarRepresentante();
    
    
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
|------------------------------------------------------------------------------------------------
| DESPUES DE CARGAR LAS FUNCIONES Y VALIDACIONES, ENTONCES SOLICITO LOS DATOS DEL PROPIETARIO
|-------------------------------------------------------------------------------------------------
*/

consultarRepresentante(idRepresentante,codigoRepresentante);



}


function atrasRepresentante( prmidRepre, prmCodRpre, prmIdPro,prmcodpropietario){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/representante&idrepr=' + prmidRepre  + '&codrepre=' + prmCodRpre + '&idpro=' + prmIdPro + '&codpro=' + prmcodpropietario;
    
        $(".codpro").prop("href", html);


    //}

}



function consultarRepresentante(id,codigo){

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
        formData.append('opcion','CR');

        formData.append('idRepresentante',id);
        formData.append('codigoRepresentante',codigo);
        //formData.append('tipoPropietario',tipo);
        
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistrorepresentante.php",
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
                        $('#hidrepresentante').val(json.Items[0].id_repr );
                       

                        /*
                        |------------------------------------------------------
                        | DATOS PRINCIPALES
                        |------------------------------------------------------
                        */
                        $('#registroNombre').val(json.Items[0].nom_repr);
                        $('#registroApellido').val(json.Items[0].ape_repr);
                        
                        $("select[name='registroNacionalidad']").val(json.Items[0].nac_repr).change();


                        
                        $('#registroCedula').val(json.Items[0].ci_repr);
                        $('#registroRif').val(json.Items[0].rif_repr );
                        $('#registroTelefono').val(json.Items[0].loc_repr );
                        $('#registroCelular').val(json.Items[0].cel_repr);
                        $('#registroEmail').val(json.Items[0].cor_repr );


                        $("select[name='cboEstados']").val(json.Items[0].est_repr).change();
                        setTimeout(function(){ $("select[name='cboMunicipios']").val(json.Items[0].mun_repr).change() }, 2000);
                        setTimeout(function(){ $("select[name='cboParroquia']").val(json.Items[0].par_repr).change() }, 4000);

                        
                        $('#registroDirecionH').val(json.Items[0].dir_repr);
                        $('#registroDirecionO').val(json.Items[0].ofi_repr);


                        $("#registroCodigo").val(json.Items[0].cod_repr);

                        
                        
                        $('#cod_regi').val(json.Items[0].cod_regi);
                        $('#not_regi').val(json.Items[0].not_regi);
                        $('#fec_regi').val(json.Items[0].fec_regi);
                        $('#num_regi').val(json.Items[0].num_regi);
                        $('#tom_regi').val(json.Items[0].tom_regi);
                        $('#fol_regi').val(json.Items[0].fol_regi);



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




function guardarRepresentante(){

    $("#registrarrepresentante").on('submit', function(evt) {
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
            url: "app/handler/alquileres/hndregistrorepresentante.php",
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
                    limpiarCampos();
                    //limpiarTabla();
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





function generarCodigoRepresentante(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');
        codigoRepresentante(prmNombre + ' ' + prmApellido,function(result){
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
        codigoRepresentante(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });
        /*
        $("#registroCodigo").val(codigoApoderado(prmNombre + ' ' + prmApellido));
        */
    });
   

}


function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("#registrarrepresentante").reset();
    }

}














$(document).ready(function() {


    inicio();



});