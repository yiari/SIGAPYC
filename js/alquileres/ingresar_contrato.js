function inicio(){

    buscarInmueble();
    buscarInquilino();

    guardaronContratos();
    cargarRepresentanteLegal('cboRepresentante');
    limpiarFormulario(1);
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

    jQuery("#registroCanon").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#per_pror").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#dia_pago").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });
    
    jQuery("#ins_cont").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#adm_inmu").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#pap_inmu").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#dep_cont").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#com_cont").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#hab_cont").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });
    
 

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
            mensaje("Debe indicar el codigo inmueble o unidad",1);
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
                           tr.append("<td>" + json.Items[0][i].cod_propietario + "</td>");
                           tr.append("<td>" + tipoPersona(json.Items[0][i].tipo_propietario) + "</td>");

                           if(json.Items[0][i].cod_unidad != ''){
                            tr.append("<td>" + json.Items[0][i].cod_unidad + "</td>");
                           }else{
                            tr.append("<td>" + json.Items[0][i].cod_inmueble + "</td>");
                           }

                           


                           tr.append("<td>" + json.Items[0][i].tipo_inmueble + "</td>");
                           tr.append("<td>" + json.Items[0][i].direccion + "</td>");
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




function buscarInquilino(){



    $("#buscarCodigoinquilino").on('submit', function(evt) {


   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/       

 
        if ($("#nom_inqu").val() == "") {
            mensaje("Debe indicar el codigo de inquilino",1);
            console.log("Aqui llegue al mensaje");
            return;
        }


        prmDato = $("#nom_inqu").val();

   /*
   |-----------------------------------------------------
   | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
   |-----------------------------------------------------
   */
   var formData = new FormData();

   formData.append('opcion','BI'); /*consulta de asignacion de inquilino*/ 
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
                    $("#datosinquilino > tbody").html("");

                   var tr;
                       for (var i = 0; i < json.Items[0].length; i++) {
               
                      // if (isEmpty(json.Items[0][i]) == false) {
                           tr = $('<tr/>');
                           /*
                           i.id_inmu as id_inmueble      
                           ,i.id_prop as id_propietario
                           ,u.id_unid as id_unidad
                           ,p.cod_prop as cod_propietario
                           ,i.cod_inmu as cod_inmueble 
                           ,u.cod_inmu  as cod_unidad
                        */
                           //$("#id_inqu").val(json.Items[0][i].id_inquilino);

                           tr.append("<td>" + json.Items[0][i].cod_inquilino + "</td>");
                           tr.append("<td>" + tipoPersona(json.Items[0][i].tipo) + "</td>");
                           tr.append('<td class="text-center"><input type="radio" id="id_inquilino_' + json.Items[0][i].id_inquilino +  '" name="inquilino" value="'  + json.Items[0][i].id_inquilino + '" onclick="seleccionarInquilino(' + json.Items[0][i].id_inquilino + ',' + json.Items[0][i].tipo + ')"></td>');
                           
 
                           var html="";
                         /*  html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                           html += '<button onclick=vinculacion(' + contador + ') id="vincular' + contador + '"  class="vincular btn btn-success "data-field-idpropietario="' + json.Items[0][i].id_propietario + '"data-field-idinmueble="' + json.Items[0][i].id_inmueble + '"data-field-idunidad="'+ json.Items[0][i].Id_unidad + '"><i class="fa fa-plus" alt=vincular></i>&nbsp;Vincular</button>';
                           html += '</div>'
                           tr.append("<td>" + html + "</td>");*/
                           $('#datosinquilino').append(tr);

                           contador++;
                       //}
                   }

                   //vinculacion();
                   
               } else {

               var tr;
               tr = $('<tr/>');
               tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
               $('#datosinquilino').append(tr);

               }

                new simpleDatatables.DataTable("#datosinquilino");

           } 
               /************************************************ */
             

       },
       error: function (e) {
           $("#error").html(e).fadeIn();
       }
   });

});


}


