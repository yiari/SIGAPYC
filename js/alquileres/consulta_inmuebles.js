
function inicio(){

    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    let idPropietario = getParameterByName('idpro');
    let prmCodPro = getParameterByName('codpro');
    let prmTipo = getParameterByName('codtip');

    let idInmueble = getParameterByName('idinmu');
    let prmCodInmu = getParameterByName('codinmu');
     /*--------------------------------------*/    
 
   
    cargarInmueble(idPropietario,idInmueble,prmTipo,prmCodInmu);



}




function cargarInmueble(idPropietario,idInmueble,prmTipo,prmCodInmu){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','CB');
    formData.append('id_prop',idPropietario);
    formData.append('tipo_propietario',prmTipo);
    formData.append('id_inmu',idInmueble);
    formData.append('cod_inmueble',prmCodInmu);
 
 
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistroinmueble.php",
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
                            for (var i = 0; i < json.Items[0].length; i++) {
                        
                            // if (isEmpty(json.Items[0][i]) == false) {
                                    tr = $('<tr/>');

                                    
                                    let prmFoto = json.Items[0][i].foto;
                                    let prmInquilino = json.Items[0][i].inquilino;
                                   
                                   
                                    var htmlunidades="";

                                    console.log(prmFoto);
                                    console.log(prmInquilino);
                                    console.log(htmlunidades);
                                
                                   
                                    
                                    if(prmFoto == undefined){
                                        tr.append("<td style='text-align:center'>"+ '<img src="./app/iconos/sinfoto01.png" alt="sin foto" style="width:120px;height:120px;"></img>' + "</td>");
                                    } else {
                                        tr.append("<td>" + json.Items[0][i].foto + "</td>");
                                    }
                                    
                                    tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                                    /*tr.append("<td>" + json.Items[0][i].propietario + "</td>");*/
                                    
                                    if(prmInquilino == undefined){
                                        tr.append("<td>SIN INQUILINO</td>");
                                    } else {
                                        tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                                    }

                                    tr.append("<td>" + json.Items[0][i].tipo + "</td>"); 
                             
                                    tr.append("<td>" + statusinmuebles(json.Items[0][i].estatus) + "</td>");
                                    
                                    var html="";
     
                                    html += '</div>'
                                    tr.append("<td>" + html + "</td>");
                                    $('#datosInmuebles').append(tr);
                                //}
                            }
                    } else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=7 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosInmuebles').append(tr);

                       }

                    
                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                   new simpleDatatables.DataTable("#datosInmuebles");
                    */

                    $('#datosInmuebles').DataTable(
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


function limpiarTabla() {

    $('#datatablesSimple tbody').children().remove();

}



$(document).ready(function() {


    inicio();
    
    
    
    });