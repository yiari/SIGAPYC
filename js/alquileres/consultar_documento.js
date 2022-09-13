function inicio(){

    cargarDocumentosa();


}




function cargarDocumentosa(){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
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
                            
                           
                            tr.append("<td>" + json.Items[0][i].propietario + "</td>");
                            tr.append("<td>" + json.Items[0][i].documento + "</td>");
                            tr.append("<td>" + json.Items[0][i].ver + "</td>");

                            var html="";
                            
                            html += '<a title="Ver"  href="inicio.php?url=app/vistas/alquileres/documentos&idpro=' + json.Items[0][i].id_prop  + '&codpro=' + json.Items[0][i].codigo  + '&codtip=' + json.Items[0][i].tipo  + '"><i class="fa fa-book"></i></a>&nbsp;';
                            html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datosinquidatosDocumentoslinos').append(tr);
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


$(document).ready(function() {


    inicio();



});