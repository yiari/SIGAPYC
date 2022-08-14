function inicio(){

    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    $('#id_inqu').val(getParameterByName('idinq'));
    $('#id_inquj').val(getParameterByName('idinq'));
    $('#tipo_inquilino').val(getParameterByName('codtip'));
    $('#tipo_inquilinoj').val(getParameterByName('codtip'));

    let idInquilino = getParameterByName('idinq');
    let prmCodInq = getParameterByName('codinq');
    /*--------------------------------------*/    

    codigoInquilino(prmCodInq);
    atrasPagador(idInquilino,prmCodInq);
   
    generarCodigoPagador();
    cargarEstados();
    guardarPagador();

    /*
    |--------------------------------------------------
    | TODOS LOS CAMPOS DE TEXTO ESCRIBEN EN MAYUSCULA
    |--------------------------------------------------
    */
    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    /*------------------------------------------------*/

    jQuery("#registroNombre").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroApellido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });


    jQuery("#registroCedula").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroTelefono").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroCelular").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });


    /*
    |-------------------------
    | ESTO ES LO JURIDICO
    |------------------------------
    */

    guardarPagadorJuridico();
    generarCodigoPagadorJ();

}


function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}


function codigoInquilino(prmDato){

    var html = "";

    html='<strong>INQUILINO : </strong>'  + prmDato +'</span>';

    $("#lblinquilino").html('');
    $("#lblinquilino").html(html);

}

function atrasPagador(idInquilino, prmCodInq){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/pagador&idinq=' + idInquilino  + '&codinq=' + prmCodInq;
    
        $(".idinq").prop("href", html);


    //}

}




function guardarPagador(){

    $("#registrarpagador").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

  

   if ($("#registroNombre").val() == "") {
       mensaje("Debe indicar el nombre del pagador",1);
       return;
   }

   if ($("#registroApellido").val() == "") {
       mensaje("Debe indicar el apellido del pagador",1);
       return;
   }

   if ($("#registroNacionalidad").val() == "") {
    mensaje("Debe indicar la nacionalidad del pagador",1);
    return;
    }

    if ($("#registroCedula").val() == "") {
        mensaje("Debe indicar la cédula del pagador",1);
        return;
        }
    
    if ($("#registroTeléfono").val() == "") {
        mensaje("Debe indicar el telefono del pagador",1);
        return;
        }
    
    if ($("#registroCelular").val() == "") {
        mensaje("Debe indicar el celular del pagador",1);
        return;
        }

    if ($("#registroRif").val() == "") {
        mensaje("Debe indicar el rif del pagador",1);
        return;
        }
    
    if ($("#cboEstados").val() == "") {
            mensaje("Debe colocar el campo el estado ",1);
            return;
            }

    if ($("#cboMunicipios").val() == "") {
        mensaje("Debe colocar el campo el municipio ",1);
        return;
        }

    if ($("#cboParroquia").val() == "") {
        mensaje("Debe colocar el campo el parroqui ",1);
        return;
        }
    
    if ($("#registroDirecionH").val() == "") {
        mensaje("Debe indicar la dirección de habitación del pagador ",1);
        return;
        }

    if ($("#registroDirecionO").val() == "") {
        mensaje("Debe indicar la dirección de la oficina del pagador ",1);
        return;
        }
    

    if ($("#registroEmail").val() == "") {
        mensaje("Debe indicar una direccion de correo valida",1);
        return;
    } else {
        var respuesta = validateEmail($("#registroEmail").val());

        if (respuesta == false) {
            mensaje("La direccion de correo es invalida",1);
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
        formData.append('opcion','I');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistropagador.php",
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


function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("registrarpagador").reset();
    }

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




function generarCodigoPagador(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');

        codigoPagador(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });


    });

    $("#registroApellido").on('keyup', function () {

        var prmNombre= $("#registroNombre").val(); 
        var prmApellido=this.value;

        $("#registroCodigo").val('');
        codigoPagador(prmNombre + ' ' + prmApellido,function(result){
            $("#registroCodigo").val(result);
        });

    });
   

}




function editarPagador(){

    $(".edit").click(function() {

    

        var prmid_paga = $(this).data('field-id_paga');
        var prmcod_paga = $(this).data('field-cod_paga');
        var prmnom_paga = $(this).data('field-nom_paga');
        var prmape_paga = $(this).data('field-ape_pag');
        var prmnac_paga = $(this).data('field-nac_paga');
        var prmci_paga  = $(this).data('field-ci_paga');
        var prmrif_paga = $(this).data('field-rif_paga');
        var prmloc_paga = $(this).data('field-loc_paga');
        var prmcel_paga = $(this).data('field-cel_paga');
        var prmcor_paga = $(this).data('field-cor_paga');
        var prmest_paga = $(this).data('field-est_paga');
        var prmmun_paga = $(this).data('field-mun_paga');
        var prmpar_paga = $(this).data('field-par_paga');
        var prmdir_paga = $(this).data('field-dir_paga');
        var prmofi_paga = $(this).data('field-ofi_paga');
       

        
        $("#hidapoderado").val(prmid_paga);
        $("#registroCodigo").val(prmcod_paga);
        $("#registroNombre").val(prmnom_paga);
        $("#registroApellido").val(prmape_paga);
        $("#registroNacionalidad").val( prmnac_paga);
        $("#registroCedula").val(prmci_paga);
        $("#registroRif").val(prmrif_paga);
        $("#registroTelefono").val(prmloc_paga);
        $("#registroCelular").val(prmcel_paga); 
        $("#registroEmail").val(prmcor_paga);
        $("#cboEstados").val(prmest_paga);                
        $("#cboMunicipios").val(prmmun_paga);
        $("#cboParroquia").val(prmpar_paga);
        $("#registroDirecionH").val(prmdir_paga);
        $("#registroDirecionO").val(prmofi_paga );
       

      

        botones(1);

        cancelarRegistro();
       
    })


}


function botones(opcion){

    if(opcion == 1){
    
        $(".cancelar").show();
    
    } else {
        
        $(".cancelar").hide();
    
    }
    
    }

function cancelarRegistro(){
    
        $(".cancelar").click(function() {
            limpiarCampos();
            botones(0);
    
        })
    }






$(document).ready(function() {


    inicio();



});