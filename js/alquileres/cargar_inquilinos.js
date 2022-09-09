function inicio(){

    cargarInquilino();
 

}



function cargarInquilino(){

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
        url: "app/handler/alquileres/hndregistroinquilino.php",
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
                            
                           
                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].nombre+ "</td>");
                            tr.append("<td>" + json.Items[0][i].cedula+ "</td>");
                            tr.append("<td>" + json.Items[0][i].telefono + "</td>");
                            tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                            tr.append("<td>" + tipoPersona(json.Items[0][i].tipo) + "</td>");
                            
                            var html="";
                            var htmlInquilino = "";

                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                            html += '<a title="Bitacora" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-folder-open"></i></a>&nbsp;';
                            
                           
                            htmlInquilino='<a title="Editar" href="index.php?url=app/vistas/alquileres/editar_inquilino&idinq=' + json.Items[0][i].id  + '&codinq=' + json.Items[0][i].codigo  + '&codtip=' + json.Items[0][i].tipo  +  '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;' ;
                            html += htmlInquilino;
                           
                            html += '<a title="Contrato" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-file-pen"></i></a>&nbsp;';
                            html += '<a title="Pagador"  href="index.php?url=app/vistas/alquileres/pagador&idinq=' + json.Items[0][i].id  + '&codinq=' + json.Items[0][i].codigo  + '&codtip=' + json.Items[0][i].tipo  +'"><i class="fa fa-id-badge"></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosinquilinos').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#datosinquilinos').append(tr);

                    }

                    new simpleDatatables.DataTable("#datosinquilinos");
               
                }   

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