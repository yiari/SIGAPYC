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
       let prmCodPro = getParameterByName('codpro');
       let tipoPropietario = getParameterByName('codtip');
      
       let idBeneficiario = getParameterByName('idbene');
       let codigoBeneficiario = getParameterByName('codbene');
       let tipoBeneficiario = getParameterByName('codtipbene');
    
       
       consultarBeneficiariobitacora(idBeneficiario,codigoBeneficiario,tipoBeneficiario);

       cargarInmueble(idPropietario,tipoPropietario);
       cargarInmuebleConUnidad(idPropietario,tipoPropietario);

       imprimirDocumento(idBeneficiario, codigoBeneficiario, tipoBeneficiario);

       atrasbeneficiario(idPropietario,prmCodPro,tipoPropietario);
      
   }


   function atrasbeneficiario(idPropietario,prmCodPro,tipoPropietario){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/beneficiarios&idpro=' + idPropietario  + '&codpro=' + prmCodPro + '&codtip=' + tipoPropietario;
    
        $(".codpro").prop("href", html);


    //}

}

   
   
   function imprimirDocumento(prmIdBene, prmCodBne, prmTipo){
   
       //if (isEmpty(prmDato) == false ){
   
   
           var html = "";
   
           if(prmIdBene != 0 && prmIdBene != ""){
               html='app/reportes/repfichabeneficiario.php?idbene=' + prmIdBene  + '&codbene=' + prmCodBne + '&codtipbene=' + prmTipo;
               $(".codbene").prop("href", html);
           }
   
       //}
   
   }
   
   
   function consultarBeneficiariobitacora(id,codigo,tipo){

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
            formData.append('opcion','CBB');
    
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
                let idbeneficiario = 0;
                    console.log("Mensaje del JSON: " + json);
    
                    if(json.error == 0){
                        
                        //mensaje(json.mensaje,0);
                        if(json.Items.length > 0){
    
    
                            //<input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                            $('#hidbeneficiario').val(json.Items[0].id_bene);
                    
                            $("#registroCodigo").val(json.Items[0].codigo);
    
                           

    
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