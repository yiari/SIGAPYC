function inicio(){

    guardarrepresentante();
    cargarRepresentanteLegal();
    limpiarCampos();


    jQuery("#registroNombre").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroApellido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });



}



function guardarrepresentante(){

         $("#registrrepresentante").on('submit', function(evt) {
        /*
        |-----------------------------------------------
        | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
        |-----------------------------------------------
        */
        evt.preventDefault();
        /**********************************************/        



        if ($("#registroNombre").val() == "") {
            mensaje("Debe indicar el nombre del representante legal",1);
            return;
        }
    
        if ($("#registroApellido").val() == "") {
            mensaje("Debe indicar el apellido del representante legal",1);
            return;
        }

        if ($("#registroRif").val() == "") {
            mensaje("Debe indicar el rif del representante legal",1);
            return;
        }

        if ($("#registroCedula").val() == "") {
            mensaje("Debe indicar la cedula del representante legal",1);
            return;
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
            url: "app/handler/admin/hndregistrorepresentante.php",
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
                    cargarRepresentanteLegal();

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


function limpiarCampos(){

        $("#hidlegal").val("");
        $("#registroNombre").val("");
        $("#registroApellido").val("");
        $("#registroRif").val("");
        $("#registroCedula").val("");
    

}

function limpiarTabla() {

    $('#tblrepresentante tbody').children().remove();

}

function botones(opcion){

if(opcion == 1){

    $(".cancelar").show();

} else {
    
    $(".cancelar").hide();

}

}


function cargarRepresentanteLegal(){

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
        url: "app/handler/admin/hndregistrorepresentante.php",
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
                            tr.append("<td>" + json.Items[0][i].nom_legal + "</td>");
                            tr.append("<td>" + json.Items[0][i].ape_legal + "</td>");
                            tr.append("<td>" + json.Items[0][i].rif_legal + "</td>");
                            tr.append("<td>" + json.Items[0][i].ced_legal + "</td>"); 
                            
                            var html="";
                            html = '<div class="btn-group">';
                            html += '<button class="btn btn-warning edit" data-field-id="' + json.Items[0][i].id_legal + '" data-field-nombre="' + json.Items[0][i].nom_legal + '" data-field-apellido="'+ json.Items[0][i].ape_legal + '" data-field-rif="'+ json.Items[0][i].rif_legal + '" data-field-cedula="' + json.Items[0][i].ced_legal +  '"><i class="fas fa-edit" alt=“editar”></i>&nbsp;Editar</button>';
                            html += '<button class="btn btn-danger delete" data-field-id="' + json.Items[0][i].id_legal + '"><i class="fas fa-trash" alt=“eliminar”></i>&nbsp;Eliminar</button>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#tblrepresentante').append(tr);
                        //}
                    }


                    editarRepresentante();
                    validareliminarRepresentante();
                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

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



function editarRepresentante(){

    $(".edit").click(function() {

        var prmid_legal = $(this).data('field-id');
        var prmnom_legal = $(this).data('field-nombre');
        var prmape_legal = $(this).data('field-apellido');
        var prmrif_legal = $(this).data('field-rif');
        var prmced_legal = $(this).data('field-cedula');

       

        $("#hidlegal").val(prmid_legal);
        $("#registroNombre").val(prmnom_legal);
        $("#registroApellido").val(prmape_legal);
        $("#registroRif").val(prmrif_legal);
        $("#registroCedula").val(prmced_legal);

        botones(1);

        cancelarRegistro();
       
    })


}



function eliminarrepresentante(idrepresentante){

   
   
  /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData();

        formData.append('idrepresentante',idrepresentante);
        formData.append('opcion','D');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/admin/hndregistrorepresentante.php",
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
                        cargarRepresentanteLegal();
    
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



function validareliminarRepresentante(){

    $(".delete").click(function() {

        var vlId = $(this).data('field-id');
        var vlEliminar = '#'; //'{{ route("eliminar-ministerial",["id" => "VALOR"]) }}';
        //vlEliminar = vlEliminar.replace('VALOR', vlId);

        $('#spanDeleteOk').attr('onclick','eliminarRepresentante(' + vlId + ')');

        //pass the data in the modal body adding html elements
        //$('#spanDelete').html('');
        //$('#spanDelete').html('<form id="delete-form" action="' + vlEliminar + '" method="POST" style="display: none;">@csrf</form>');
        //open the modal
        $('#deleteModal').modal('show')

    })


}

function eliminarRepresentante(idrepresentante){

    //mensaje("Eliminar el usuario con el ID: " + idusuario,0);
   
  /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData();

        formData.append('idrepresentante',idrepresentante);
        formData.append('opcion','D');
        /*
        |-----------------------------------------------
        | AQUI SE LLAMA EL AJAX 
        |-----------------------------------------------
        */
        $.ajax({
            url: "app/handler/admin/hndregistrorepresentante.php",
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
                        cargarRepresentanteLegal();
    
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