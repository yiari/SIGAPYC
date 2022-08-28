function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */

    $('#id_prop').val(getParameterByName('idpro'));
    let idPropietario = getParameterByName('idpro');
    let prmCodPro = getParameterByName('codpro');

    let codigoInmueble = getParameterByName('codinm');
    let idInmueble = getParameterByName('idainm');

    /*--------------------------------------*/  

    codigoPropietario(prmCodPro);
    atrasInmueble(idPropietario,prmCodPro);  


    generarCodigoApoderado();
    cargarEstados();
    //cargarBancos('cboBancoN');
    //cargarBancos('cboBancoNP');
    
   
    guardarApoderado();
    
    
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

    


   
/*
|------------------------------------------------------------------------------------------------
| DESPUES DE CARGAR LAS FUNCIONES Y VALIDACIONES, ENTONCES SOLICITO LOS DATOS DEL PROPIETARIO
|-------------------------------------------------------------------------------------------------
*/

consultarApoderado(idInmueble,codigoInmueble);



}


function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}

function atrasInmueble(prmIdPro, prmCodPro){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/inmuebles&idpro=' + prmIdPro  + '&codpro=' + prmCodPro;
    
        $(".codpro").prop("href", html);


    //}

}



function consultarInmueble(id,codigo){

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
        formData.append('opcion','CA');

        formData.append('idInmueble',id);
        formData.append('codigoInmueble',codigo);
       

        //formData.append('tipoPropietario',tipo);
        
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
            let idPropietario = 0;
                console.log("Mensaje del JSON: " + json);

                if(json.error == 0){
                    
                    //mensaje(json.mensaje,0);
                    if(json.Items.length > 0){


                        //<input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                        $('#hidinmueble').val(json.Items[0].id_inmu );

                         /*
                        |------------------------------------------------------
                        | DATOS PRINCIPALES
                        |------------------------------------------------------
                        */
                        $('#tieneunidades').val(json.Items[0].tieneunidades);
                        $('#unidades').val(json.Items[0].unidades);
                        $("select[name='cboinmueble']").val(json.Items[0].tip_inmu).change();


                        $('#registrNombre').val(json.Items[0].act_inmu); 
                        $('#registroletra').val(json.Items[0].ape_apod);
                        
                        $('#registrNombre').val(json.Items[0].act_inmu);


                        
                        $('#registroCedula').val(json.Items[0].ci_apod);
                        $('#registroRif').val(json.Items[0].rif_apod);
                        $('#registroTelefono').val(json.Items[0].loc_apod);
                        $('#registroCelular').val(json.Items[0].cel_apod);
                        $('#registroEmail').val(json.Items[0].cor_apod);


                        $("select[name='cboEstados']").val(json.Items[0].est_apod).change();
                        setTimeout(function(){ $("select[name='cboMunicipios']").val(json.Items[0].mun_apod).change() }, 2000);
                        setTimeout(function(){ $("select[name='cboParroquia']").val(json.Items[0].par_apod).change() }, 4000);

                        
                        $('#registroDirecionH').val(json.Items[0].dir_apod);
                        $('#registroDirecionO').val(json.Items[0].ofi_apod);


                        $("#registroCodigo").val(json.Items[0].cod_inmu);


                        $('#cod_pode').val(json.Items[0].cod_pode);
                        $('#not_pode').val(json.Items[0].not_pode);
                        $('#fec_pode').val(json.Items[0].fec_pode);
                        $('#num_pode').val(json.Items[0].num_pode);
                        $('#tom_pode').val(json.Items[0].tom_pode);
                        $('#fol_pode').val(json.Items[0].fol_pode);


                     /*   id_inmu 
                     
                        ,cod_inmu 
                        ,tieneunidades
                        ,unidades 
                        ,tip_inmu 
                        ,act_inmu 
                        ,ant_inmu 
                        ,cod_esta 
                        ,cod_muni 
                        ,cod_parr 
                        ,dir_inmu 
                        ,pun_inmu 
                        ,equ_inmu 
                        ,mtr_inmu 
                        ,mtr_cons 
                        ,hab_inmu 
                        ,ban_inmu 
                        ,est_inmu 
                        ,ser_inmu 
                        ,sta_inmu 
                        ,lim_nort 
                        ,lim_sur  
                        ,lim_este 
                        ,lim_oest 
                        ,nom_regi 
                        ,fec_regi 
                        ,tom_regi 
                        ,fol_regi 
                        ,asi_regi 
                        ,fic_cata 
                        ,num_regi */

                       

                      



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



function guardarInmueble(){

    $("#registroinmueble").on('submit', function(evt) {
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
               //cargarInmueble();

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







    


function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}