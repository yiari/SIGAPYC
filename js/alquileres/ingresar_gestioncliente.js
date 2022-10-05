function inicio(){

 
      /*
       |----------------------------------------
       | ASI SE CAPTURAN LOS PARAMETROS
       |---------------------------------------
       */
       $('#id_aviso').val(getParameterByName('idaviso'));
       $('#codigo').val(getParameterByName('codaviso'));

       $('#id_inqu').val(getParameterByName('idinqu'));
       $('#inquilino').val(getParameterByName('codinqu'));

       $('#tipo_inqu').val(getParameterByName('tipoinqu'));
       $('#total').val(getParameterByName('monto'));

       $('#id_inmu').val(getParameterByName('idinmu'));
       $('#inmueble').val(getParameterByName('codinmu'));

       $('#id_unid').val(getParameterByName('idunid'));
       $('#unidad').val(getParameterByName('codunid'));

       $('#mes').val(getParameterByName('idmes'));


       //$('#cambio').val(getParameterByName('tasacambio'));

       
   
      
       let prmCodaviso = getParameterByName('codaviso');
       let idinquilino = getParameterByName('idinqu');
       let prmcodigoInquilino = getParameterByName('codinqu');
      
       let tipoInquilino = getParameterByName('tipoinqu');

       let prmmonto = getParameterByName('monto');

       let prmCambio = getParameterByName('tasacambio');
   
      
       jQuery("#recibo").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9'.']/g, ''));
        validarReciboPedido($('#recibo').val(),$('#pedido').val(),$('#monto').val());
       });


       jQuery("#pedido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9'.']/g, ''));
        validarReciboPedido($('#recibo').val(),$('#pedido').val(),$('#monto').val());
       });

      
       cargarBancos('cboBancoN');
       cargarBancos('cboBancop');
       cargarBancos('cboBancoj');
       cargarBancos('cboBancoNP');
    
    //let idAviso = getParameterByName('id');
    
    /*--------------------------------------*/    
    guardarRespuestas();

    guardarAbono();
    guardarReciboPedido();

    codigoAvisoCobro(prmCodaviso);
    consultarGestionCliente(idinquilino,tipoInquilino);

    montoAvisoCobro(prmmonto);
    
    codigoInquilino(prmcodigoInquilino);

    consultaTasaCambio(prmCambio);

    //tasaCambio(prmCambio);


   
   
}

function codigoAvisoCobro(prmDato){

    var html = "";

    html='<strong>AVISO DE COBRO : </strong>'  + prmDato +'</span>';

    $("#lblAvisoCobro").html('');
    $("#lblAvisoCobro").html(html);

}

function tasaCambio(prmDato){

    var html = "";

    html='<strong>PROMEDIO TASA CAMBIO Bs/$ : </strong>'  + prmDato +'</span>';

    $("#lblTasaCambio").html('');
    $("#lblTasaCambio").html(html);
    $("#cambio").val(prmDato);

}

function montoAvisoCobro(prmDato){

    var html = "";

    html='<strong>MONTO : </strong>'  + prmDato +'</span>';

    $("#lblMonto").html('');
    $("#lblMonto").html(html);
    $("#monto").val(prmDato);

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
            //formData.append('registroCodigo',codInqu);
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




    function consultaTasaCambio(prmcambio){
   
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
                formData.append('opcion','TC');
        
                formData.append('cambio',prmcambio);
              
              
                
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
                                $('#hid').val(json.Items[0].id_inqu);
                               
                                /*
                                |------------------------------------------------------
                                | DATOS PRINCIPALES
                                |------------------------------------------------------
                                */

                                var html = '<strong style="font-size:1.3em;">PROMEDIO TASA CAMBIO Bs/$ :&nbsp;' + json.Items[0].cambio + '</strong>';

                                $('#lblTasaCambio').html('');
                                $('#lblTasaCambio').html(html);
                                
                                $('#hidTasa').val(json.Items[0].cambio);
      
        
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
    
    
    function validarReciboPedido(prmrecibo,prmpedido,prmRef){

        console.log("Valor 1: " + prmrecibo);
        console.log("Valor 2: " + prmpedido);

        if(!$.isNumeric(prmrecibo)){
            prmrecibo = 0;
        }

        if(!$.isNumeric(prmpedido)){
            prmpedido = 0;
        }

        var valor1=parseFloat(prmrecibo);
        var valor2=parseFloat(prmpedido);

        //alert ('estuy en validar');
        var suma =  (valor1+valor2).toFixed(2) ;

        console.log("Monto calculado: " + suma);
       
        if (suma != prmRef){
            var html = "";

            html='<strong style="color:red;">la suma del Recibo y el Pedido, debe ser igual al monto facturado.</strong></span>';
        
            $("#errmsg").html('');
            $("#errmsg").html(html);

        } else {

            $("#errmsg").html('');

        }

    }

    function guardarReciboPedido(){

        $("#registrarecibo").on('submit', function(evt) {
       /*
       |-----------------------------------------------
       | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
       |-----------------------------------------------
       */
       evt.preventDefault();
       /**********************************************/        
    
       

       if ($("#recibo").val() == "") {
      
      
                mensaje("Debe indicar el monto del recibo o pedido",1);
                document.fvalida.monto.focus()
                return 0;
       
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
            |---------------------------------------------------------------------------------
            | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO   PARA LOS RECIBI Y PEDIDOS
            |---------------------------------------------------------------------------------
            */
            formData.append('opcion','RP');

            formData.append('id_aviso',$('#id_aviso').val());
            formData.append('id_inmueble',$('#id_inmu').val());
            formData.append('id_unidad',$('#id_unid').val());
            formData.append('id_inquilino',$('#id_inqu').val());
            formData.append('id_usuario',$('#id_usuario').val());
            formData.append('tasa',$('#tasa').val());
            formData.append('mes',$('#mes').val());
            

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