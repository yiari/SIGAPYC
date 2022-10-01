
function inicio(){

    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
   let idPropietario = getParameterByName('idpro');
   let prmCodPro = getParameterByName('codpro');
   let prmTipo = getParameterByName('codtip');


    /*--------------------------------------*/ 
    
    let idbeneficiario = getParameterByName('idbene');

    codigoPropietario(prmCodPro);

    cargarbeneficiarios(idPropietario,prmTipo);

    nuevoBeneficiario(idPropietario,prmCodPro,prmTipo);

  

}

function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}

function nuevoBeneficiario(prmIdPro, prmCodPro, prmTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        html='index.php?url=app/vistas/alquileres/ingresar_beneficiarios&idpro=' + prmIdPro  + '&codpro=' + prmCodPro + '&codtip=' + prmTipo;
    
        $(".codpro").prop("href", html);


    //}

}





function cargarbeneficiarios(prmDato,prmTipo){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    
    formData.append('id_prop',prmDato);
   
    formData.append('tipo',prmTipo);

    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrobeneficiarios.php",
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
                            tr.append("<td>" + json.Items[0][i].cedula+ "</td>");
                            tr.append("<td>" + json.Items[0][i].telefono + "</td>");
                            tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                            tr.append("<td>" + json.Items[0][i].valor + "</td>");
                            tr.append("<td>" + tipoPersona(json.Items[0][i].tipo) + "</td>");
                         
                            
                            var html="";
                            var htmlBeneficiario="";

                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                            html += '<a title="Bitacora" href="index.php?url=app/vistas/alquileres/verbeneficiario&idbene=' + json.Items[0][i].id_bene  + '&codbene=' + json.Items[0][i].codigo  + '&codtipbene=' + json.Items[0][i].tipo +  '&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].propietario + '&codtip=' + json.Items[0][i].tipo_propietario +'"><i class="fa fa-book"></i></a>&nbsp;';
                            htmlBeneficiario='<a title="Editar Beneficiario" href="index.php?url=app/vistas/alquileres/editar_beneficiarios&idbene=' + json.Items[0][i].id_bene  + '&codbene=' + json.Items[0][i].codigo  + '&codtipbene=' + json.Items[0][i].tipo  + '&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].propietario +  '&codtip=' + json.Items[0][i].tipo_propietario +'"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';
                            html += htmlBeneficiario;
                            html += '<a title="Documento" href="index.php?url=app/vistas/alquileres/documentosbeneficiaro&idbene=' + json.Items[0][i].id_bene  + '&codbene=' + json.Items[0][i].codigo  + '&codtipbene=' + json.Items[0][i].tipo  + '&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].propietario +  '&codtip=' + json.Items[0][i].tipo_propietario +'"><i class="fa fa-address-card-o"></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosBeneficiario').append(tr);
                        //}
                    }
                    }else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosBeneficiario').append(tr);

                        }

                    new simpleDatatables.DataTable("#datosBeneficiario");

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