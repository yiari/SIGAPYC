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
    cargarInmueble(idPropietario,tipoPropietario);
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


function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

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
    
    function cargarInmueble(idPropietario,tipoPropietario){

        /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData();
    
        formData.append('opcion','CB');
        formData.append('id_prop',idPropietario);
        formData.append('tipo_propietario',tipoPropietario);
       
     
     
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistroinmueble.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function () {
                //$("#preview").fadeOut();
                $("#error").fadeOut();
            },
            success: function (data) {
            var json = data;
            var html = "";
    /*
            console.log(json);
            console.log("Este es el Mensaje: " + json.mensaje);
            console.log("Items: " + json.Items.length);
            console.log("Items Resultados: " + json.Items[0].length);
            console.log("Email Resultados: " + json.Items[0][1].email);
    */
                    /*
                    |------------------------------------------------------
                    | AQUI SE CARGA LA INFORMACION EN LA TABLA
                    |------------------------------------------------------
                    */
                    if(json.Items.length > 0){
                        var tr;
                        if(json.Items[0].length > 0){
                                for (var i = 0; i < json.Items[0].length; i++) {
                            
                                // if (isEmpty(json.Items[0][i]) == false) {
                                        tr = $('<tr/>');
    
                                        
                                        let prmFoto = json.Items[0][i].foto;
                                        let prmInquilino = json.Items[0][i].inquilino;
                                       
                                       
                                        var htmlunidades="";
    
                                        console.log(prmFoto);
                                        console.log(prmInquilino);
                                        console.log(htmlunidades);
                                    
                                       
                                        
                                        if(prmFoto == undefined){
                                            tr.append("<td style='text-align:center'>"+ '<img src="./app/iconos/sinfoto01.png" alt="sin foto" style="width:120px;height:120px;"></img>' + "</td>");
                                        } else {
                                            tr.append("<td>" + json.Items[0][i].foto + "</td>");
                                        }
                                        
                                        tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                                        /*tr.append("<td>" + json.Items[0][i].propietario + "</td>");*/
                                        
                                        if(prmInquilino == undefined){
                                            tr.append("<td>SIN INQUILINO</td>");
                                        } else {
                                            tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                                        }
    
                                        tr.append("<td>" + json.Items[0][i].tipo + "</td>"); 
                                 
                                        tr.append("<td>" + statusinmuebles(json.Items[0][i].estatus) + "</td>");
                                        
                                        var html="";
         
                                        html += '</div>'
                                        tr.append("<td>" + html + "</td>");
                                        $('#datosInmuebles').append(tr);
                                    //}
                                }
                        } else {
    
                            var tr;
                            tr = $('<tr/>');
                            tr.append("<td colspan=7 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                            $('#datosInmuebles').append(tr);
    
                           }
    
                        new simpleDatatables.DataTable("#datosInmuebles");
    
                    }
                    /************************************************ */
    
    
            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });
    
    }

$(document).ready(function() {


    inicio();



});