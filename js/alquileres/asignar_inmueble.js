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

   codigoCobrador(prmCodcobra);

   AsignarInmueble(idcobrador);

  // nuevoPagador(idInquilino,prmCodInq, prmTipo);


}


function codigoCobrador(prmDato){

   var html = "";

   html='<strong>COBRADOR : </strong>'  + prmDato +'</span>';

   $("#lblcobrador").html('');
   $("#lblcobrador").html(html);

}





function AsignarInmueble(prmDato){

   /*
   |-----------------------------------------------------
   | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
   |-----------------------------------------------------
   */
   var formData = new FormData();

   formData.append('opcion','CAI'); /*consulta de asignacion de inmueble*/ 
   formData.append('id',prmDato);
  

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
                           
                          
                           tr.append("<td>" + json.Items[0][i].Inmueble + "</td>");
                           tr.append("<td>" + json.Items[0][i].Propietario + "</td>");
                           tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
 
                           var html="";
                           html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                           html += '<a title="Ver" data-field-id_paga="' + json.Items[0][i].id + '"><i class="fa fa-search" alt=“Ver”></i></a>&nbsp;';
                           html += '<a title="Eliminar"  data-field-id_paga="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“Eliminar”></i></a>';
                           
                          
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


       },
       error: function (e) {
           $("#error").html(e).fadeIn();
       }
   });

}



function limpiarTabla() {

   $('#datatablesSimple tbody').children().remove();

}


$(document).ready(function() {


   inicio();



});