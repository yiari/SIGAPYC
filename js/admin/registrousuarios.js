function inicio(){

    guardarUsuario();
    cargarUsuarios();

    limpiarCampos();

}


function guardarUsuario(){

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
                    limpiarCampos();
                    limpiarTabla();
                    botones(0);
                    cargarUsuarios();

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
            console.log("Email Resultados: " + json.Items[0][1].email);

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
                                tr.append("<td>" + json.Items[0][i].nombre + "</td>");
                                tr.append("<td>" + json.Items[0][i].apellido + "</td>");
                                tr.append("<td>" + json.Items[0][i].email + "</td>");
                                tr.append("<td>" + json.Items[0][i].fecha_creacion + "</td>"); 
                                
                                var html="";
                                html = '<div class="btn-group">';
                                html += '<button class="btn btn-warning edit" data-field-id="' + json.Items[0][i].id + '" data-field-nombre="' + json.Items[0][i].nombre + '" data-field-apellido="'+ json.Items[0][i].apellido + '" data-field-usuario="'+ json.Items[0][i].usuario + '" data-field-email="' + json.Items[0][i].email +  '"><i class="fas fa-edit" alt=“editar”></i>&nbsp;Editar</button>';
                                html += '<button class="btn btn-danger"><i class="fas fa-trash" alt=“eliminar”></i>&nbsp;Eliminar</button>';
                                html += '</div>'
                                tr.append("<td>" + html + "</td>");
                                $('#tblUsuarios').append(tr);
                            //}
                        }


                        editarUsuario();
                        
                    }
                    /************************************************ */


            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });

}

function limpiarTabla() {

    $('#tblUsuarios tbody').children().remove();

}

function limpiarCampos(){

        $("#hidUsuario").val("");
        $("#registroNombre").val("");
        $("#registroApellido").val("");
        $("#registroUsuario").val("");
        $("#registroEmail").val("");
        $("#registroContrasena").val("");

}

function botones(opcion){

if(opcion == 1){

    $(".cancelar").show();

} else {
    
    $(".cancelar").hide();

}

}

function editarUsuario(){

    $(".edit").click(function() {

        var prmId = $(this).data('field-id');
        var prmNombre = $(this).data('field-nombre');
        var prmApellido = $(this).data('field-apellido');
        var prmUsuario = $(this).data('field-usuario');
        var prmEmail = $(this).data('field-email');

        $("#hidUsuario").val(prmId);
        $("#registroNombre").val(prmNombre);
        $("#registroApellido").val(prmApellido);
        $("#registroUsuario").val(prmUsuario);
        $("#registroEmail").val(prmEmail);

        botones(1);

        cancelarRegistro();
        /*
        var vlEditar = '{{ route("editar-pastor",["id" => "VALOR"]) }}';
        vlEditar = vlEditar.replace('VALOR', vlId);
        */

        //alert("El id del Registro es: " + vlId);
    })


}

function cancelarRegistro(){
    
    $(".cancelar").click(function() {
        limpiarCampos();
        botones(0);

    })
}






$(document).ready(function() {


    inicio();



});