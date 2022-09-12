function inicio(){

    
    
    
    guardaronGastos();
    buscarInmueble();
    //cargarMeses('cbomeses');
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
   
    cargarGastosEspeciales();


}

function buscarInmueble(){



    $("#buscarCodigo").on('submit', function(evt) {


   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/       

 
        if ($("#nom_prop").val() == "") {
            mensaje("Debe indicar el  inmueble o unidad",1);
            console.log("Aqui llegue al mensaje");
            return;
        }


        prmDato = $("#nom_prop").val();

   /*
   |-----------------------------------------------------
   | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
   |-----------------------------------------------------
   */
   var formData = new FormData();

   formData.append('opcion','BIU'); /*consulta de asignacion de inmueble y unidades*/ 
   formData.append('codigo',prmDato);

   /*
   |-----------------------------------------------
   | AQUI SE LLAMA EL AJAX 
   |-----------------------------------------------
   */
   $.ajax({
       url: "app/handler/alquileres/hndregistrocontrato.php",
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
                    var contador = 0;
                   if(json.Items.length > 0){
                    $("#datosAsignarInmueble > tbody").html("");
                    let char = String.fromCharCode(39);
                   var tr;
                       for (var i = 0; i < json.Items[0].length; i++) {
               
                      // if (isEmpty(json.Items[0][i]) == false) {
                           tr = $('<tr/>');
                           /*
                           i.id_inmu as id_inmueble      
                           ,i.id_prop as id_propietario
                           ,u.id_unid as id_unidad
                        */
                       /*
                           $("#id_prop").val(json.Items[0][i].id_propietario);
                           $("#id_inmu").val(json.Items[0][i].id_inmueble);
                           $("#id_unid").val(json.Items[0][i].id_unidad);
                        */
                           /*tr.append("<td>" + json.Items[0][i].cod_propietario + "</td>");
                           tr.append("<td>" + tipoPersona(json.Items[0][i].tipo_propietario) + "</td>");*/
                           tr.append("<td>" + json.Items[0][i].cod_inmueble + "</td>");
                           tr.append("<td>" + json.Items[0][i].cod_unidad + "</td>");
                           tr.append('<td class="text-center"><input type="radio" id="id_inmueble_' + json.Items[0][i].id_inmueble +  '" name="inmueble" onclick="seleccionarInmueble(' + json.Items[0][i].id_propietario + ',' + json.Items[0][i].id_inmueble + ',' + json.Items[0][i].id_unidad + ',' + json.Items[0][i].tipo_propietario + ',' + char + json.Items[0][i].cod_inmueble + char +')"></td>');

                           var html="";
                         /*  html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                           html += '<button onclick=vinculacion(' + contador + ') id="vincular' + contador + '"  class="vincular btn btn-success "data-field-idpropietario="' + json.Items[0][i].id_propietario + '"data-field-idinmueble="' + json.Items[0][i].id_inmueble + '"data-field-idunidad="'+ json.Items[0][i].Id_unidad + '"><i class="fa fa-plus" alt=vincular></i>&nbsp;Vincular</button>';
                           html += '</div>'
                           tr.append("<td>" + html + "</td>");*/
                           $('#datosAsignarInmueble').append(tr);

                           contador++;
                       //}
                   }

                   //vinculacion();
                   
               } else {

               var tr;
               tr = $('<tr/>');
               tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
               $('#datosAsignarInmueble').append(tr);

               }

                new simpleDatatables.DataTable("#datosAsignarInmueble");

           } 
               /************************************************ */
             

       },
       error: function (e) {
           $("#error").html(e).fadeIn();
       }
   });

});


}



function seleccionarInmueble(id_propietario,id_inmueble,id_unidad,tipo_propietarioj){

    $("#id_prop").val(id_propietario);
    $("#id_inmu").val(id_inmueble);
    $("#id_unid").val(id_unidad);
    $("#tipo_prop").val(tipo_propietarioj);

    //generarCodigoContrato(codigo_inmueble);

}

function guardaronGastos(){

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


    if ($("#id_inmu").val() == "" || $("#id_inmu").val() == "0" || $("#id_inmu").val() == 0 ) {
       mensaje("Debe seleccionar el inmueble",1);
       return;
   }

   nom_prop


   if ($("#nom_prop").val() == "") {
    mensaje("Debe seleccionar el inmueble",1);
    return;
   }

 


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
        formData.append('opcion','I');
        
        formData.append('id_inmueble',$('#id_inmu').val());
        formData.append('id_unidad',$('#id_unid').val());


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




function cargarGastosEspeciales(){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');

    //formData.append('id_inmu',prminmu);
   
  
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

                    if(json.Items[0].length > 0){
                        for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                            tr = $('<tr/>');
                            
                            tr.append("<td>" + (i+1) + "</td>");
                            tr.append("<td>" + json.Items[0][i].mes_gasto + "</td>");
                            tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                            tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                            tr.append("<td>" + json.Items[0][i].concepto + "</td>");
                            tr.append("<td>" + json.Items[0][i].monto + "</td>");
                            tr.append("<td>" + json.Items[0][i].fecha + "</td>"); 
                            
                            var html="";
                            html = '<div class="btn-group">';
                            html += '<button class=" delete" data-field-id="' + json.Items[0][i].id_gesp + '"><i class="fa fa-trash" ></i>&nbsp;</button>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#gastosEspeciales').append(tr);
                        //}
                    }


                }else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#gastosEspeciales').append(tr);

                    }

                new simpleDatatables.DataTable("#gastosEspeciales");

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