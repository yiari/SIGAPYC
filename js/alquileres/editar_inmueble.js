function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */

   

    let idPropietario = getParameterByName('idpro');
    let prmCodPro = getParameterByName('codpro');
    let prmTipo = getParameterByName('codtip');
    let tipo_propietario = getParameterByName('codtip');

    let codigoInmueble = getParameterByName('codinmu');
    let idInmueble = getParameterByName('idinmu');

    /*--------------------------------------*/  

    codigoPropietario(prmCodPro);
    atrasInmueble(idPropietario,prmCodPro,tipo_propietario,idInmueble,codigoInmueble);
    cargartipo_inmueble();

    
    cargarEstados();
   
    
   
    
    
    
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

    consultarInmueble(idInmueble,codigoInmueble);

    guardarInmueble();

}


function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}

function atrasInmueble(prmIdPro,prmCodPro,prmTipo,prmIdInmu,prmCodInmu,prmCodTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/inmuebles&idpro=' + prmIdPro  + '&codpro=' + prmCodPro  + '&codtip=' + prmTipo + '&idinmu=' + prmIdInmu + '&codinmu=' + prmCodInmu;
    
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
        formData.append('opcion','CI');

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

                        $('#tipo_propietario').val(json.Items[0].tipo_propietario );
                        $('#id_prop').val(json.Items[0].id_prop );

                        

                         /*
                        |------------------------------------------------------
                        | DATOS PRINCIPALES
                        |------------------------------------------------------
                        */
                        $('#tieneunidades').val(json.Items[0].tieneunidades);
                        $('#unidades').val(json.Items[0].unidades);
                        $("select[name='cboinmueble']").val(json.Items[0].tip_inmu).change();


                        $('#registrNombre').val(json.Items[0].nom_inmu); 
                        $('#registroletra').val(json.Items[0].ape_apod);
                        
                        $('#registroUso').val(json.Items[0].act_inmu); 
                        $('#registroAntiguedad').val(json.Items[0].ant_inmu);
                        
                        $('#pun_inmu').val(json.Items[0].pun_inmu);
                        
                        $('#registroletra').val(json.Items[0].letra); 


                        $("select[name='cboEstados']").val(json.Items[0].cod_esta).change();
                        setTimeout(function(){ $("select[name='cboMunicipios']").val(json.Items[0].cod_muni ).change() }, 2000);
                        setTimeout(function(){ $("select[name='cboParroquia']").val(json.Items[0].cod_parr).change() }, 4000);

                        
                        $('#registroDirecionH').val(json.Items[0].dir_inmu);

                        $("#registroCodigo").val(json.Items[0].cod_inmu);


                        $('#equ_inmu').val(json.Items[0].equ_inmu);
                        $('#mtr_inmu').val(json.Items[0].mtr_inmu);
                        $('#mtr_cons').val(json.Items[0].mtr_cons);
                        $('#hab_inmu').val(json.Items[0].hab_inmu);
                        $('#ban_inmu').val(json.Items[0].ban_inmu);
                        $('#est_inmu').val(json.Items[0].est_inmu);
                        $('#ser_inmu').val(json.Items[0].ser_inmu);
                        $('#est_inmu').val(json.Items[0].est_inmu);


                        $('#lim_nort').val(json.Items[0].lim_nort);
                        $('#lim_sur').val(json.Items[0].lim_sur);
                        $('#lim_este').val(json.Items[0].lim_este);
                        $('#lim_oest').val(json.Items[0].lim_oest);



                        $('#num_regi').val(json.Items[0].num_regi);
                        $('#nom_regi').val(json.Items[0].nom_regi);
                        $('#fec_regi').val(json.Items[0].fec_regi);
                        $('#tom_regi').val(json.Items[0].tom_regi);
                        $('#fol_regi').val(json.Items[0].fol_regi);

                        $('#asi_regi').val(json.Items[0].asi_regi);
                        $('#fic_cata').val(json.Items[0].fic_cata); 
                        

                        $("select[name='cbobeneficiarios']").val(json.Items[0].posee_beneficiario).change();

                        $('#id_gastos').val(json.Items[0].id_gastos); 
                        $('#gasto_admi').val(json.Items[0].gasto_admi); 
                        $('#gasto_papel').val(json.Items[0].gasto_papel); 



                    }

                }else {

                    mensaje(json.mensaje,1);

                    //$("#mensaje").html(html).fadeIn();
                }

                generarCodigoInmueble();

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
               
               let urlATRAS  =$('.atrasURL').attr('href')

                mensaje(json.mensaje,0,urlATRAS);

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


function mensaje(mensaje, condicion, url = ""){

    var html="";
    var urlhtml="";

    if(condicion == 0){//ESTOS SON MENSAJES CON EXITO

        if(url != ""){
            $('#btnMensajeNormal').hide(); //OCULTO EL BOTON NORMAL
            $('#btnMensajeAtras').show(); //MUESTRO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
                       
            html='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + mensaje;

            urlhtml = '<a class="btn btn-primary" href="' + url + '"  role="button">Aceptar</a>';


        } else {
            $('#btnMensajeNormal').show(); //MUESTRO EL BOTON NORMAL
            $('#btnMensajeAtras').hide(); //OCUTLO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
            html='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + mensaje;
        }


        

    } else if (condicion == 1){//ESTOS SON MENSAJES CON ERROR
        $('#btnMensajeNormal').show(); //MUESTRO EL BOTON NORMAL
        $('#btnMensajeAtras').hide(); //OCUTLO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
        html='<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color:#bf1d1d;"></i>&nbsp' + mensaje;
    }


    $('#spanMsg').html('');
    $('#spanMsg').html(html);

    if(url != ""){
        $('#btnMensajeAtras').html('');
        $('#btnMensajeAtras').html(urlhtml);
    }

    //open the modal
    $('#msgModal').modal('show');

}

 


function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}


$(document).ready(function() {


    inicio();



});