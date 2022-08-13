function inicio(){

/*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    $('#id_cobrador').val(getParameterByName('idcobra'));
  
    /*
   |----------------------------------------
   | ASI SE CAPTURAN LOS PARAMETROS
   |---------------------------------------
   */
   let idcobrador = getParameterByName('idcobra');
   let prmCodcobra = getParameterByName('codcobra');
 
   /*--------------------------------------*/    


   buscarInmueble();
   codigoCobrador(prmCodcobra)
   InmuebleAsigmnadoCobrador();

}


function codigoCobrador(prmDato){

   var html = "";

   html='<strong>COBRADOR : </strong>'  + prmDato +'</span>';

   $("#lblcobrador").html('');
   $("#lblcobrador").html(html);

}


function mostrarBuscar(prmDato){
    if(prmDato == 0){
        $("#buscarCodigo").show();
    }
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
            mensaje("Debe indicar el codigo de propietario, inmueble o unidad",1);
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

   formData.append('opcion','CAI'); /*consulta de asignacion de inmueble*/ 
   formData.append('id_cobrador',prmDato);
  

   /*
   |-----------------------------------------------
   | AQUI SE LLAMA EL AJAX 
   |-----------------------------------------------
   */
   $.ajax({
       url: "app/handler/alquileres/hndregistrocobrador.php",
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
                           /*
                           i.id_inmu as id_inmueble      
                           ,i.id_prop as id_propietario
                           ,u.id_unid as id_unidad
                           ,p.cod_prop as cod_propietario
                           ,i.cod_inmu as cod_inmueble 
                           ,u.cod_inmu  as cod_unidad
                        */

                           tr.append("<td>" + json.Items[0][i].cod_propietario + "</td>");
                           tr.append("<td>" + json.Items[0][i].cod_inmueble + "</td>");
                           tr.append("<td>" + json.Items[0][i].cod_unidad + "</td>");
 
                           var html="";
                           html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                           html += '<button class="btn btn-success "data-field-idcobrador="' + json.Items[0][i].id_cobrador + '"data-field-idinmueble="' + json.Items[0][i].id_inmueble + '"data-field-idunidad="'+ json.Items[0][i].Id_unidad + '"><i class="fa fa-plus" alt=vincular></i>&nbsp;Vincular</button>';
                           html += '</div>'
                           tr.append("<td>" + html + "</td>");
                           $('#datosAsignarInmueble').append(tr);
                       //}
                   }
                   
               } else {

               var tr;
               tr = $('<tr/>');
               tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
               $('#datosAsignarInmueble').append(tr);

               }

                new simpleDatatables.DataTable("#datosAsignarInmueble");

           } 
               /************************************************ */
               vinculacion();

       },
       error: function (e) {
           $("#error").html(e).fadeIn();
       }
   });

});


}



function vinculacion(){



    $(".vincular").click(function() {

        console.log ("estoy aqui vincular");
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/ 
   var prmidusuario = $(this).data('field-id_usuario');       
   var prmidcobrador = $(this).data('field-id_cobrador');
   var prmidinmueble = $(this).data('field-id_inmueble');
   var prmidunidad = $(this).data('field-id_unidad');


       
 
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
   formData.append('opcion','V');
   formData.append('idusuario',prmidusuario);
   formData.append('idcobrador',prmidcobrador);
   formData.append('idinmueble',prmidinmueble);
   formData.append('idunidad',prmidunidad);


   /*
   |-----------------------------------------------
   | AQUI SE LLAMA EL AJAX 
   |-----------------------------------------------
   */
   $.ajax({
       url: "app/handler/admin/hndregistrousuarios.php",
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



function InmuebleAsigmnadoCobrador(){

   /*
   |-----------------------------------------------------
   | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
   |-----------------------------------------------------
   */
   var formData = new FormData();

   formData.append('opcion','IAC'); /*consulta de inmuebles asignado al cobrador*/ 
  
  

   /*
   |-----------------------------------------------
   | AQUI SE LLAMA EL AJAX 
   |-----------------------------------------------
   */
   $.ajax({
       url: "app/handler/alquileres/hndregistrocobrador.php",
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
                           
                          
                           tr.append("<td>" + json.Items[0][i].cobrador + "</td>");
                           tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                         
 
                           var html="";
                           html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                           html += '<button class="btn btn-danger delete" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-minus " alt=“eliminar”></i>&nbsp;Desvincular</button>';
                          
                           html += '</div>'
                           tr.append("<td>" + html + "</td>");
                           $('#datosInmuebleAsignados').append(tr);
                       //}
                   }
                   
               } else {

               var tr;
               tr = $('<tr/>');
               tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
               $('#datosInmuebleAsignados').append(tr);

               }

                new simpleDatatables.DataTable("#datosInmuebleAsignados");

           } 
               /************************************************ */


       },
       error: function (e) {
           $("#error").html(e).fadeIn();
       }
   });

}




function limpiarTabla() {

   $('#datatablesSimple tbody').children().remove();

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