
function inicio(){

    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */

    $('#tip_apod').val(getParameterByName('codtipo'));


   let idPropietario = getParameterByName('idpro');
   let prmCodPro = getParameterByName('codpro');

   let idApoderado = getParameterByName('idapod');

 
    /*--------------------------------------*/    

    codigoPropietario(prmCodPro);

    cargarApoderado(idPropietario,idApoderado);

    nuevoApoderado(idPropietario,prmCodPro);

}

function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}

function nuevoApoderado(prmIdPro, prmCodPro){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        html='index.php?url=app/vistas/alquileres/ingresar_apoderado&idpro=' + prmIdPro  + '&codpro=' + prmCodPro;
    
        $(".codpro").prop("href", html);


    //}

}

function cargarApoderado(prmDato){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    formData.append('id_prop',prmDato);
    formData.append('id_apod',prmDato);
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistroapoderados.php",
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
*/
       // console.log("Items: " + json.Items.length);

/*
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
                        
                                console.log("valor recorrido: " + i);


                            // if (isEmpty(json.Items[0][i]) == false) {
                                    tr = $('<tr/>');
                                    
                                
                                    tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                                    tr.append("<td>" + json.Items[0][i].nombre_poder + "</td>");
                                    tr.append("<td>" + fecha(json.Items[0][i].fecha_poder,'YYYYMMDD','DD/MM/YYYY') + "</td>");
                                    tr.append("<td>" + json.Items[0][i].telefono + "</td>");
                                    tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                                    
                                    var html="";
                                    var htmlapoderado = "";

                                    html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                                    htmlapoderado='<a title="Editar Apoderado" href="index.php?url=app/vistas/alquileres/editar_apoderado&idapod=' + json.Items[0][i].id_apod  + '&codapod=' + json.Items[0][i].codigo  + '&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].cod_prop  + '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';
                                    html += htmlapoderado;
                                    html += '<a title="Documento" href="index.php?url=app/vistas/alquileres/documentosapoderado&idapod=' + json.Items[0][i].id_apod  + '&codapod=' + json.Items[0][i].codigo  +  '&codtipo=' + json.Items[0][i].tip_apod  + '&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].cod_prop  + '"><i class="fa fa-address-card-o"></i></a>&nbsp;';
                                    html += '<a title="eliminar"  data-field-id="'  + json.Items[0][i].id_apod + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
                                    html += '</div>'
                                    tr.append("<td>" + html + "</td>");
                                    $('#datosApoderados').append(tr);
                                //}
                            }
                    
                        } else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosApoderados').append(tr);

                        }




                    new simpleDatatables.DataTable("#datosApoderados");

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