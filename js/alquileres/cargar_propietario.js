function inicio(){

  


}


function cargarPropietarios(){

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
        url: "app/handler/alquileres/hndregispropietario.php",
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
                    for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                            tr = $('<tr/>');
                            
                            tr.append("<td>" + (i+1) + "</td>");
                            tr.append("<td>" + json.Items[0][i].cod_prop + "</td>");
                            tr.append("<td>" + json.Items[0][i].mon_prop + "</td>");
                            tr.append("<td>" + json.Items[0][i].cedula_prop + "</td>");
                            tr.append("<td>" + json.Items[0][i].correo_prop + "</td>");
                            tr.append("<td>" + json.Items[0][i].telefono_prop + "</td>"); 
                            
                            
                            
                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;';
                            html +=  '<a href="#" title="Editar" data-field-id="' + json.Items[0][i].id + '" data-field-nombre="' + json.Items[0][i].nombre + '" data-field-apellido="'+ json.Items[0][i].apellido + '" data-field-usuario="'+ json.Items[0][i].usuario + '" data-field-email="' + json.Items[0][i].email +  '"><i class="fas fa-edit"></i></a> &nbsp;'
                            html += '<button class="btn btn-warning edit" data-field-id="' + json.Items[0][i].id + '" data-field-nombre="' + json.Items[0][i].nombre + '" data-field-apellido="'+ json.Items[0][i].apellido + '" data-field-usuario="'+ json.Items[0][i].usuario + '" data-field-email="' + json.Items[0][i].email +  '"><i class="fas fa-edit" alt=“editar”></i>&nbsp;Editar</button>';
                            html +=  ''
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#tblPropietarios').append(tr);
                        //}
                    }


                   // editarUsuario();
                   // validareliminarUsuario();
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