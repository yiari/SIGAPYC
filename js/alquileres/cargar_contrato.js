function inicio(){

   
    cargarContrato();

}



function cargarContrato(){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
   
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

                    if(json.Items[0].length > 0){
                        for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                            tr = $('<tr/>');

                            let prmtipopropietario = json.Items[0][i].tipo_prop;
                            let prmtipoinquilino = json.Items[0][i].tipo_inqu;
                            
                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].propietario + "</td>");
                            tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                        

                            if(json.Items[0][i].unidad != null){
                                tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                               }else{
                                tr.append("<td>" + json.Items[0][i].inmuebles + "</td>");
                               }

                            tr.append("<td>" + json.Items[0][i].canon + "</td>"); 
                            tr.append("<td>" + fecha(json.Items[0][i].desde,'YYYYMMDD','DD/MM/YYYY') + "</td>"); 
                            tr.append("<td>" + fecha(json.Items[0][i].hasta,'YYYYMMDD','DD/MM/YYYY') + "</td>"); 
                          
                         
                            
                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                            html += '<a title="Editar" data-field-id="' + json.Items[0][i].id  + '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';

                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                           
                           /* if(prmtipopropietario == 2 && prmtipoinquilino == 1){

                                html += '<a href="app/reportes/repcontrato1.php?id=' + json.Items[0][i].id + '&idpro=' + json.Items[0][i].id_prop + '&codtip=' + json.Items[0][i].tipo_prop + '&idinqui=' + json.Items[0][i].id_inqu + '&codtipinqu=' + json.Items[0][i].tipo_inqu +'" title="Imprimir" target="_blank" ><i class="fa fa-print" alt=“imprimir”></i></a>&nbsp;';
                            } else {
                                html += '<a href="app/reportes/repcontrato.php?id=' + json.Items[0][i].id + '&idpro=' + json.Items[0][i].id_prop + '&codtip=' + json.Items[0][i].tipo_prop + '&idinqui=' + json.Items[0][i].id_inqu + '&codtipinqu=' + json.Items[0][i].tipo_inqu +'" title="Imprimir" target="_blank" ><i class="fa fa-print" alt=“imprimir”></i></a>&nbsp;';
                            }*/

                            html += '<a href="app/reportes/repcontrato.php?id=' + json.Items[0][i].id + '&idpro=' + json.Items[0][i].id_prop + '&codtip=' + json.Items[0][i].tipo_prop + '&idinqui=' + json.Items[0][i].id_inqu + '&codtipinqu=' + json.Items[0][i].tipo_inqu +'" title="Imprimir" target="_blank" ><i class="fa fa-print" alt=“imprimir”></i></a>&nbsp;';
                           
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i></a>&nbsp;';
                            
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosContrato').append(tr);
                        //}
                    }
                    }else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosContrato').append(tr);

                        }

                    

                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                        new simpleDatatables.DataTable("#datosContrato");
                    */

                    $('#datosContrato').DataTable(
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

}

function imprimirReporte(){

    console.log("aqui imrpimo el reporte");




}


$(document).ready(function() {


    inicio();



});