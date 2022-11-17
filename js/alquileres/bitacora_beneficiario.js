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
       
       cargarInmuebleBeneficiario(idBeneficiario,tipoBeneficiario);
       
       UnidadBeneficiario(idBeneficiario,tipoBeneficiario);

      

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
    
       
    

       function cargarInmuebleBeneficiario(idBeneficiario,tipoBeneficiario){
   
        /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData();
    
        formData.append('opcion','CIB');
        formData.append('id_beneficiario',idBeneficiario);
        formData.append('tipo_beneficiario',tipoBeneficiario);
       
     
     
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
                                        let prmFotoUnidad = json.Items[0][i].fotounidad;
                                        let prmUnidad = json.Items[0][i].unidad;
                                       
                                       
                                        var htmlunidades="";
    
                                        console.log(prmFoto);
                                        console.log(prmFotoUnidad);
                                        console.log(prmUnidad);
                                        console.log(htmlunidades);
                                    
                                       
                                        
                                         if(prmFoto == undefined){
                                             tr.append("<td style='text-align:center'>"+ '<img src="./app/iconos/sinfoto01.png" alt="sin foto" style="width:120px;height:120px;"></img>' + "</td>");
                                         } else {
                                             tr.append('<td style="text-align:center"><img src= "'+  json.Items[0][i].foto + '" style="width:120px;height:120px;"></img></td>');
                                         }
                                         
                                        tr.append("<td>" + json.Items[0][i].inmueble + "</td>");

                                        tr.append("<td>" + json.Items[0][i].tipo_inmueble + "</td>"); 

                                        if(prmFotoUnidad == undefined){
                                            tr.append("<td style='text-align:center'>"+ '<img src="./app/iconos/sinfoto01.png" alt="sin foto" style="width:120px;height:120px;"></img>' + "</td>");
                                        } else {
                                            tr.append('<td style="text-align:center"><img src= "'+  json.Items[0][i].fotounidad + '" style="width:120px;height:120px;"></img></td>');
                                        }

                                        
                                        if(prmUnidad == undefined){
                                            tr.append("<td>SIN UNIDAD</td>");
                                        } else {
                                            tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                                        }
    
                                        tr.append("<td>" + json.Items[0][i].tipo_unidad + "</td>"); 

                                        tr.append("<td style='text-align:rigth'>" + json.Items[0][i].porcentaje + '%' +"</td>"); 
                                 
                                     
                                        
                                        var html="";
         
                                        html += '</div>'
                                        
                                        $('#inmuebleBeneficiario').append(tr);
                                    //}
                                }
                        } else {
    
                            var tr;
                            tr = $('<tr/>');
                            tr.append("<td colspan=7 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                            $('#inmuebleBeneficiario').append(tr);
    
                           }
    
                        

                        /*
                         ***********************
                         ASI ERA ORIGINALMENTE
                         ************************
                         new simpleDatatables.DataTable("#datosUniades");
                         */

                         $('#inmuebleBeneficiario').DataTable(
                             {
                                 language: {
                                     url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                                 }
                                 
                             }
                         );
    
                    }
                    /************************************************ */
    
    
            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });
    
    }




    function UnidadBeneficiario(idBeneficiario,tipoBeneficiario){
   
        /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData();
    
        formData.append('opcion','CUB');
        formData.append('id_beneficiario',idBeneficiario);
        formData.append('tipo_beneficiario',tipoBeneficiario);
       
     
     
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
    
                                        
                                      
                                        let prmFotoUnidad = json.Items[0][i].fotounidad;
                                        let prmUnidad = json.Items[0][i].unidad;
                                       
                                       
                                        var htmlunidades="";
    
                                       
                                        console.log(prmFotoUnidad);
                                        console.log(prmUnidad);
                                        console.log(htmlunidades);
                                    
                                       
                                        
                                         

                                        if(prmFotoUnidad == undefined){
                                            tr.append("<td style='text-align:center'>"+ '<img src="./app/iconos/sinfoto01.png" alt="sin foto" style="width:120px;height:120px;"></img>' + "</td>");
                                        } else {
                                            tr.append('<td style="text-align:center"><img src= "'+  json.Items[0][i].fotounidad + '" style="width:120px;height:120px;"></img></td>');
                                        }

                                        
                                        if(prmUnidad == undefined){
                                            tr.append("<td>SIN UNIDAD</td>");
                                        } else {
                                            tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                                        }
    
                                        tr.append("<td>" + json.Items[0][i].tipo_unidad + "</td>"); 

                                        tr.append("<td style='text-align:rigth'>" + json.Items[0][i].porcentaje + '%' +"</td>"); 
                                 
                                     
                                        
                                        var html="";
         
                                        html += '</div>'
                                        
                                        $('#unidadBene').append(tr);
                                    //}
                                }
                        } else {
    
                            var tr;
                            tr = $('<tr/>');
                            tr.append("<td colspan=7 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                            $('#unidadBene').append(tr);
    
                           }
    
                        

                        /*
                         ***********************
                         ASI ERA ORIGINALMENTE
                         ************************
                         new simpleDatatables.DataTable("#datosUniades");
                         */

                         $('#unidadBene').DataTable(
                             {
                                 language: {
                                     url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                                 }
                                 
                             }
                         );
    
                    }
                    /************************************************ */
    
    
            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });
    
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

   
   $(document).ready(function() {
   
   
       inicio();
   
   
   
   });