
function guardarBeneficiarioJ(){

    $("#registrarbeneficiarioj").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        


   //mensajeNatural();
   //return;


   if ($("#registroNombrej").val() == "") {
       mensaje("Debe indicar el nombre del beneficiario juridico",1);
       return;
   }


    if ($("#registroRifj").val() == "") {
        mensaje("Debe indicar el rif del beneficiario",1);
        return;
        }
    
   
    if ($("#registroDirecionHj").val() == "") {
        mensaje("Debe indicar la dirección de habitación del beneficiario ",1);
        return;
        }

    if ($("#registroActividad").val() == "") {
        mensaje("Debe indicar la dirección de la oficina del beneficiario ",1);
        return;
        }



        if ($("#cboBancoPJ").val() == "") {
        mensaje("Debe indicar el banco del beneficiario",1);
        return;
        }

        if ($("#num_cuenJ").val() == "") {
            mensaje("Debe indicar el numero de cuenta del banco",1);
            return;
            } else {

                var numcuentaTMP = $("#num_cuenJ").val(); 

                if (numcuentaTMP.length<20){
                    mensaje("El Numero de cuenta debe ser de 20 digitos.",1);
                    return;

                } else {

                    if(validarCuentaBanco('cboBancoNP',numcuentaTMP) == false){
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
            url: "app/handler/alquileres/hndregistrobeneficiariosj.php",
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
                    limpiarFormulario(1);
                    //limpiarTabla();
                    botones(0);

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
        document.getElementById("registrarbeneficiario").reset();
    }

}


function generarCodigoBeneficiarioj(){


    $("#registroNombrej").on('keyup', function () {

        var prmNombre= this.value;
       

        $("#registroCodigoj").val('');

        codigoBeneficiarioj(prmNombre,function(result){
            $("#registroCodigoj").val(result);
        });


    });

   

}
