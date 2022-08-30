function guardarPropietariosj(){

    $("#registrarpropietarioj").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

/*
   mensajeNatural();
   return;
*/


        /*
        |---------------------------------------------------
        | AQUI VALIDO EL CODIGO DEL PROPIETARIO ANTES
        | DE GUARDAR, POR SI SE HA GENERADO OTRO DOCUMENTO
        |---------------------------------------------------
        */
   
      //  validarCodigoPropietario();

       // syncDelay(5000); //ESTO VA A ESPERAR 5 SEGUNDOS;

        /*-------------------------------------------------*/


   if ($("#registroNombrej").val() == "") {
       mensaje("Debe indicar el Nombre o Razón Social del propietario",1);
       return;
   }


    if ($("#registroRifj").val() == "") {
        mensaje("Debe indicar el rif Jurídico del propietario",1);
        return;
        }

    
    if ($("#registroactividad").val() == "") {
        mensaje("Debe indicar la  actividad comercial del propietario ",1);
        return;
        }
    
    if ($("#registroDirecionj").val() == "") {
        mensaje("Debe indicar la  dirección fiscal del propietario ",1);
        return;
        }
    
    if ($("#registroCelularj").val() == "") {
        mensaje("Debe indicar el celular del propietario",1);
        return;
        }
    
    if ($("#registroEmailj").val() == "") {
        mensaje("Debe indicar una direccion de correo valida",1);
        return;
    } else {
        var respuesta = validateEmail($("#registroEmailj").val());

        if (respuesta == false) {
            mensaje("La direccion de correo es invalida",1);
            return;
        }
    }

    if ($("#cboBancoj").val() == "") {
        mensaje("Debe indicar el banco del propietario",1);
        return;
        }

    if ($("#num_cuenj").val() == "") {
        mensaje("Debe indicar el numero de cuenta del banco",1);
        return;
        } else {

            var numcuentaTMP = $("#num_cuenj").val(); 

            if (numcuentaTMP.length<20){
                mensaje("El Numero de cuenta debe ser de 20 digitos.",1);
                return;

            } else {

                if(validarCuentaBanco('cboBancoj',numcuentaTMP) == false){
                    mensaje("El Numero de cuenta registrado no concuerda con el banco seleccionado.",1);
                    return;
                }

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
        formData.append('opcion','I');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregispropietariosj.php",
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

                        //console.log("Datos del Propietario: " + json.Items[0].ID_PROPIETARIO);
                        idPropietario = json.Items[0].ID_PROPIETARIOJ;

                    }

                    if(idPropietario > 0){
                        //mensajeJuridico(idPropietario,  $("#registroCodigoj").val());
                        limpiarFormulario(1);
                        botones(0);
                        
                    } else {
                        mensaje("Hubo un problema con el codigo de propietario.",1);
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



    });

}


function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("guardarPropietariosj").reset();
    }

}


function generarCodigoPropietarioj(){


    $("#registroNombrej").on('keyup', function () {

        var prmNombre= this.value;
      

        $("#registroCodigoj").val('');

        codigoPropietarioj(prmNombre,function(result){
            $("#registroCodigoj").val(result);
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
