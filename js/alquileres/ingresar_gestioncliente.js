function inicio(){

 
      /*
       |----------------------------------------
       | ASI SE CAPTURAN LOS PARAMETROS
       |---------------------------------------
       */
       $('#id_aviso').val(getParameterByName('idaviso'));
   
      
       let prmCodaviso = getParameterByName('codaviso');
       let idinquilino = getParameterByName('idInqu');
       //let codigoInquilino = getParameterByName('codInqu');
       let tipoInquilino = getParameterByName('tipoInqu');
   

      
       consultarGestionCliente(idinquilino,tipoInquilino);
    
    //let idAviso = getParameterByName('id');
    
    /*--------------------------------------*/    

    codigoAvisoCobro(prmCodaviso);
    guardarRespuestas();

}

function codigoAvisoCobro(prmDato){

    var html = "";

    html='<strong>AVISO DE COBRO : </strong>'  + prmDato +'</span>';

    $("#lblAvisoCobro").html('');
    $("#lblAvisoCobro").html(html);

}




function consultarGestionCliente(idInqu,tipoInqu){
   
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
            formData.append('opcion','GC');
    
            formData.append('idinquilino',idInqu);
            //formData.append('codigoInquilino',codInqu);
            formData.append('tipoInquilino',tipoInqu);
          
            
            /*
            |-----------------------------------------------
            | AQUI SE LLAMA EL AJAX 
            |-----------------------------------------------
            */
            $.ajax({
                url: "app/handler/alquileres/hndregistroavisocobro.php",
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
                            $('#hidinquilino').val(json.Items[0].id_inqu);
                           
                            /*
                            |------------------------------------------------------
                            | DATOS PRINCIPALES
                            |------------------------------------------------------
                            */
                            $('#registroNombre').val(json.Items[0].registroNombre);
                            
  
                            $('#registroCedula').val(json.Items[0].registroCedula);
                            $('#registroRif').val(json.Items[0].registroRif);
                            $('#registroTelefono').val(json.Items[0].registroTeléfono);
                            $('#registroCelular').val(json.Items[0].registroCedula);
                            $('#registroEmail').val(json.Items[0].registroEmail);
 
                            $("#registroCodigo").val(json.Items[0].registroCodigo);
    
    
    
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



    function guardarRespuestas(){

        $("#registrarespuestas").on('submit', function(evt) {
       /*
       |-----------------------------------------------
       | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
       |-----------------------------------------------
       */
       evt.preventDefault();
       /**********************************************/        
    
      
    
       if ($("#registrorespuesta").val() == "") {
           mensaje("Debe indicar la respuesta del cliente",1);
           return;
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
                url: "app/handler/alquileres/hndregistroavisocobro.php",
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





function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("#registrarapoderado").reset();
    }

}









$(document).ready(function() {


    inicio();



});