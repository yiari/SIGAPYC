function inicio(){

   /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    let idInmueble = getParameterByName('idinmu');
    let idUnidad = getParameterByName('idunid');


    cargarMandato(idInmueble,idUnidad);
    cargarContratos(idInmueble);

}



function cargarMandato(idInmueble,idUnidad){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    formData.append('id_inmu',idInmueble);
    formData.append('id_unid',idUnidad);
   
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistromandato.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#error").fadeOut();
        },
        success: function (data) {

        var json = (data);
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


                            let prmunidad = json.Items[0][i].unidad;
                            
                            console.log(prmunidad);



                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                            
                            if(prmunidad == null){
                                tr.append("<td>SIN UNIDAD</td>");
                            } else {
                                tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                            }

                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                           
                            html += '<a href="app/reportes/repmandato.php?id_mandato=' + json.Items[0][i].id + '&idinmu=' + json.Items[0][i].id_inmu +  '&idunid=' + json.Items[0][i].id_unid  + '&id_prop=' + json.Items[0][i].id_prop  + '&tipo_prop=' + json.Items[0][i].tipo_prop  +  '" title="Imprimir" target="_blank" ><i class="fa fa-print" alt=“imprimir”></i></a>&nbsp;';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosMandatos').append(tr);
                        //}
                    }
                    }else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosMandatos').append(tr);

                        }

                    
                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#datosMandatos");
                    */

                    $('#datosMandatos').DataTable(
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




function cargarContratos(idInmueble){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','CO');
    formData.append('id_inmu',idInmueble)
   
   
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrocontrato.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        beforeSend: function () {
            //$("#preview").fadeOut();
            $("#error").fadeOut();
        },
        success: function (data) {

        var json = (data);
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

                            let prmunidad = json.Items[0][i].unidad;

                            let prmtipopropietario = json.Items[0][i].tipo_prop;
                            let prmtipoinquilino = json.Items[0][i].tipo_inquilino;
                            
                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].propietario + "</td>");
                            tr.append("<td>" + json.Items[0][i].inmuebles + "</td>");
                            
                            if(prmunidad == null){
                                tr.append("<td>SIN UNIDAD</td>");
                            } else {
                                tr.append("<td>" + json.Items[0][i].unidad + "</td>");
                            }
                           
                            tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                            tr.append("<td>" + json.Items[0][i].canon + "</td>");
                            tr.append("<td>" + fecha(json.Items[0][i].desde,'YYYYMMDD','DD/MM/YYYY') + "</td>"); 
                            tr.append("<td>" + fecha(json.Items[0][i].hasta,'YYYYMMDD','DD/MM/YYYY') + "</td>"); 
                          

                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                           
                            /*if(prmtipopropietario == 2 && prmtipoinquilino == 1){

                                html += '<a href="app/reportes/repcontrato1.php?id=' + json.Items[0][i].id + '&idpro=' + json.Items[0][i].id_prop + '&codtip=' + json.Items[0][i].tipo_prop + '&idinqui=' + json.Items[0][i].id_inqu + '&codtipinqu=' + json.Items[0][i].tipo_inqu +'" title="Imprimir" target="_blank" ><i class="fa fa-print" alt=“imprimir”></i></a>&nbsp;';
                            } else {
                                html += '<a href="app/reportes/repcontrato.php?id=' + json.Items[0][i].id + '&idpro=' + json.Items[0][i].id_prop + '&codtip=' + json.Items[0][i].tipo_prop + '&idinqui=' + json.Items[0][i].id_inqu + '&codtipinqu=' + json.Items[0][i].tipo_inqu +'" title="Imprimir" target="_blank" ><i class="fa fa-print" alt=“imprimir”></i></a>&nbsp;';
                            }*/
                            
                            html += '<a href="app/reportes/repcontrato.php?id=' + json.Items[0][i].id + '&idpro=' + json.Items[0][i].id_prop + '&codtip=' + json.Items[0][i].tipo_prop + '&idinqui=' + json.Items[0][i].id_inqu + '&codtipinqu=' + json.Items[0][i].tipo_inqu +'" title="Imprimir" target="_blank" ><i class="fa fa-print" alt=“imprimir”></i></a>&nbsp;';
                            
                            
                            
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosContratos').append(tr);
                        //}
                    }
                    }else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosContratos').append(tr);

                        }

                    

                    /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#datosContratos");
                    */

                    $('#datosContratos').DataTable(
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