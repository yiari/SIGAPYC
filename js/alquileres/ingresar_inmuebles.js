function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    $('#id_prop').val(getParameterByName('idpro'));
    $('#tipo_propietario').val(getParameterByName('codtip'));

    let idPropietario = getParameterByName('idpro');
    let prmCodPro = getParameterByName('codpro');
    let prmTipo = getParameterByName('codtip');


    /*--------------------------------------*/    
    codigoPropietario(prmCodPro);
    atrasInmueble(idPropietario,prmCodPro,prmTipo);
    mostrarBuscar(idPropietario);
  
    guardarInmueble();
    cargarEstados();
    cargartipo_inmueble();
    generarCodigoInmueble();



     /*
    |--------------------------------------------------
    | TODOS LOS CAMPOS DE TEXTO ESCRIBEN EN MAYUSCULA
    |--------------------------------------------------
    */
    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    /*------------------------------------------------*/


   
    jQuery("#unidades").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroAntiguedad").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#mtr_inmu").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#mtr_cons").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#hab_inmu").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#ban_inmu").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#est_inmu").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#ser_inmu").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#num_regi").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#tom_regi").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#fol_regi").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#asi_regi").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#fic_cata").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#gasto_admi").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#gasto_papel").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    


    

}

function mostrarBuscar(prmDato){
    if(prmDato == 0){
        $("#buscarPropietario").show();
    }
}

function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}

function atrasInmueble(prmIdPro,prmCodPro,prmTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/inmuebles&idpro=' + prmIdPro  + '&codpro=' + prmCodPro + '&codtip=' + prmTipo;
    
        $(".codpro").prop("href", html);


    //}

}


function guardarInmueble(){

    $("#registroinmueble").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

if ($("#cbobeneficiarios").val() == "") {
    mensaje("Debe indicar si el inmueble posee beneficiarios",1);
    return;
}


 
if ($("#cboinmueble").val() == "") {
    mensaje("Debe indicar el tipo de inmueble",1);
    return;
}


if($('input[name="chkunidades"]').is(':checked'))
{
    //checked

    if($("#unidades").val() == "" || $("#unidades").val() == "0" || $("#unidades").val() == 0){
        mensaje("Debe indicar la cantidad de unidades del inmueble",1);
        return;
    }

}



if ($("#registroletra").val() == "") {
    mensaje("Debe indicar la letra o nuemro del inmueble",1);
    return;
}

 if ($("#registrNombre").val() == "") {
     mensaje("Debe indicar el nombre del inmueble",1);
     return;
     }

if ($("#registroUso").val() == "") {
mensaje("Debe indicar el uso del inmueble",1);
return;
}

if ($("#registroAntiguedad").val() == "") {
        mensaje("Debe indicar la  antiguedad del inmueble",1);
        return;
        }
 
 
if ($("#cboEstados").val() == "") {
    mensaje("Debe indicar el estado de residencia del inmueble",1);
    return;
    }

if ($("#cboMunicipios").val() == "") {
    mensaje("Debe indicar el Municipio de residencia del inmueble",1);
    return;
    }

if ($("#cboParroquia").val() == "") {
    mensaje("Debe indicar la parroquia de residencia del inmueble",1);
    return;
    }
 
 if ($("#registroDirecionH").val() == "") {
     mensaje("Debe indicar la dirección de habitación del propietario ",1);
     return;
     }

     if ($("#equ_inmu").val() == "") {
        mensaje("Debe indicar si el inmueble esta equipado",1);
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

           console.log("Mensaje del JSON: " + json.mensaje);

           if(json.error == 0){
               
               mensaje(json.mensaje,0);

               //$("#mensaje").html(html).fadeIn();
               //limpiarCampos();
               limpiarFormulario();
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


function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("registroinmueble").reset();
    }

}

function checkAgregarUnidades(){

    if($('input[name="chkunidades"]').is(':checked'))
    {
        //checked
        $("#unidades").attr("disabled", false);
    }
    else
    {
        //unchecked
        $("#unidades").attr("disabled", true);

    }

}

function generarCodigoInmueble(){

    

    $('#cboinmueble').change(function() {

        var  prmTipoInmueble = $('#cboinmueble').find('option:selected').attr('data-tipoinmueble');
        var  prmLetraInmueble = $("#registroletra").val();
        var  prmNombreInmueble = $("#registrNombre").val();
        //var prmTipo=$(this).attr('data-tipoinmueble');;

        $("#registroCodigo").val('');

        codigoInmueble(prmTipoInmueble,prmLetraInmueble,prmNombreInmueble,function(result){
            $("#registroCodigo").val(result);
        });


    });


    $("#registroletra").on('keyup', function () {

        var  prmTipoInmueble = $('#cboinmueble').find('option:selected').attr('data-tipoinmueble');
        var  prmLetraInmueble = $("#registroletra").val();
        var  prmNombreInmueble = $("#registrNombre").val();

        $("#registroCodigo").val('');

        codigoInmueble(prmTipoInmueble,prmLetraInmueble,prmNombreInmueble,function(result){
            $("#registroCodigo").val(result);
        });

    });

    $("#registrNombre").on('keyup', function () {

        var  prmTipoInmueble = $('#cboinmueble').find('option:selected').attr('data-tipoinmueble');
        var  prmLetraInmueble = $("#registroletra").val();
        var  prmNombreInmueble = $("#registrNombre").val();

        $("#registroCodigo").val('');

        codigoInmueble(prmTipoInmueble,prmLetraInmueble,prmNombreInmueble,function(result){
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







$(document).ready(function() {


inicio();



});