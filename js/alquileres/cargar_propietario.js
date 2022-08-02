function inicio(){

    cargarPropietarios();


}


function cargarPropietarios(){

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
        url: "app/handler/alquileres/hndregispropietarios.php",
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
                    for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                            tr = $('<tr/>');
                            
                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].nombre + "</td>");
                            tr.append("<td>" + json.Items[0][i].cedula + "</td>");
                            tr.append("<td>" + json.Items[0][i].telefonos + "</td>");
                            tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                            tr.append("<td>" + tipoPersona(json.Items[0][i].tipo) + "</td>");
                           
                            
                            var html="";
                            var htmlApoderado="";
                            var htmlRepresentante="";

                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                            html += '<a title="Ver" data-field-id="' + json.Items[0][i].id_prop + '"><i class="fa fa-search" alt=“Ver”></i></a>&nbsp;'
                            html += '<a title="Editar" data-field-id="' + json.Items[0][i].id_prop  + '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';
                            html += '<a title="Bitacora" data-field-id="' + json.Items[0][i].id_prop + '"><i class="fa fa-book"></i></a>&nbsp;';
                            
                            if(json.Items[0][i].tipo == 1){//PERSONA NATUARAL

                                htmlApoderado='<a title="Apoderado" href="index.php?url=app/vistas/alquileres/apoderado&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '"><i class="fa fa-id-badge"></i></a>&nbsp;';
                                html += htmlApoderado;

                            }else if (json.Items[0][i].tipo == 2){//PERSONA JURIDICA
                            
                                htmlRepresentante='<a title="Representante" href="index.php?url=app/vistas/alquileres/representante&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '"><i class="fa fa-id-badge"></i></a>&nbsp;';
                                html += htmlRepresentante;

                            }

                            html += '<a title= "Beneficiario" href="index.php?url=app/vistas/alquileres/beneficiarios&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '"><i class="fa fa-user-circle-o"></i></a>&nbsp;';
                            
                            html += '<a title="Inmuebles" href="index.php?url=app/vistas/alquileres/inmuebles&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '"><i class="fa fa-home"></i></a>&nbsp;';
                           
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id_prop + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosPropietarios').append(tr);
                        //}
                    }

                    new simpleDatatables.DataTable("#datosPropietarios");

                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}



$(document).ready(function() {


    inicio();



});