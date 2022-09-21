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

    codigoPropietario(prmCodPro);
    cargarDocumentosa(idPropietario,prmCodPro,prmTipo);

    let idinquilino = getParameterByName('idinq');
    let prmCodInqui = getParameterByName('codinq');
    let prmTipoInqui = getParameterByName('codtip');

    codigoInquilino(prmCodInqui);
    documentoinquilino(idinquilino,prmCodInqui,prmTipoInqui);

    let idbeneficiario = getParameterByName('idbene');
    let prmCodBene = getParameterByName('codbene');
    let prmTipoBene = getParameterByName('codtip');

    codigoBeneficiario(prmCodBene);
    documentobenficiario(idbeneficiario,prmCodBene,prmTipoBene);



    let idapoderado = getParameterByName('idapod');
    let prmCodapode = getParameterByName('codapod');
    
    

    codigoApoderado(prmCodapode)
    documentoApoderado(idapoderado,prmCodapode);
}


function codigoPropietario(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);



}


function codigoInquilino(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>INQUILINO : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);



}


function codigoBeneficiario(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>BENEFICIARIO : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);



}


function codigoApoderado(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>APODERADO : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);



}




function cargarDocumentosa(idPropietario,codigoPropietario,tipoPropietario){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    formData.append('id_prop',idPropietario);
    formData.append('tipo_propietario',tipoPropietario);

    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrosdocumentos.php",
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
                            
                         
                            tr.append("<td>" + documento(json.Items[0][i].documento) + "</td>");
                           

                            var html="";
                            
                            html += '<a title="Ver"  href="'+ json.Items[0][i].ver + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash fa-5" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosDocumentos').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#datosDocumentos').append(tr);

                    }

                    new simpleDatatables.DataTable("#datosDocumentos");
               
                }   

        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}



function documentoinquilino(idinquilino,prmCodInqui,prmTipoInqui){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','DI');
    formData.append('id_inqui',idinquilino);
    formData.append('tipo_inquilino',prmTipoInqui);

    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrosdocumentos.php",
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
                            
                         
                            tr.append("<td>" + documento(json.Items[0][i].documento) + "</td>");
                           

                            var html="";
                            
                            html += '<a title="Ver"  href="'+ json.Items[0][i].ver + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash fa-5" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#DocumentosInquilinos').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#DocumentosInquilinos').append(tr);

                    }

                    new simpleDatatables.DataTable("#DocumentosInquilinos");
               
                }   

        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}





function documentobenficiario(idbeneficiario,prmCodbene,prmTipoBene){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','DB');
    formData.append('id_bene',idbeneficiario);
    formData.append('tipo_beneficiario',prmTipoBene);

    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrosdocumentos.php",
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
                            
                         
                            tr.append("<td>" + documento(json.Items[0][i].documento) + "</td>");
                           

                            var html="";
                            
                            html += '<a title="Ver"  href="'+ json.Items[0][i].ver + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash fa-5" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#Documentosbeneficiario').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#Documentosbeneficiario').append(tr);

                    }

                    new simpleDatatables.DataTable("#Documentosbeneficiario");
               
                }   

        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}





function documentoApoderado(idapoderado,prmCodapod,prmTipoApod){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','DA');
    formData.append('id_apod',idapoderado);
    formData.append('tipo_apoderado',prmTipoApod);

    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrosdocumentos.php",
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
                            
                         
                            tr.append("<td>" + documento(json.Items[0][i].documento) + "</td>");
                           

                            var html="";
                            
                            html += '<a title="Ver"  href="'+ json.Items[0][i].ver + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash fa-5" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#DocumentosApoderados').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#DocumentosApoderados').append(tr);

                    }

                    new simpleDatatables.DataTable("#DocumentosApoderados");
               
                }   

        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}






$(document).ready(function() {


    inicio();



});