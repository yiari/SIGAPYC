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
        dataType: "json", //COLOCAR ESTA ETIQUETA EN TODAS LAS TABLAS
        type: 'POST',
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#error").fadeOut();
        },
        success: function (data) {
        var json = data;
        var html = "";

        
        //console.log(strEcho);

        //objRef = jsonRES.Items[0][2].nombre;

        //console.log("Nombre Empresa: " + objRef);

        //objRef = strTest.Items[0][2].nombre;



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

                           
                            if(json.Items[0][i].cedula == undefined){
                                tr.append("<td>N/A</td>");
                            } else {
                                tr.append("<td>" + json.Items[0][i].cedula + "</td>");
                            }
                            
                            
                            tr.append("<td>" + json.Items[0][i].rif + "</td>");
                            tr.append("<td>" + json.Items[0][i].telefonos + "</td>");
                            tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                            tr.append("<td>" + tipoPersona(json.Items[0][i].tipo) + "</td>");
                           
                            
                            var html="";
                            var htmlPropietario = "";
                            var htmlApoderado="";
                            var htmlRepresentante="";

                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                            
                            html += '<a title="Bitacora"  href="inicio.php?url=app/vistas/alquileres/verpropietarios&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '&codtip=' + json.Items[0][i].tipo  + '"><i class="fa fa-book"></i></a>&nbsp;';
                            
                            htmlPropietario='<a title="Editar Propietario" href="index.php?url=app/vistas/alquileres/editar_propietarios&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '&codtip=' + json.Items[0][i].tipo  + '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';
                            html += htmlPropietario;

                            if(json.Items[0][i].tipo == 1){//PERSONA NATUARAL

                                htmlApoderado='<a title="Apoderado" href="index.php?url=app/vistas/alquileres/apoderado&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '&codtip=' + json.Items[0][i].tipo  + '"><i class="fa fa-id-badge"></i></a>&nbsp;';
                                html += htmlApoderado;

                            }else if (json.Items[0][i].tipo == 2){//PERSONA JURIDICA
                            
                                htmlRepresentante='<a title="Representante" href="index.php?url=app/vistas/alquileres/representante&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '"><i class="fa fa-id-badge"></i></a>&nbsp;';
                                html += htmlRepresentante;

                            }

                            html += '<a title= "Beneficiario" href="index.php?url=app/vistas/alquileres/beneficiarios&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  +  '&codtip=' + json.Items[0][i].tipo  +'"><i class="fa fa-user-circle-o"></i></a>&nbsp;';
                            
                            html += '<a title="Inmuebles" href="index.php?url=app/vistas/alquileres/inmuebles&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  +  '&codtip=' + json.Items[0][i].tipo  +'"><i class="fa fa-home"></i></a>&nbsp;';

                             html += '<a title="Documento" href="index.php?url=app/vistas/alquileres/documentos&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  +  '&codtip=' + json.Items[0][i].tipo  +'"><i class="fa fa-address-card-o"></i></a>&nbsp;';
                           
                            html += '<a title="finiquitar"  data-field-id="'  + json.Items[0][i].id_prop + '"><i class="fa fa-user-times" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosPropietarios').append(tr);
                        //}
                    }

                    

                     /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                   new simpleDatatables.DataTable("#datosPropietarios");
                    */

                    $('#datosPropietarios').DataTable(
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



$(document).ready(function() {


    inicio();



});