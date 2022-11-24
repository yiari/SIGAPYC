function inicio(){


    cargarReciboPedido();

   

}



function cargarReciboPedido(){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','CRP');
  
 
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrorecibopedido.php",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        type: 'POST',
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#error").fadeOut();
        },
        success: function (data) {
        var json = data;
        var html = "";

                /*
                |------------------------------------------------------
                | AQUI SE CARGA LA INFORMACION EN LA TABLA
                |------------------------------------------------------
                */
                if(json.Items.length > 0){
                    var tr;
                    
                    if(json.Items[0].length > 0){
                        $("#datosAvisoCobro > tbody").html("");

                            for (var i = 0; i < json.Items[0].length; i++) {
                        
                                console.log("valor recorrido: " + i);


                            // if (isEmpty(json.Items[0][i]) == false) {
                                    tr = $('<tr/>');

                                 
                                  
                                    
                                    tr.append("<td>" + json.Items[0][i].nombre_mes + "</td>");
                                    tr.append("<td>" + json.Items[0][i].inquilino + "</td>");


                                    if(json.Items[0][i].unidad != null){
                                        tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                                       }else{
                                        tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                                       }
                                    
                                    tr.append("<td>" + json.Items[0][i].cod_aviso + "</td>");
                                    tr.append("<td>" + json.Items[0][i].cod_recibo + "</td>");
                                    tr.append("<td>" + json.Items[0][i].cod_Pedido + "</td>");
                                    
                                    tr.append("<td>" + json.Items[0][i].monto_recibo + "</td>");
                                    tr.append("<td>" + json.Items[0][i].monto_pedido + "</td>");
                                    tr.append("<td>" + json.Items[0][i].mensualidad + "</td>");
                                    tr.append("<td>" + json.Items[0][i].tasa + "</td>");
                                    tr.append("<td>" + json.Items[0][i].Bs + "</td>");
                                    tr.append("<td>" + statusRecibPedido(json.Items[0][i].status) + "</td>");
                                  
               
                                    var html="";
                                  

                                    html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                                    //html += '<a title="PDF"  href="app/reportes/reprecibo.php?id='  + json.Items[0][i].id +'&codreci=' +json.Items[0][i].cod_recibo +'" target="_blank"><i class="fa fa-file-pdf-o" alt=“PDF” ></i></a>';
                                    
                                    html += '<a title="PDF1"  href="app/reportes/reprecibo2.php?id='  + json.Items[0][i].id +'&codreci=' +json.Items[0][i].cod_recibo +'" target="_blank"><i class="fa fa-file-pdf-o" alt=“PDF” ></i></a>';

                                    //ANULAR EL RECIBO
                                   // html += '<a title="Anulacion"  href="#" onclick="validaranulacion(' + json.Items[0][i].id + ');"><i class="fa fa-exclamation-triangle" alt=“recibo” ></i></a>';

                                    html += '<a title="Enviar notificación"  data-field-id="'  + json.Items[0][i].id_aviso + '"><i class="fa fa-envelope-open-o " alt=“email”></i></a>';
                                   
                                   
                                    html += '</div>'
                                    tr.append("<td>" + html + "</td>");
                                    $('#datosReciboPedido').append(tr);
                                //}
                            }
                            
                    
                        } else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=12 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosReciboPedido').append(tr);

                        }


                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#datosReciboPedido");
                    */

                    $('#datosReciboPedido').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
                    //validaranulacion();

                } 
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}



function validaranulacion(id){

    //$(".anular").click(function() {

        var vlId = id;//$(this).data('field-id');
        var vlEliminar = '#'; //'{{ route("eliminar-ministerial",["id" => "VALOR"]) }}';
        //vlEliminar = vlEliminar.replace('VALOR', vlId);

        var html ='';
        html = ' <button class="btn btn-secondary" type="button" önclick="anulacionRecibo(' + vlId + ');">si</button>';

         $('#spanAnular').html('');
         $('#spanAnular').html(html);

        //$('#spanAnular').attr('onclick','anulacionRecibo(' + vlId + ')');

        //pass the data in the modal body adding html elements
        //$('#spanDelete').html('');
        //$('#spanDelete').html('<form id="delete-form" action="' + vlEliminar + '" method="POST" style="display: none;">@csrf</form>');
        //open the modal
        $('#anularReciboModal').modal('show');

    //})


}


