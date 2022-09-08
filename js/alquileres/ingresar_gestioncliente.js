function inicio(){

 
      /*
       |----------------------------------------
       | ASI SE CAPTURAN LOS PARAMETROS
       |---------------------------------------
       */
       $('#id_aviso').val(getParameterByName('idaviso'));
       $('#codinqu').val(getParameterByName('codInqu'));
       $('#mensualidad').val(getParameterByName('monto'));

       $('#id_inqu').val(getParameterByName('idInqu'));

       
   
      
       let prmCodaviso = getParameterByName('codaviso');
       let idinquilino = getParameterByName('idInqu');
       let codigoInquilino = getParameterByName('codInqu');
       let tipoInquilino = getParameterByName('tipoInqu');

       let prmmonto = getParameterByName('monto');
   

      
       cargarBancos('cboBancoN');
       cargarBancos('cboBancop');
       cargarBancos('cboBancoj');
       cargarBancos('cboBancoNP');
    
    //let idAviso = getParameterByName('id');
    
    /*--------------------------------------*/    
    guardarRespuestas();

    guardarAbono();

    codigoAvisoCobro(prmCodaviso);
    consultarGestionCliente(idinquilino,tipoInquilino);
    montoAvisoCobro(prmmonto);
    //codigoInquilino(codigoInquilino);
   
}

function codigoAvisoCobro(prmDato){

    var html = "";

    html='<strong>AVISO DE COBRO : </strong>'  + prmDato +'</span>';

    $("#lblAvisoCobro").html('');
    $("#lblAvisoCobro").html(html);

}

function montoAvisoCobro(prmDato){

    var html = "";

    html='<strong>MONTO : </strong>'  + prmDato +'</span>';

    $("#lblMonto").html('');
    $("#lblMonto").html(html);

}


function codigoInquilino(prmDato){

    var html = "";

    html='<strong>INQUILINO : </strong>'  + prmDato +'</span>';

    $("#lblInquilino").html('');
    $("#lblInquilino").html(html);

}


function checkAgregarTranferencia(){

    if($('input[name="chktranferencia"]').is(':checked'))
    {
        //checked
        $("#cboBancoNP").attr("disabled", false);
        $("#referencia").attr("disabled", false);
        $("#monto").attr("disabled", false);
    }
    else
    {
        //unchecked
        $("#cboBancoNP").attr("disabled", true);
        $("#referencia").attr("disabled", true);
        $("#monto").attr("disabled", true);

    }

}



function checkAgregarPagoMovil(){

    if($('input[name="chkpagomovil"]').is(':checked'))
    {
        //checked
        $("#cboBancoj").attr("disabled", false);
        $("#operacion").attr("disabled", false);
        $("#monto_movil").attr("disabled", false);
    }
    else
    {
        //unchecked
        $("#cboBancoj").attr("disabled", true);
        $("#operacion").attr("disabled", true);
        $("#monto_movil").attr("disabled", true);

    }

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

            formData.append('id_aviso',$('#id_aviso').val());
            formData.append('id_usuario',$('#id_usuario').val());
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




    function guardarAbono(){

        $("#registrarabono").on('submit', function(evt) {
       /*
       |-----------------------------------------------
       | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
       |-----------------------------------------------
       */
       evt.preventDefault();
       /**********************************************/        
    
      
    
       
       if($('input[name="chktranferencia"]').is(':checked'))
       {
           //checked

           if ($("#cboBancoNP").val() == "") {
            mensaje("Debe indicar el banco de donde se realizo la transferencia",1);
            return;
            }
       
           if($("#referencia").val() == "" || $("#referencia").val() == "0" || $("#referencia").val() == 0){
               mensaje("Debe indicar el numero de referencia",1);
               return;
           }

           if($("#monto").val() == "" || $("#monto").val() == "0" || $("#monto").val() == 0){
            mensaje("Debe indicar el monto abonado por el cliente",1);
            return;
        }
 
       
       }


       if($('input[name="chkpagomovil"]').is(':checked'))
       {
           //checked

           if ($("#cboBancoj").val() == "") {
            mensaje("Debe indicar el banco de donde se realizo el pago movil",1);
            return;
            }
       
           if($("#operacion").val() == "" || $("#operacion").val() == "0" || $("#operacion").val() == 0){
               mensaje("Debe indicar el numero de referencia",1);
               return;
           }

           if($("#monto_movil").val() == "" || $("#monmonto_movilto").val() == "0" || $("#monto_movil").val() == 0){
            mensaje("Debe indicar el monto abonado por el cliente",1);
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
            formData.append('opcion','IA');
            formData.append('id_aviso',$('#id_aviso').val());
            formData.append('id_inmueble',$('#id_inmu').val());
            formData.append('id_unidad',$('#id_unid').val());
            formData.append('id_inquilino',$('#id_inqu').val());
            formData.append('id_usuario',$('#id_usuario').val());
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
                        limpiarFormulario(1);
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
        document.getElementById("#registrarabono").reset();
    }

}



function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("#registrarabono").reset();
    }

}



$(document).ready(function() {


    inicio();



});