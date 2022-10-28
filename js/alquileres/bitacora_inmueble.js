function inicio(){

    /*
       |----------------------------------------
       | ASI SE CAPTURAN LOS PARAMETROS
       |---------------------------------------
       */
  
       let idinmueble  = getParameterByName('idinmu');
       let codigoInmueble = getParameterByName('codinmu');
      

       consultarBitacoraInmueble(idinmueble,codigoInmueble);
       imprimirDocumento(idinmueble, codigoInmueble);
      
  
   }


   function imprimirDocumento(prmIdinmu, prmCodinmu){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        if(prmIdinmu != 0 && prmIdinmu != ""){
            html='app/reportes/repfichainmueble.php?idinmu=' + prmIdinmu  + '&codinmu=' + prmCodinmu ;
            $(".codinmu").prop("href", html);
        }

    //}

}
   

   
   
   
   
   function consultarBitacoraInmueble(id,codigo,tipo){

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
            formData.append('opcion','BIN');
    
            formData.append('idinmueble',id);
            formData.append('codigoInmueble',codigo);
            //formData.append('tipoInquilino',tipo);
            
            /*
            |-----------------------------------------------
            | AQUI SE LLAMA EL AJAX 
            |-----------------------------------------------
            */
            $.ajax({
                url: "app/handler/alquileres/hndregistroinmueble.php",
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
                            $('#hidinmuebles').val(json.Items[0].id_inmu);
                    
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


 
   

   
   $(document).ready(function() {
   
   
       inicio();
   
   
   
   });