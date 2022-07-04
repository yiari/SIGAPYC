function inicio(){

    $("#registrarusuario").on('submit', function(evt) {

        /*
        |-----------------------------------------------
        | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
        |-----------------------------------------------
        */
        evt.preventDefault();
        /**********************************************/        
        /*
        |-----------------------------------------------
        | LIMPIA EL CAMPO MENSAJE 
        |-----------------------------------------------
        */
        $("#error").html("Ejecutando...");
        /*
        |-----------------------------------------------
        | AQUI SE CAPTURA LOS DATOS DEL FORMULARIO 
        |-----------------------------------------------
        */
        var formData = new FormData(this);
        /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        formData.append('opcion','I');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/admin/hndregistrousuarios.php",
            type: "POST",
            data: formData, //new FormData(this),
            contentType: false,
            dataType: "json",
            cache: false,
            processData: false,
            beforeSend: function () {
                //$("#preview").fadeOut();
                $("#error").fadeOut();
            },
            success: function (data) {
            var json = data;
            var html = "";

                if(json.error == 0){
                    
                    html = '<div class="alert alert-success" role="alert">' + json.mensaje + '</div>';
                    $("#mensaje").html(html).fadeIn();

                    $("#error").html(json.mensaje).fadeIn();
                }else {

                    html = '<div class="alert alert-danger" role="alert">' + json.mensaje + '</div>';
                    $("#mensaje").html(html).fadeIn();
                }


            /*
            for (var i=0;i<json.length;++i)
            {
                $("#error").html(json[i].mensaje).fadeIn();
               // $('#results').append('<div class="name">'+json[i].name+'</>');
            }
            */

            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });



    });


}


function cargarUsuarios(){

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
            url: "app/handler/admin/hndregistrousuarios.php",
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

            console.log(json);
            console.log("Este es el Mensaje: " + json.mensaje);
            console.log("Items: " + json.Items.length);
            console.log("Items Resultados: " + json.Items[0].length);

                    /*
                    |------------------------------------------------------
                    | AQUI SE CARGA LA INFORMACION EN LA TABLA
                    |------------------------------------------------------
                    */

                    var tr;
                    for (var i = 0; i < json.length; i++) {
                
                        if (isEmpty(json[i]) == false) {
                            tr = $('<tr/>');
                            
                            tr.append("<td>" + i + "</td>");
                            tr.append("<td>" + json[i].nombre + "</td>");
                            tr.append("<td>" + json[i].apellido + "</td>");
                            tr.append("<td>" + json[i].email + "</td>");
                            tr.append("<td>" + json[i].fecha_creacion + "</td>"); 
                            
                            var html="";
                            html = '<div class="btn-group">';
                            html += '<button class="btn btn-warning" ><i class="fas fa-edit" alt=“editar”></i>&nbsp;Editar</button>';
                            html += '<button class="btn btn-danger"><i class="fas fa-trash" alt=“eliminar”></i>&nbsp;Eliminar</button>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#tblUsuarios').append(tr);
                        }
                    }
                    /************************************************ */


            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });

}

function limpiarTabla() {

    $('#tblUsuarios tbody').children().remove()

}

$(document).ready(function() {


    inicio();

    cargarUsuarios();


});