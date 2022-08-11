function inicio(){


     /*
    |--------------------------------------------------
    | TODOS LOS CAMPOS DE TEXTO ESCRIBEN EN MAYUSCULA
    |--------------------------------------------------
    */
    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    /*------------------------------------------------*/

    
    cargarEstados();
    cargartipo_inmueble();
    cargarBancos('cboBancoNP');
    guardarunidades();
    generarCodigoUnidad();
    
   
    
    }
    
    
    
    
    function  guardarunidades(){
    
        $("#registrounidades").on('submit', function(evt) {
       /*
       |-----------------------------------------------
       | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
       |-----------------------------------------------
       */
       evt.preventDefault();
       /**********************************************/        
    
     
       if ($("#cboinmueble").val() == "") {
        mensaje("Debe indicar el tipo de inmueble",1);
        return;
    }
    
    if ($("#registroletra").val() == "") {
        mensaje("Debe indicar la letra o número de la unidad",1);
        return;
    }
    
    
    
     if ($("#registrNombre").val() == "") {
         mensaje("Debe indicar el nombre del unidad",1);
         return;
         }
    
    if ($("#registroUso").val() == "") {
    mensaje("Debe indicar el uso del unidad",1);
    return;
    }
    
    if ($("#registroAntiguedad").val() == "") {
            mensaje("Debe indicar la  antiguedad del unidad",1);
            return;
            }
     
     
    if ($("#cboEstados").val() == "") {
        mensaje("Debe indicar el estado de residencia del unidad",1);
        return;
        }
    
    if ($("#cboMunicipios").val() == "") {
        mensaje("Debe indicar el Municipio de residencia del unidad",1);
        return;
        }
    
    if ($("#cboParroquia").val() == "") {
        mensaje("Debe indicar la parroquia de residencia del unidad",1);
        return;
        }
     
     if ($("#registroDirecionH").val() == "") {
         mensaje("Debe indicar la dirección de habitación del unidad ",1);
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
           url: "app/handler/alquileres/hndregistrounidades.php",
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
    
               console.log("Mensaje del JSON: " + json.mensaje);
    
               if(json.error == 0){
                   
                   mensaje(json.mensaje,0);
    
                   //$("#mensaje").html(html).fadeIn();
                   limpiarFormulario(1);
                   //limpiarTabla();
                   //botones(0);
                   cargarInmueble();
    
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



    function generarCodigoUnidad(){

    

        $('#cboinmueble').change(function() {
    
            var  prmTipoInmueble = $('#cboinmueble').find('option:selected').attr('data-tipoinmueble');
            var  prmLetraInmueble = $("#registroletra").val();
            var  prmNombreInmueble = $("#registrNombre").val();
            //var prmTipo=$(this).attr('data-tipoinmueble');;
    
            $("#registroCodigo").val('');
    
            codigoUnidad(prmTipoInmueble,prmLetraInmueble,prmNombreInmueble,function(result){
                $("#registroCodigo").val(result);
            });
    
    
        });
    
    
        $("#registroletra").on('keyup', function () {
    
            var  prmTipoInmueble = $('#cboinmueble').find('option:selected').attr('data-tipoinmueble');
            var  prmLetraInmueble = $("#registroletra").val();
            var  prmNombreInmueble = $("#registrNombre").val();
    
            $("#registroCodigo").val('');
    
            codigoUnidad(prmTipoInmueble,prmLetraInmueble,prmNombreInmueble,function(result){
                $("#registroCodigo").val(result);
            });
    
        });
    
        $("#registrNombre").on('keyup', function () {
    
            var  prmTipoInmueble = $('#cboinmueble').find('option:selected').attr('data-tipoinmueble');
            var  prmLetraInmueble = $("#registroletra").val();
            var  prmNombreInmueble = $("#registrNombre").val();
    
            $("#registroCodigo").val('');
    
            codigoUnidad(prmTipoInmueble,prmLetraInmueble,prmNombreInmueble,function(result){
                $("#registroCodigo").val(result);
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
            document.getElementById("registrounidades").reset();
        }
    
    }
    
    
    
    

    
    $(document).ready(function() {
    
    
    inicio();
    
    
    
    });