function seleccionarInquilino(valor,tipo){

    $("#id_inqu").val(valor);
    $("#tipo_inqui").val(tipo);

}

function seleccionarInmueble(id_propietario,id_inmueble,id_unidad,tipo_propietarioj,codigo_inmueble){

    $("#id_prop").val(id_propietario);
    $("#id_inmu").val(id_inmueble);
    $("#id_unid").val(id_unidad);
    $("#tipo_prop").val(tipo_propietarioj);
    

    generarCodigoContrato(codigo_inmueble);

}


function guardaronContratos(){

    $("#registrarcontrato").on('submit', function(evt) {
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


    if ($("#id_inqu").val() == "" || $("#id_inqu").val() == "0" || $("#id_inqu").val() == 0 ) {
       mensaje("Debe seleccionar el inquilino",1);
       return;
   }

   if ($("#cboRepresentante").val() == "" ) {
    mensaje("Debe seleccionar el Representante legal de la administradora",1);
    return;
}



   if ($("#registroCanon").val() == "") {
       mensaje("Debe indicar el monto del canon",1);
       return;
   }

   if ($("#fec_desd").val() == "") {
       mensaje("Debe indicar la fecha de desde del contraro",1);
       return;
   }

   if ($("#fec_hast").val() == "") {
    mensaje("Debe indicar la fecha hasta del contraro",1);
    return;
    }

    if ($("#per_pror").val() == "") {
        mensaje("Debe indicar el día de pago",1);
        return;
        }
    
    if ($("#dia_pago").val() == "") {
        mensaje("Debe indicar el telefono del propietario",1);
        return;
        }
    
    if ($("#pas_cont").val() == "") {
        mensaje("Debe indicar a partir de",1);
        return;
        }

    if ($("#ins_cont").val() == "") {
        mensaje("Debe indicar  los peíodo de Inspección",1);
        return;
        }
    
    if ($("#fec_cont").val() == "") {
        mensaje("Debe colocar la fecha del contrato ",1);
        return;
        }

    if ($("#adm_inmu").val() == "") {
        mensaje("Debe colocar monto de los gastos administrativos ",1);
        return;
        }

    if ($("#pap_inmu").val() == "") {
        mensaje("Debe indicar los  gastos inmueble ",1);
        return;
        }


    if ($("#dep_cont").val() == "") {
        mensaje("Debe indicar cantidad de deposito ",1);
        return;
        }

    if ($("#hab_cont").val() == "") {
        mensaje("Debe indicar el derecho habitacion ",1);
        return;
        }

    if ($("#for_cont").val() == "") {
        mensaje("Debe indicar la forma de pago ",1);
        return;
        }

    if ($("#com_cont").val() == "") {
        mensaje("Debe indicar el monto de la comisión ",1);
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
        
        formData.append('id_propietario',$('#id_prop').val());
        formData.append('id_inmueble',$('#id_inmu').val());
        formData.append('id_unidad',$('#id_unid').val());
        formData.append('id_inquilino',$('#id_inqu').val());
        formData.append('tipo_inquilino',$('#tipo_inqui').val());
        formData.append('tipo_propietario' ,$('#tipo_prop').val());
    

        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistrocontrato.php",
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
        document.getElementById("registrarcontrato").reset();
    }

}

function limpiarTabla() {

    $('#datosinquilino tbody').children().remove();

}

function limpiarTabla() {

    $('#datosAsignarInmueble tbody').children().remove();

}


function limpiarCampos(){

    $("#hidcontrato").val("");
    $("#nom_inqu").val("");
    $("#nom_prop").val("");

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

function generarCodigoContrato(nombre){
  
        var prmNombre= nombre;

        $("#registroCodigo").val('');

        codigoContrato(prmNombre,function(result){
            $("#registroCodigo").val(result);
        });

}



$(document).ready(function() {


    inicio();



});