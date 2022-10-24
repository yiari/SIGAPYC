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
    let prmTipoApod = 1;
    
    

    codigoApoderado(prmCodapode)
    documentoApoderado(idapoderado,prmCodapode,prmTipoApod);



    let idrepresentante = getParameterByName('idrepr');
    let prmCodrepr = getParameterByName('codrepre');
    let prmTipoRepr = 2;


    documentoRepresentante(idrepresentante,prmCodrepr,prmTipoRepr);
    codigoRepresentante(prmCodrepr);

    let idpagador  = getParameterByName('idpaga');
    let prmCodPaga = getParameterByName('codpaga');
    let prmTipoPaga = getParameterByName('codtip');

    codigopPagador(prmCodPaga);
    documentoPagador(idpagador,prmCodPaga,prmTipoPaga);


    let idinmueble  = getParameterByName('idinmu');
    let prmCodInmu = getParameterByName('codinmu');
    let prmTipoInmu = 1;

    codigopInmuebles(prmCodInmu);
    documentoInmueble(idinmueble,prmCodInmu,prmTipoInmu);


    let idunidad  = getParameterByName('idunid');
    let prmCodUnid = getParameterByName('codunid');
    let prmTipoUnid = 1;

    atrasInmuebles(idPropietario,prmCodPro,tipo_propietario,idInmueble,codigoInmueble);
    codigopUnidad(prmCodUnid);
    documentoUnidad(idunidad,prmCodUnid,prmTipoUnid)

    

}

function atrasInmuebles(prmIdPro,prmCodPro,prmTipo,prmIdInmu,prmCodInmu){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/inmuebles&idpro=' + prmIdPro  + '&codpro=' + prmCodPro  + '&codtip=' + prmTipo + '&idinmu=' + prmIdInmu + '&codinmu=' + prmCodInmu;
    
        $(".codpro").prop("href", html);


    //}

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
    

    $("#lblInmueble").html('');
    $("#lblInmueble").html(html);



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


function codigoRepresentante(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>REPRESENTANTE : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblRepresentante").html('');
    $("#lblRepresentante").html(html);



}

function codigopPagador(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>PAGADOR : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblPagador").html('');
    $("#lblPagador").html(html);



}

function codigopInmuebles(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>INMUEBLE : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblInmueble").html('');
    $("#lblInmueble").html(html);



}


function codigopUnidad(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>UNIDAD : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblUnidad").html('');
    $("#lblUnidad").html(html);



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

                   
                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#datosDocumentos");

                    */

                    $('#datosDocumentos').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
               
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

                   
                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                     new simpleDatatables.DataTable("#DocumentosInquilinos");

                    */

                    $('#DocumentosInquilinos').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
               
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

                   
                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                      new simpleDatatables.DataTable("#Documentosbeneficiario");

                    */

                     $('#Documentosbeneficiario').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
               
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

                    

                     /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                      new simpleDatatables.DataTable("#DocumentosApoderados");

                    */

                      $('#DocumentosApoderados').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
               
                }   

        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}




function documentoRepresentante(idrepresentante,prmCodrepr,prmTipoRepr){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','DR');
    formData.append('id_repr',idrepresentante);
    formData.append('tipo_representante',prmTipoRepr);

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
                            $('#DocumentosRepresentante').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#DocumentosRepresentante').append(tr);

                    }

                    
                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#DocumentosRepresentante");
                    */

                    $('#DocumentosRepresentante').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
               
                }   

        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}




function documentoPagador(idpagador,prmCodPaga,prmTipoPaga){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','DP');
    formData.append('id_paga',idpagador);
    formData.append('tipo_pagador',prmTipoPaga);

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
                            $('#datosPagador').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#datosPagador').append(tr);

                    }

                    
                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                     new simpleDatatables.DataTable("#datosPagador");
                    */

                    $('#datosPagador').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
               
                }   

        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}



function documentoInmueble(idinmueble,prmCodInmu,prmTipoInmu){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','DIN');
    formData.append('id_inmu',idinmueble);
    formData.append('tipo_inmueble',prmTipoInmu);

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
                            $('#datosInmueble').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#datosInmueble').append(tr);

                    }

                   

                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                     new simpleDatatables.DataTable("#datosInmueble");
                    */

                    $('#datosInmueble').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );
               
                }   

        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}




function documentoUnidad(idUnidad,prmCodUnid,prmTipoUnid){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','DU');
    formData.append('id_unid',idUnidad);
    formData.append('tipo_unidad',prmTipoUnid);

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
                            $('#datosUnidad').append(tr);
                        //}
                    }

                } else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#datosInmueble').append(tr);

                    }

                    

                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#datosInmueble");
                    */

                    $('#datosInmueble').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );

                    
               
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