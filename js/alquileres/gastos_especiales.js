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

       $('#tipo_inqui').val(getParameterByName('tipoinqu'));

       $('#total').val(getParameterByName('monto'));


       $('#id_inmu').val(getParameterByName('idinmu'));
       $('#inmueble').val(getParameterByName('codinmu'));

       $('#id_unid').val(getParameterByName('idunid'));
       $('#unidad').val(getParameterByName('codunid'));
       $('#mes').val(getParameterByName('idmes'));

       
   
      
       let prmCodaviso = getParameterByName('codaviso');
       let prmidinqu = getParameterByName('idinqu');
       let prmcodigoInquilino = getParameterByName('codinqu');
       let prmtipoinqu = getParameterByName('tipoinqu')
       let prmmonto = getParameterByName('monto');
       let prminmu = getParameterByName('idinmu');
       let prmunid = getParameterByName('idunid');
       let prmmes = getParameterByName('idmes');
    
 
    GastosEspecialesInmueble(prminmu,prmunid,prmidinqu,prmtipoinqu);
    guardarGastos();

    
    limpiarTabla();
    limpiarCampos();
   
/*
    |--------------------------------------------------
    | TODOS LOS CAMPOS DE TEXTO ESCRIBEN EN MAYUSCULA
    |--------------------------------------------------
    */
    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    /*------------------------------------------------*/

    jQuery("#registroGasto").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroMonto").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });
   


    codigoAvisoCobro(prmCodaviso);

    montoAvisoCobro(prmmonto);
    
    codigoInquilino(prmcodigoInquilino);


    


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
    $("#monto").val(prmDato);

}


function codigoInquilino(prmDato){

    var html = "";

    html='<strong>INQUILINO : </strong>'  + prmDato +'</span>';

    $("#lblInquilino").html('');
    $("#lblInquilino").html(html);

}




function seleccionarInmueble(id_inmueble,id_unidad){

  
    $("#id_inmu").val(id_inmueble);
    $("#id_unid").val(id_unidad);
 

    //generarCodigoContrato(codigo_inmueble);

}



function guardarGastos(){

    $("#buscargastos").on('submit', function(evt) {
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


 
   if ($("#registroGasto").val() == "") {
    mensaje("Debe indicar el concepto del gasto",1);
    return;
    }

   if ($("#registroMonto").val() == "") {
       mensaje("Debe indicar el monto del Gasto",1);
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
        formData.append('opcion','IN');
        
        formData.append('id_inmueble',$('#id_inmu').val());
        formData.append('id_unidad',$('#id_unid').val());
        formData.append('id_inquilino',$('#id_inqu').val());
        formData.append('id_usuario',$('#id_usuario').val());
        formData.append('tipo_inquilino',$('#tipo_inqui').val());
        formData.append('mes',$('#mes').val());


        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistrogastosespeciales.php",
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
                    
                    mensaje(json.mensaje,0);

                    //$("#mensaje").html(html).fadeIn();
                    limpiarFormulario(1);
                    limpiarTabla();
                    limpiarCampos();
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


function limpiarFormulario(valor){

    if(valor == 1){
        document.getElementById("#buscargastos").reset();
    }

}


function limpiarTabla() {

    $('#datosAsignarInmueble tbody').children().remove();

}


function limpiarCampos(){

    $("#hidgastos").val("");
    $("#registroGasto").val("");
    $("#registroMonto").val("");
    $("#nom_prop").val("");
    $("#mes").val("");
  

}

function GastosEspecialesInmueble(prmDato,prmunid,prmidinqu,prmtipoinqu){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','GI');

    formData.append('id_inmu',prmDato);
    formData.append('id_unid',prmunid);
    formData.append('id_inqu',prmidinqu);
    formData.append('tipo_inqui',prmtipoinqu);

    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrogastosespeciales.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#error").fadeOut();
        },
        success: function (data) {
        var json = data;
        var html = "";
/*
        console.log(json);
        console.log("Este es el Mensaje: " + json.mensaje);
        console.log("Items: " + json.Items.length);
        console.log("Items Resultados: " + json.Items[0].length);
        console.log("Email Resultados: " + json.Items[0][1].email);
*/
                /*
                |------------------------------------------------------
                | AQUI SE CARGA LA INFORMACION EN LA TABLA
                |------------------------------------------------------
                */

                if(json.Items.length > 0){
                    var tr;
                
                    if(json.Items.length > 0){
                    var tr;
                        for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                                tr = $('<tr/>');
                                    
                                tr.append("<td>" + (i+1) + "</td>");
                                tr.append("<td>" + json.Items[0][i].mes_gasto + "</td>");
                                tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                                tr.append("<td>" + json.Items[0][i].concepto + "</td>");
                                tr.append("<td>" + json.Items[0][i].monto + "</td>");
                                tr.append("<td>" + json.Items[0][i].fecha_creacion + "</td>"); 
                                
                                var html="";
                                html = '<div class="btn-group">';
                                html += '<button class=" delete" data-field-id="' + json.Items[0][i].id_gesp + '"><i class="fa fa-trash" ></i>&nbsp;</button>';
                                html += '</div>'
                                tr.append("<td>" + html + "</td>");
                                $('#Especiales').append(tr);
                        //}
                    }
                    
                } else {

                var tr;
                tr = $('<tr/>');
                tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                $('#Especiales').append(tr);

                }

                 new simpleDatatables.DataTable("#Especiales");

            } 
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}






function botones(opcion){

if(opcion == 1){

    $(".cancelar").show();

} else {
    
    $(".cancelar").hide();

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



function validareliminargasto(){

    $(".delete").click(function() {

        var vlId = $(this).data('field-id');
        var vlEliminar = '#'; //'{{ route("eliminar-ministerial",["id" => "VALOR"]) }}';
        //vlEliminar = vlEliminar.replace('VALOR', vlId);

        $('#spanDeleteOk').attr('onclick','eliminarGastos(' + vlId + ')');

        //pass the data in the modal body adding html elements
        //$('#spanDelete').html('');
        //$('#spanDelete').html('<form id="delete-form" action="' + vlEliminar + '" method="POST" style="display: none;">@csrf</form>');
        //open the modal
        $('#deleteModal').modal('show')

    })


}

function eliminarUsuario(idgastos){

    //mensaje("Eliminar el usuario con el ID: " + idusuario,0);
   
  /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData();

        formData.append('id_gesp',idgastos);
        formData.append('opcion','D');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistrogastosespeciales.php",
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
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
                        //limpiarTabla();
                        botones(0);
                        //cargarUsuarios();
    
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

function cancelarRegistro(){
    
    $(".cancelar").click(function() {
        //limpiarCampos();
        botones(0);

    })
}






$(document).ready(function() {


    inicio();



});