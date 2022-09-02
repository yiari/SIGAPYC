
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
 
    codigoPropietario(prmCodPro);
    
    nuevoInmueble(idPropietario,prmCodPro,prmTipo);

    cargarInmueble(idPropietario,idInmueble,prmTipo,prmCodInmu);

    cargarInmuebletodo(idPropietario,idInmueble,prmTipo,prmCodInmu);

}

function codigoPropietario(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);



}

function nuevoInmueble(prmIdPro, prmCodPro, prmTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        if(prmIdPro != 0 && prmIdPro != ""){
            html='index.php?url=app/vistas/alquileres/ingresar_inmueble&idpro=' + prmIdPro  + '&codpro=' + prmCodPro + '&codtip=' + prmTipo;
            $(".codpro").prop("href", html);
        }

    //}

}

function cargarInmueble(idPropietario,idInmueble,prmTipo,prmCodInmu){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
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
        type: 'POST',
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#error").fadeOut();
        },
        success: function (data,status,xhr) {
        var json = data;

        /*
        |-----------------------------------------------------------
        | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
        | EL RESULTADO SE CONVIERTE A JSON
        |-----------------------------------------------------------
        */

        var respuestaHeader = xhr.getResponseHeader("Content-Type");
        var verificarHeader = respuestaHeader.search('text/html')

        if(verificarHeader >= 0){
            json = JSON.parse(json);
        } 

        /*---------------------------------------------------------*/


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
                                    html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';

                                    html += '<a title="Bitacora" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-book"></i></a>&nbsp;';

                                    html += '<a title="Editar" href="index.php?url=app/vistas/alquileres/editar_inmueble&idinmu=' + json.Items[0][i].id_inmu   + '&codinmu=' + json.Items[0][i].codigo  +  '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';


                                    if(json.Items[0][i].tieneunidades > 0){
                                        html += '<a title="Unidades_inmueble"  href="index.php?url=app/vistas/alquileres/unidades&idinmu=' + json.Items[0][i].id_inmu   + '&codinmu=' + json.Items[0][i].codigo  +'"><i class="fa fa-home"></i></a>&nbsp;';
                                    } else {
                                        html += '<a href="javascript:void" class="link_apagado"><i class="fa fa-home"></i></a>&nbsp;';
                                    }

                                    if(json.Items[0][i].posee_beneficiario == 2 || json.Items[0][i].posee_beneficiario == 0 ){
                                        html += '<a href="javascript:void" class="link_apagado"><i class="fa fa-users"></i></a>&nbsp;';
                                    } else if (json.Items[0][i].posee_beneficiario == 1)  {
                                        html += '<a title="Beneficiario"  href="index.php?url=app/vistas/alquileres/inmueble_beneficiario&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].propietario + '&codtip=' + json.Items[0][i].tipo_propietario + '&idinmu=' + json.Items[0][i].id_inmu  + '&codinmu=' + json.Items[0][i].codigo  + '"><i class="fa fa-users"></i></a>&nbsp;';
                                    }
                                    
                                   
                                    /*html += '<a title="inquilino"  href="index.php?url=app/vistas/alquileres/asignar_inquilino&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].propietario  + '"><i class="fa fa-user-circle-o"></i></a>&nbsp;';*/
                                    
                                    html += '<a title="Mandato y Contratos"  href="index.php?url=app/vistas/alquileres/contratos_mandatos&idinmu=' + json.Items[0][i].id_inmu   + '&codinmu=' + json.Items[0][i].codigo  + '"><i class="fa fa-file-text-o"></i></a>&nbsp;';
                                   
                                    html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
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

                    new simpleDatatables.DataTable("#datosInmuebles");

                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}






function cargarInmuebletodo(idPropietario,idInmueble,prmTipo,prmCodInmu){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
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
        type: 'POST',
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#error").fadeOut();
        },
        success: function (data,status,xhr) {
        var json = data  ; //JSON.parse(data)

        /*
        |-----------------------------------------------------------
        | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
        | EL RESULTADO SE CONVIERTE A JSON
        |-----------------------------------------------------------
        */

        var respuestaHeader = xhr.getResponseHeader("Content-Type");
        var verificarHeader = respuestaHeader.search('text/html')

        if(verificarHeader >= 0){
            json = JSON.parse(json);
        } 

        /*---------------------------------------------------------*/


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
                                    tr.append("<td>" + json.Items[0][i].propietario + "</td>");
                                    
                                    if(prmInquilino == undefined){
                                        tr.append("<td>SIN INQUILINO</td>");
                                    } else {
                                        tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                                    }

                                    tr.append("<td>" + json.Items[0][i].tipo + "</td>"); 
                             
                                    tr.append("<td>" + statusinmuebles(json.Items[0][i].estatus) + "</td>");
                                    
                                    var html="";
                                    html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                                    
                                    html += '<a title="Bitacora" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-book"></i></a>&nbsp;';
                                    /*/
                                    html += '<a title="Editar" href="index.php?url=app/vistas/alquileres/editar_inmueble&idinmu=' + json.Items[0][i].id_inmu   + '&codinmu=' + json.Items[0][i].codigo  +  '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';


                                    if(json.Items[0][i].tieneunidades > 0){
                                        html += '<a title="Unidades_inmueble"  href="index.php?url=app/vistas/alquileres/unidades&idinmu=' + json.Items[0][i].id_inmu   + '&codinmu=' + json.Items[0][i].codigo  +'"><i class="fa fa-home"></i></a>&nbsp;';
                                    } else {
                                        html += '<a href="javascript:void" class="link_apagado"><i class="fa fa-home"></i></a>&nbsp;';
                                    }

                                    if(json.Items[0][i].posee_beneficiario == 2 || json.Items[0][i].posee_beneficiario == 0 ){
                                        html += '<a href="javascript:void" class="link_apagado"><i class="fa fa-users"></i></a>&nbsp;';
                                    } else if (json.Items[0][i].posee_beneficiario == 1)  {
                                        html += '<a title="Beneficiario"  href="index.php?url=app/vistas/alquileres/inmueble_beneficiario&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].propietario + '&codtip=' + json.Items[0][i].tipo_propietario + '&idinmu=' + json.Items[0][i].id_inmu  + '&codinmu=' + json.Items[0][i].codigo  + '"><i class="fa fa-users"></i></a>&nbsp;';
                                    }
                                    */
                                   
                                    /*html += '<a title="inquilino"  href="index.php?url=app/vistas/alquileres/asignar_inquilino&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].propietario  + '"><i class="fa fa-user-circle-o"></i></a>&nbsp;';*/
                                    
                                    html += '<a title="Mandato y Contratos"  href="index.php?url=app/vistas/alquileres/contratos_mandatos&idinmu=' + json.Items[0][i].id_inmu   + '&codinmu=' + json.Items[0][i].codigo  + '"><i class="fa fa-file-text-o"></i></a>&nbsp;';
                                   
                                    html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
                                    html += '</div>'
                                    tr.append("<td>" + html + "</td>");
                                    $('#datosInmueblesTodo').append(tr);
                                //}
                            }
                    } else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=7 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosInmueblesTodo').append(tr);

                       }

                    new simpleDatatables.DataTable("#datosInmueblesTodo");

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