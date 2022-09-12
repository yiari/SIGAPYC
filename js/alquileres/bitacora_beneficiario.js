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
      
       let idBeneficiario = getParameterByName('idbene');
       let codigoBeneficiario = getParameterByName('codbene');
       let tipoBeneficiario = getParameterByName('codtip');
    
       
       consultarBeneficiario(idBeneficiario,codigoBeneficiario,tipoBeneficiario);

       cargarInmueble(idPropietario,tipoPropietario);
       cargarInmuebleConUnidad(idPropietario,tipoPropietario);

       imprimirDocumento(idBeneficiario, codigoBeneficiario, tipoBeneficiario);
      
   }
   
   
   function imprimirDocumento(prmIdBene, prmCodBne, prmTipo){
   
       //if (isEmpty(prmDato) == false ){
   
   
           var html = "";
   
           if(prmIdBene != 0 && prmIdBene != ""){
               html='app/reportes/repfichabeneficiario.php?idbene=' + prmIdBene  + '&codbene=' + prmCodBne + '&codtip=' + prmTipo;
               $(".codbene").prop("href", html);
           }
   
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
    
       
       function cargarInmueble(idPropietario,tipoPropietario){
   
           /*
           |-----------------------------------------------------
           | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
           |-----------------------------------------------------
           */
           var formData = new FormData();
       
           formData.append('opcion','CIS');
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
   
                                           tr.append("<td style='text-align:rigth'>" + json.Items[0][i].canon + "</td>"); 
                                    
                                           tr.append("<td>" + statusinmuebles(json.Items[0][i].estatus) + "</td>");
                                           
                                           var html="";
            
                                           html += '</div>'
                                           
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
   
   
   
   
   
       function cargarInmuebleConUnidad(idPropietario,tipoPropietario){
   
           /*
           |-----------------------------------------------------
           | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
           |-----------------------------------------------------
           */
           var formData = new FormData();
       
           formData.append('opcion','CIC');
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
                                           tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                                           tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                                           /*tr.append("<td>" + json.Items[0][i].propietario + "</td>");*/
                                           
                                           if(prmInquilino == undefined){
                                               tr.append("<td>SIN INQUILINO</td>");
                                           } else {
                                               tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                                           }
       
                                           tr.append("<td>" + json.Items[0][i].tipo + "</td>"); 
   
                                           tr.append("<td style='text-align:rigth'>" + json.Items[0][i].canon + "</td>"); 
                                    
                                           tr.append("<td>" + statusinmuebles(json.Items[0][i].estatus) + "</td>");
                                           
                                           var html="";
            
                                           html += '</div>'
                                           
                                           $('#datosUniades').append(tr);
                                       //}
                                   }
                           } else {
       
                               var tr;
                               tr = $('<tr/>');
                               tr.append("<td colspan=7 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                               $('#datosUniades').append(tr);
       
                              }
       
                           new simpleDatatables.DataTable("#datosUniades");
       
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