function inicio(){

 /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    cargarBancos('cboBancoN');
    cargarBancos('cboBancoNP');
    cargarBancos('cboBancoj');
    cargarBancos('cboBancop');

    let idPropietario = getParameterByName('idpro');
    let codigoPropietario = getParameterByName('codpro');
    let tipoPropietario = getParameterByName('codtip');

    consultarPropietario(idPropietario,codigoPropietario,tipoPropietario);
    imprimirDocumento(idPropietario, codigoPropietario, tipoPropietario);

}


function imprimirDocumento(prmIdPro, prmCodPro, prmTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        if(prmIdPro != 0 && prmIdPro != ""){
            html='app/reportes/repfichapropietario.php?idpro=' + prmIdPro  + '&codpro=' + prmCodPro + '&codtip=' + prmTipo;
            $(".codpro").prop("href", html);
        }

    //}

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
    


$(document).ready(function() {


    inicio();



});