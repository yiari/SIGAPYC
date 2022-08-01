
function inicio(){


     /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    let idInquilino = getParameterByName('idinq');
    let prmCodInq = getParameterByName('codinq');
    /*--------------------------------------*/    

    codigoPropietario(prmCodInq);

    cargarPagador(idInquilino);

    nuevoBeneficiario(idInquilino,prmCodInq);





}


function codigoInquilino(prmDato){

    var html = "";

    html='<strong>INQUILINO : </strong>'  + prmDato +'</span>';

    $("#lblinquilino").html('');
    $("#lblinquilino").html(html);

}

function nuevoPagador(prmIdInq, prmCodInq){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        html='index.php?url=app/vistas/alquileres/ingresar_pagador&idinq=' + prmIdInq  + '&codinq=' + prmCodInq;
    
        $(".codinq").prop("href", html);


    //}

}



function cargarPagador(prmDato){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    formData.append('id_inq',prmDato);
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistropagador.php",
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
                            
                           
                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].nombre + "</td>");
                            tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                            tr.append("<td>" + json.Items[0][i].telefono + "</td>");
                            tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                            
                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                            html += '<a href="javascript:void(0);" onclick="cargarPantalla(' + json.Items[0][i].id_paga + ')" title="Editar"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';
                            html += '<a title="Ver" data-field-id_paga="' + json.Items[0][i].id_paga + '"><i class="fa fa-search" alt=“Ver”></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id_paga="'  + json.Items[0][i].id_paga + '"><i class="fa fa-trash" alt=“Eliminar”></i></a>';
                            
                           
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosPagador').append(tr);
                        //}
                    }
                    
                } else {

                var tr;
                tr = $('<tr/>');
                tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                $('#datosPagador').append(tr);

                }

                 new simpleDatatables.DataTable("#datosPagador");

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