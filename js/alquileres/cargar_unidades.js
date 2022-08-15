
function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    let idInmueble = getParameterByName('idinmu');
    let prmCodInmu = getParameterByName('codinmu');
    let prmCodInmu1 = getParameterByName('codinmu1');


    //let idPropietario = getParameterByName('idpro');
    //let prmCodPro = getParameterByName('codpro');
     /*--------------------------------------*/    
 
    codigoInmueble(prmCodInmu);

    nuevoUnidad(idInmueble,prmCodInmu);
    
    atrasInmueble(idInmueble,prmCodInmu);
 
    cargarUnidades(idInmueble);

}


function codigoInmueble(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>INMUEBLE : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblInmueble").html('');
    $("#lblInmueble").html(html);



}




function nuevoUnidad(prmidInmu, prmCodInmu){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        if(prmidInmu != 0 && prmidInmu != ""){
            html='index.php?url=app/vistas/alquileres/ingresar_unidad_inmueble&idinmu=' + prmidInmu  + '&codinmu=' + prmCodInmu;
            $(".codinmu").prop("href", html);
        }

    //}

}


function atrasInmueble(prmidInmu, prmCodInmu){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/inmuebles&idinmu=' + prmidInmu  + '&codinmu=' + prmCodInmu;
    
        $(".codinmu").prop("href", html);


    //}

}


function cargarUnidades(prmDato){
    
    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    formData.append('id_inmu',prmDato);
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrounidades.php",
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

                            
                            tr.append("<td>" + json.Items[0][i].inmueble + "</td>");

                            tr.append("<td>" + json.Items[0][i].tipo + "</td>"); 
                           
                            tr.append("<td>" + statusinmuebles(json.Items[0][i].estatus) + "</td>");

                            
                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                            html += '<a title="Editar" data-field-id="' + json.Items[0][i].id  + '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';
                            html += '<a title="Ver" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-search" alt=“Ver”></i></a>&nbsp;';
                            html += '<a title="Contrato" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-file-pen"></i></a>&nbsp;';
                            html += '<a title="Bitacora" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-folder-open"></i></a>&nbsp;';
                            html += '<a title="inquilino"  data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-id-badge"></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosUnidad').append(tr);
                        //}
                    }


                    //editarRepresentante();
                    //validareliminarRepresentante();
                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=7 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#datosUnidad').append(tr);

                   }

                new simpleDatatables.DataTable("#datosUnidad");
            
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