function anulacionRecibo(idrecibo){

    //mensaje("Eliminar el usuario con el ID: " + idusuario,0);
   
  /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData();

        formData.append('id',idrecibo);
        formData.append('opcion','A');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/alquileres/hndregistrorecibopedido.php",
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
                        limpiarTabla();
                 
    
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




function limpiarTabla() {

    $('#datosAvisoCobro tbody').children().remove();

}



function buscarInquilino(){



   // $("#buscarCodigoinquilino").on('submit', function(evt) {


   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
  // evt.preventDefault();
   /**********************************************/       

 /*
        if ($("#nom_inqu").val() == "") {
            mensaje("Debe indicar el codigo de inquilino",1);
            //console.log("Aqui llegue al mensaje");
            return;
        }
*/

        prmDato = $("#nom_inqu").val();

   /*
   |-----------------------------------------------------
   | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
   |-----------------------------------------------------
   */
   var formData = new FormData();

   formData.append('opcion','C'); /*consulta de asignacion de inquilino*/ 
   formData.append('nom_inqu',prmDato);
   formData.append('estatus',0);
  

   /*
   |-----------------------------------------------
   | AQUI SE LLAMA EL AJAX 
   |-----------------------------------------------
   */
   $.ajax({
       url: "app/handler/alquileres/hndregistroavisocobro.php",
       data: formData,
       processData: false,
       contentType: false,
       dataType: "json",
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
                    $("#datosAvisoCobro > tbody").html("");

                        for (var i = 0; i < json.Items[0].length; i++) {
                    
                            console.log("valor recorrido: " + i);


                        // if (isEmpty(json.Items[0][i]) == false) {
                                tr = $('<tr/>');

                                tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                                tr.append("<td>" + fecha(json.Items[0][i].fecha,'YYYYMMDD','DD/MM/YYYY') + "</td>");
                                tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                                tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                                tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                                tr.append("<td>" + json.Items[0][i].mensualidad + "</td>");
                                tr.append("<td>" + json.Items[0][i].gastos_esp + "</td>");
                                tr.append("<td>" + json.Items[0][i].total + "</td>");
                                tr.append("<td>" + statusAvisoCobro(json.Items[0][i].estatus) + "</td>");
                                tr.append("<td>" + json.Items[0][i].repuestas + "</td>");

                              
                                
                                var html="";
                              

                                html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                                html += '<a title="Respuesta"  href="index.php?url=app/vistas/alquileres/gestion_recibo_pedido&idaviso=' + json.Items[0][i].id_aviso + '&codaviso=' + json.Items[0][i].codigo  + '&idinqu=' + json.Items[0][i].id_inqu  + '&codinqu=' + json.Items[0][i].inquilino  +  '&tipoinqu=' + json.Items[0][i].tipo  + '&monto=' + json.Items[0][i].total  + '&codinqu=' + json.Items[0][i].inquilino  +  '&idinqu=' + json.Items[0][i].id_inqu  +'"><i class="fa fa-tags"></i></a>';
                                html += '<a title="recibo y Pedido"  href="index.php?url=app/vistas/alquileres/gestion_cliente&idaviso=' + json.Items[0][i].id_aviso + '&codaviso=' + json.Items[0][i].codigo  + '&idinqu=' + json.Items[0][i].id_inqu  + '&codinqu=' + json.Items[0][i].inquilino  +  '&tipoInqu=' + json.Items[0][i].tipo  + '&monto=' + json.Items[0][i].total + '&codinqu=' + json.Items[0][i].inquilino  +  '&idinqu=' + json.Items[0][i].id_inqu  +'"><i class="fa fa-exclamation-circle"></i></a>';
                                html += '<a title="PDF" href="app/documentos/avcobro.pdf"  data-field-id="'  + json.Items[0][i].id_aviso + '" target="_blank"><i class="fa fa-file-pdf-o" alt=“PDF” ></i></a>';
                                html += '<a title="Enviar notificación"  data-field-id="'  + json.Items[0][i].id_aviso + '"><i class="fa fa-envelope-open-o " alt=“email”></i></a>';
                                   
                               
                                html += '</div>'
                                tr.append("<td>" + html + "</td>");
                                $('#datosAvisoCobro').append(tr);
                            //}
                        }
                
                    } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#datosAvisoCobro').append(tr);

                    }


                /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                     new simpleDatatables.DataTable("#datosAvisoCobro");
                    */

                    $('#datosAvisoCobro').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );

            
               } 
               /************************************************ */
             

       },
       error: function (e) {
           $("#error").html(e).fadeIn();
       }
   });

