
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

    let idUnidad = getParameterByName('idunid');
    let prmCodunidad = getParameterByName('codUnidad');
    

    //let idPropietario = getParameterByName('idpro');
    //let prmCodPro = getParameterByName('codpro');
     /*--------------------------------------*/    
 
     codigoInmueble(prmCodInmu);

     cargarUnidades(idInmueble,prmCodInmu,idUnidad,prmCodunidad);

    nuevoUnidad(idInmueble, prmCodInmu,idPropietario,prmCodPro,prmTipo);
    
    atrasInmueble(idInmueble,prmCodInmu,idPropietario,prmCodPro,prmTipo);
 
   

}


function codigoInmueble(prmDato){

    var html = "";

    
    if(prmDato != 0 && prmDato != ""){
        html='<strong>INMUEBLE : </strong>'  + prmDato +'</span>';
    }
    

    $("#lblInmueble").html('');
    $("#lblInmueble").html(html);



}


function nuevoUnidad(prmidInmu,prmCodInmu,idPropietario,prmCodPro,prmTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        if(prmidInmu != 0 && prmidInmu != ""){
            html='index.php?url=app/vistas/alquileres/ingresar_unidad_inmueble&idinmu=' + prmidInmu  + '&codinmu=' + prmCodInmu  + '&idpro=' + idPropietario + '&codpro=' + prmCodPro + '&codtip=' + prmTipo;
            $(".codpro").prop("href", html);
        }

    //}

}







function atrasInmueble(prmidInmu, prmCodInmu,idPropietario,prmCodPro,prmTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/inmuebles&idinmu=' + prmidInmu  + '&codinmu=' + prmCodInmu  + '&idpro=' + idPropietario + '&codpro=' + prmCodPro + '&codtip=' + prmTipo;
    
        $(".codinmu").prop("href", html);


    //}

}


function cargarUnidades(idInmueble,prmCodInmu,prmIdUnidad,prmCodUnidad){
    
    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
 
    formData.append('id_inmu',idInmueble);
    formData.append('cod_inmueble',prmCodInmu);
    formData.append('id_unid',prmIdUnidad);
    formData.append('cod_unid',prmCodUnidad);
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
        var json =data;
        

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
                                tr.append('<td style="text-align:center"><img src= "'+  json.Items[0][i].foto + '" style="width:120px;height:120px;"></img></td>');
                            }

                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            

                            tr.append("<td>SIN INQUILINO</td>");


                            tr.append("<td>" + statusinmuebles(json.Items[0][i].estatus) + "</td>");

                            tr.append("<td>" + json.Items[0][i].tipo + "</td>"); 
                            
                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                            html += '<a title="Bitacora" data-field-id="' + json.Items[0][i].id_unid + '"><i class="fa fa-book"></i></a>&nbsp;';
                           
                            html += '<a title="Editar" href="index.php?url=app/vistas/alquileres/editar_unidad_inmueble&idunid=' + json.Items[0][i].id_unid  +  '&codUnidad=' + json.Items[0][i].codigo  +  '&idinmu=' + json.Items[0][i].id_inmu +  '&codinmu=' + json.Items[0][i].codigo + '&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].propietario + '&codtip=' + json.Items[0][i].tipo_propietario +'"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';

                            
                            if(json.Items[0][i].posee_beneficiario == 2 || json.Items[0][i].posee_beneficiario == 0 ){
                                html += '<a href="javascript:void" class="link_apagado"><i class="fa fa-users"></i></a>&nbsp;';
                            } else if (json.Items[0][i].posee_beneficiario == 1)  {
                                html += '<a title="Beneficiario"  href="index.php?url=app/vistas/alquileres/inmueble_beneficiario&idunid=' + json.Items[0][i].id_unid + '&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codpro + '&codtip=' + json.Items[0][i].tipo_propietario + '&idinmu=' + json.Items[0][i].id_inmu  + '&codinmu=' + json.Items[0][i].codigo  + '"><i class="fa fa-users"></i></a>&nbsp;';
                            }

                            html += '<a title="Mandato y Contratos"  href="index.php?url=app/vistas/alquileres/contratos_mandatos&idunid=' + json.Items[0][i].id_unid + '&codUnidad=' + json.Items[0][i].codigo  +'&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codpro + '&codtip=' + json.Items[0][i].tipo_propietario + '&idinmu=' + json.Items[0][i].id_inmu  + '&codinmu=' + json.Items[0][i].inmueble  +  '"><i class="fa fa-file-text-o"></i></a>&nbsp;';
                            
                            html += '<a title="Documento" href="index.php?url=app/vistas/alquileres/documentosunidades&idunid=' + json.Items[0][i].id_unid + '&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codpro + '&codtip=' + json.Items[0][i].tipo_propietario + '&idinmu=' + json.Items[0][i].id_inmu  + '&codinmu=' + json.Items[0][i].codigo  + '"><i class="fa fa-address-card-o"></i></a>&nbsp;';
                            
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

               
                   /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#datosUnidad");
                    */

                    $('#datosUnidad').DataTable(
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