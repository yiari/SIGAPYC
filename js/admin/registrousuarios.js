function inicio(){

    guardarUsuario();
    cargarRoles();
    cargarUsuarios();
    
    limpiarCampos();


    jQuery("#registroNombre").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroApellido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });



}

function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


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

        if ($("#cboRoles").val() == "") {
            mensaje("Debe seleccionar el rol del usuario",1);
            return;
        }

        if ($("#registroNombre").val() == "") {
            mensaje("Debe indicar el nombre del usuario",1);
            return;
        }
    
        if ($("#registroApellido").val() == "") {
            mensaje("Debe indicar el apellido del usuario",1);
            return;
        }
    
        if ($("#registroUsuario").val() == "") {
            mensaje("Debe indicar el usuario del sistema",1);
            return;
        }
    
        if ($("#registroEmail").val() == "") {
            mensaje("Debe indicar una direccion de correo valida",1);
            return;
        } else {
            var respuesta = validateEmail($("#registroEmail").val());
    
            if (respuesta == false) {
                mensaje("La direccion de correo es invalida",1);
                return;
            }
        }
    
        if( $("#hidUsuario").val() == ""){

            if ($("#registroContrasena").val() == "") {
                mensaje("Debe indicar la contraseña del usuario",1);
                return;
            } else {
                
                if ($("#registroContrasena").val().length < 8) {
                    mensaje("La contraseña debe ser minimo de 8 caracteres",1);
                    return;
                }
        

            }

    
        }


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

                console.log("Mensaje del JSON: " + json.mensaje);

                if(json.error == 0){
                    
                    mensaje(json.mensaje,0);

                    //$("#mensaje").html(html).fadeIn();
                    limpiarCampos();
                    limpiarTabla();
                    botones(0);
                    cargarUsuarios();

                }else {

                    mensaje(json.mensaje,1);

                    //$("#mensaje").html(html).fadeIn();
                }



            },
            error: function (e) {
                //$("#error").html(e).fadeIn();
                mensaje(e,1);
                
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
                                tr.append("<td>" + json.Items[0][i].nombre + "</td>");
                                tr.append("<td>" + json.Items[0][i].apellido + "</td>");
                                tr.append("<td>" + json.Items[0][i].email + "</td>");
                                tr.append("<td>" + json.Items[0][i].fecha_creacion + "</td>"); 
                                
                                var html="";
                                html = '<div class="btn-group">';
                                html += '<button class="btn btn-warning edit" data-field-id="' + json.Items[0][i].id + '" data-field-nombre="' + json.Items[0][i].nombre + '" data-field-apellido="'+ json.Items[0][i].apellido + '" data-field-usuario="'+ json.Items[0][i].usuario + '" data-field-email="' + json.Items[0][i].email +  '"><i class="fa fa-edit" alt=“editar”></i>&nbsp;Editar</button>';
                                html += '<button class="btn btn-danger delete" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i>&nbsp;Eliminar</button>';
                                html += '</div>'
                                tr.append("<td>" + html + "</td>");
                                $('#tblUsuarios').append(tr);
                            //}
                        }


                        editarUsuario();
                        validareliminarUsuario();
                    }
                    /************************************************ */


            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });

}

function cargarRoles(){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','CR');
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
/*
        console.log(json);
        console.log("Este es el Mensaje: " + json.mensaje);
        console.log("Items: " + json.Items.length);
        console.log("Items Resultados: " + json.Items[0].length);
        console.log("Rol Resultados: " + json.Items[0][1].rol);
*/
                /*
                |------------------------------------------------------
                | AQUI SE CARGA LA INFORMACION EN LA TABLA
                |------------------------------------------------------
                */
                if(json.Items.length > 0){
                    var tr;

                    /* 
                    |-----------------------------------------
                    | SELECCIONO EL COMBO ROLES Y LO LIMPIO
                    |-----------------------------------------
                    */

                        $('#cboRoles') 
                        .find('option') 
                        .remove()
                        .end()
                        ;

                    /* 
                    |----------------------------------------
                    | AQUI CARGO EL TEXTO POR DEFECTO
                    |----------------------------------------
                    */

                        $('#cboRoles').append("<option value=''>Seleccione un rol...</option>"); 

                    /* 
                    |-------------------------------------------------
                    | AQUI RECORRO LOS ITEMS Y LOS CARGO EN EL COMBO
                    |--------------------------------------------------
                    */

                    for (var i = 0; i < json.Items[0].length; i++) {
       
                        $("#cboRoles").append($("<option></option>").val(json.Items[0][i].id).html(json.Items[0][i].rol)); 
        
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


function mensaje(mensaje, condicion){

    var html="";

    if(condicion == 0){//ESTOS SON MENSAJES CON EXITO

        html='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + mensaje;

    } else if (condicion == 1){//ESTOS SON MENSAJES CON ERROR

        html='<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color:#bf1d1d;"></i>&nbsp' + mensaje;
    }


    $('#spanMsg').html('');
    $('#spanMsg').html(html);
    //open the modal
    $('#msgModal').modal('show');

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

function validareliminarUsuario(){

    $(".delete").click(function() {

        var vlId = $(this).data('field-id');
        var vlEliminar = '#'; //'{{ route("eliminar-ministerial",["id" => "VALOR"]) }}';
        //vlEliminar = vlEliminar.replace('VALOR', vlId);

        $('#spanDeleteOk').attr('onclick','eliminarUsuario(' + vlId + ')');

        //pass the data in the modal body adding html elements
        //$('#spanDelete').html('');
        //$('#spanDelete').html('<form id="delete-form" action="' + vlEliminar + '" method="POST" style="display: none;">@csrf</form>');
        //open the modal
        $('#deleteModal').modal('show')

    })


}

function eliminarUsuario(idusuario){

    //mensaje("Eliminar el usuario con el ID: " + idusuario,0);
   
  /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData();

        formData.append('idusuario',idusuario);
        formData.append('opcion','D');
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
    
                    console.log("Mensaje del JSON: " + json.mensaje);
    
                    if(json.error == 0){
                        
                        mensaje(json.mensaje,0);
    
                        //$("#mensaje").html(html).fadeIn();
                        limpiarCampos();
                        limpiarTabla();
                        botones(0);
                        cargarUsuarios();
    
                    }else {
    
                        mensaje(json.mensaje,1);
    
                        //$("#mensaje").html(html).fadeIn();
                    }
    
    
    
                },
                error: function (e) {
                    //$("#error").html(e).fadeIn();
                    mensaje(e,1);
                    
                }
            });


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