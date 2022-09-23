
function inicio(){


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
   let idPropietario = getParameterByName('idpro');
   let prmCodPro = getParameterByName('codpro');

   let idRepresentante = getParameterByName('idrepr');
    /*--------------------------------------*/    

    codigoPropietario(prmCodPro);

    cargarRepresentante(idPropietario,idRepresentante);

    nuevoRepresentante(idPropietario,prmCodPro);



}


function codigoPropietario(prmDato){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';

    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

}


function nuevoRepresentante(prmIdPro, prmCodPro){

    //if (isEmpty(prmDato) == false ){


        var html = "";

        html='index.php?url=app/vistas/alquileres/ingresar_representante&idpro=' + prmIdPro  + '&codpro=' + prmCodPro;
    
        $(".codpro").prop("href", html);


    //}

}




function cargarRepresentante(prmDato){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    formData.append('id_prop',prmDato);
    formData.append('id_repr',prmDato);
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrorepresentante.php",
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
                                tr.append("<td>" + json.Items[0][i].nombre + "</td>");
                                tr.append("<td>" + json.Items[0][i].cedula + "</td>");
                                tr.append("<td>" + json.Items[0][i].telefono + "</td>");
                                tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                               
                               
                                
                                var html="";
                                var htmlrepresentante = "";
    
                                html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                                htmlrepresentante='<a title="Editar Representante" href="index.php?url=app/vistas/alquileres/editar_representante&idrepr=' + json.Items[0][i].id_repr  + '&codrepre=' + json.Items[0][i].codigo  +  '&idpro=' + json.Items[0][i].id_prop  +  '&codpro=' + json.Items[0][i].cod_prop  + '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';
                                html += htmlrepresentante;
                                html += '<a title="Documento" href="index.php?url=app/vistas/alquileres/documentosrepresentante&idrepr=' + json.Items[0][i].id_repr  + '&codrepre=' + json.Items[0][i].codigo  +  '&idpro=' + json.Items[0][i].id_prop  +  '&codpro=' + json.Items[0][i].cod_prop  +  '"><i class="fa fa-address-card-o"></i></a>&nbsp;';
                                html += '<a title="eliminar"  data-field-id="'  + json.Items[0][i].id_repr + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
                                html += '</div>'
                                tr.append("<td>" + html + "</td>");
                                $('#datosRepresentante').append(tr);
                                //}
                            }
                    
                        } else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosRepresentante').append(tr);

                        }




                    new simpleDatatables.DataTable("#datosRepresentante");

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