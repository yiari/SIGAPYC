function inicio(){

    /*
       |----------------------------------------
       | ASI SE CAPTURAN LOS PARAMETROS
       |---------------------------------------
       */
  
   
      
      
       let idInquilino = getParameterByName('idinq');
       let codigoInquilino = getParameterByName('codinq');
       let tipoInquilino = getParameterByName('codtip');
    
       
       consultarInquilinobitacora(idInquilino,codigoInquilino,tipoInquilino);
      
       cargarInmuebleinqulino(idInquilino,tipoInquilino);
      


       imprimirDocumento(idInquilino,codigoInquilino,tipoInquilino);

       atrasinquilino(idInquilino,codigoInquilino,tipoInquilino);
      
   }


   function atrasinquilino(idInquilino,codigoInquilino,tipoInquilino){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/inquilinos&idinq=' + idInquilino  + '&codinq=' + codigoInquilino + '&codtip=' + tipoInquilino;
    
        $(".codinqu").prop("href", html);


    //}

}

   
   
   function imprimirDocumento(prmIdInqu, prmCodInqu, prmTipo){
   
       //if (isEmpty(prmDato) == false ){
   
   
           var html = "";
   
           if(prmIdInqu != 0 && prmIdInqu != ""){
               html='app/reportes/repfichainquilino.php?idinq=' + prmIdInqu  + '&codinq=' + prmCodInqu + '&codtip=' + prmTipo;
               $(".codinq").prop("href", html);
           }
   
       //}
   
   }
   
   
   function consultarInquilinobitacora(id,codigo,tipo){

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
            formData.append('opcion','CIB');
    
            formData.append('idinquilino',id);
            formData.append('codigoInquilino',codigo);
            formData.append('tipoInquilino',tipo);
            
            /*
            |-----------------------------------------------
            | AQUI SE LLAMA EL AJAX 
            |-----------------------------------------------
            */
            $.ajax({
                url: "app/handler/alquileres/hndregistroinquilino.php",
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
                let idinquilino = 0;
                    console.log("Mensaje del JSON: " + json);
    
                    if(json.error == 0){
                        
                        //mensaje(json.mensaje,0);
                        if(json.Items.length > 0){
    
    
                            //<input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                            $('#hidinquilino').val(json.Items[0].id_inqu);
                    
                            $("#registroCodigo").val(json.Items[0].codigo);
    
         
                        }
    
                    }else {
    
                        mensaje(json.mensaje,1);
    
                        //$("#mensaje").html(html).fadeIn();
                    }
    
    
    
                },
                error: function (request,error) {
                    //var err = eval("(" + xhr.responseText + ")");
                    //$("#error").html(e).fadeIn();
                    mensaje(error,1);
                    //console.log(error.Message);
                    //alert(" la cague: " + error);
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


 
   
function cargarInmuebleinqulino(idInquilino,tipoInqulino){
   
           /*
           |------------------------------------------------------------------------------------------
           | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO para cargar el contrato del inquilino 
           |------------------------------------------------------------------------------------------
           */
           var formData = new FormData();
       
           formData.append('opcion','CIC');
           formData.append('id_inqu',idInquilino);
           formData.append('tipo_inqu',tipoInqulino);
          
        
        
           /*
           |-----------------------------------------------
           | AQUI SE LLAMA EL AJAX 
           |-----------------------------------------------
           */
           $.ajax({
               url: "app/handler/alquileres/hndregistroinquilino.php",
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
       
                                           
                                          
                                           let prmInquilino = json.Items[0][i].inquilino;
                                           let prmunidad = json.Items[0][i].unidad;
                                          
                                          
                                           var htmlunidades="";
       
                                         
                                           console.log(prmInquilino);
                                           console.log(htmlunidades);
                                       
                                          
                                           
                                           tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                                           tr.append("<td>" + json.Items[0][i].inmuebles + "</td>");

                                           if(prmunidad == null){
                                            tr.append("<td>SIN UNIDAD</td>");
                                            } else {
                                                tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                                            }
    
                                           
                                           tr.append("<td>" + json.Items[0][i].propietario  + "</td>");
                                           
                                         
   
                                           tr.append("<td style='text-align:rigth'>" + json.Items[0][i].canon + "</td>");
                                          
                                           tr.append("<td>" + fecha(json.Items[0][i].desde,'YYYYMMDD','DD/MM/YYYY') + "</td>"); 
                                           tr.append("<td>" + fecha(json.Items[0][i].hasta,'YYYYMMDD','DD/MM/YYYY') + "</td>"); 
                                         
                                         
                                           var html="";
            
                                           html += '</div>'
                                           
                                           $('#datosContratoinquilino').append(tr);
                                       //}
                                   }
                           } else {
       
                               var tr;
                               tr = $('<tr/>');
                               tr.append("<td colspan=7 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                               $('#datosContratoinquilino').append(tr);
       
                              }
       
                           

                            /*
                            ***********************
                            ASI ERA ORIGINALMENTE
                            ************************
                            new simpleDatatables.DataTable("#datosContratoinquilino");
                            */

                            $('#datosContratoinquilino').DataTable(
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
   
   $(document).ready(function() {
   
   
       inicio();
   
   
   
   });