//});


}




function buscarEstatus(prmValor){



    // $("#buscarCodigoinquilino").on('submit', function(evt) {
 
 
    /*
    |-----------------------------------------------
    | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
    |-----------------------------------------------
    */
   // evt.preventDefault();
    /**********************************************/       
 
  /*
         if ($("#nom_inqu").val() == "") {
             mensaje("Debe indicar el codigo de inquilino",1);
             //console.log("Aqui llegue al mensaje");
             return;
         }
 */
 
        // prmDato = $("#nom_inqu").val();
 
    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();
 
    formData.append('opcion','C'); /*consulta de asignacion de inquilino*/ 
    formData.append('nom_inqu',"");
    formData.append('estatus',prmValor);
   
 
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistroavisocobro.php",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
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
                     $("#datosAvisoCobro > tbody").html("");
 
                         for (var i = 0; i < json.Items[0].length; i++) {
                     
                             console.log("valor recorrido: " + i);
 
 
                         // if (isEmpty(json.Items[0][i]) == false) {
                                 tr = $('<tr/>');
 
                                 tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                                 tr.append("<td>" + fecha(json.Items[0][i].fecha,'YYYYMMDD','DD/MM/YYYY') + "</td>");
                                 tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                                 tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                                 tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                                 tr.append("<td>" + json.Items[0][i].mensualidad + "</td>");
                                 tr.append("<td>" + json.Items[0][i].gastos_esp + "</td>");
                                 tr.append("<td>" + json.Items[0][i].total + "</td>"); 
                                 tr.append("<td>" + statusAvisoCobro(json.Items[0][i].estatus) + "</td>");
                                 tr.append("<td>" + json.Items[0][i].repuestas + "</td>");
 
                               
                                 
                                 var html="";
                               
 
                                 html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                                 html += '<a title="Respuesta"  href="index.php?url=app/vistas/alquileres/gestion_recibo_pedido&idaviso=' + json.Items[0][i].id_aviso + '&codaviso=' + json.Items[0][i].codigo  + '&idinqu=' + json.Items[0][i].id_inqu  + '&codinqu=' + json.Items[0][i].inquilino  +  '&tipoinqu=' + json.Items[0][i].tipo  + '&monto=' + json.Items[0][i].total  + '&codinqu=' + json.Items[0][i].inquilino  +  '&idinqu=' + json.Items[0][i].id_inqu  +'"><i class="fa fa-tags"></i></a>';
                                 html += '<a title="recibo y Pedido"  href="index.php?url=app/vistas/alquileres/gestion_cliente&idaviso=' + json.Items[0][i].id_aviso + '&codaviso=' + json.Items[0][i].codigo  + '&idinqu=' + json.Items[0][i].id_inqu  + '&codinqu=' + json.Items[0][i].inquilino  +  '&tipoinqu=' + json.Items[0][i].tipo  + '&monto=' + json.Items[0][i].total + '&codinqu=' + json.Items[0][i].inquilino  +  '&idinqu=' + json.Items[0][i].id_inqu  +'"><i class="fa fa-exclamation-circle"></i></a>';
                                 html += '<a title="PDF" href="app/documentos/avcobro.pdf"  data-field-id="'  + json.Items[0][i].id_aviso + '" target="_blank"><i class="fa fa-file-pdf-o" alt=“PDF” ></i></a>';
                                 html += '<a title="Enviar notificación"  data-field-id="'  + json.Items[0][i].id_aviso + '"><i class="fa fa-envelope-open-o " alt=“email”></i></a>';
                                
                                
                                 html += '</div>'
                                 tr.append("<td>" + html + "</td>");
                                 $('#datosAvisoCobro').append(tr);
                             //}
                         }
                 
                     } else {
 
                     var tr;
                     tr = $('<tr/>');
                     tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                     $('#datosAvisoCobro').append(tr);
 
                     }
 

                   /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#datosAvisoCobro");
                    */

                    $('#datosAvisoCobro').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
 
             
                } 
                /************************************************ */
              
 
        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });
 
 //});
 
 
 }

$(document).ready(function() {


    inicio();



});