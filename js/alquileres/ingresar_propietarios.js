
function inicio(){

  
    cargarEstados();
    cargarBancos('cboBancoN');
    cargarBancos('cboBancoJ');
    cargarBancos('cboBancop');
    cargarBancos('cboBancoNP');
    guardarPropietarios();
    cargarpropietario();

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


function guardarPropietarios(){

    $("#registrarpropietario").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

  

   if ($("#registroNombre").val() == "") {
       mensaje("Debe indicar el nombre del propietario",1);
       return;
   }

   if ($("#registroApellido").val() == "") {
       mensaje("Debe indicar el apellido del propietario",1);
       return;
   }

   if ($("#registroNacionalidad").val() == "") {
    mensaje("Debe indicar la nacionalidad del propietario",1);
    return;
    }

    if ($("#registroCedula").val() == "") {
        mensaje("Debe indicar la cédula del propietario",1);
        return;
        }
    
    if ($("#registroTeléfono").val() == "") {
        mensaje("Debe indicar el telefono del propietario",1);
        return;
        }
    
    if ($("#registroCelular").val() == "") {
        mensaje("Debe indicar el celular del propietario",1);
        return;
        }

    if ($("#registroRif").val() == "") {
        mensaje("Debe indicar el rif del propietario",1);
        return;
        }
    
    if ($("#registroEstado").val() == "") {
            mensaje("Debe colocar el campo el estado ",1);
            return;
            }

    if ($("#registroMunicipio").val() == "") {
        mensaje("Debe colocar el campo el municipio ",1);
        return;
        }

    if ($("#registroParroquia").val() == "") {
        mensaje("Debe colocar el campo el parroqui ",1);
        return;
        }
    
    if ($("#registroDirecionH").val() == "") {
        mensaje("Debe indicar la dirección de habitación del propietario ",1);
        return;
        }

    if ($("#registroDirecionO").val() == "") {
        mensaje("Debe indicar la dirección de la oficina del propietario ",1);
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


    if ($("#registroEstado").val() == "") {
        mensaje("Debe indicar el estado de residencia del propietario",1);
        return;
        }
    
    if ($("#registroMunicipio").val() == "") {
        mensaje("Debe indicar el Municipio de residencia del propietario",1);
        return;
        }

    if ($("#registroParroquia").val() == "") {
        mensaje("Debe indicar la parroquia de residencia del propietario",1);
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
            url: "app/handler/alquileres/hndregispropietarios.php",
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
                    //limpiarCampos();
                    //limpiarTabla();
                    botones(0);
                    cargarPropietarios();

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
        url: "app/handler/alquileres/hndregistropropietarios.php",
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
                            html += '<button class="btn btn-warning edit" data-field-id="' + json.Items[0][i].id + '" data-field-nombre="' + json.Items[0][i].nombre + '" data-field-apellido="'+ json.Items[0][i].apellido + '" data-field-usuario="'+ json.Items[0][i].usuario + '" data-field-email="' + json.Items[0][i].email +  '"><i class="fas fa-edit" alt=“editar”></i>&nbsp;Editar</button>';
                            html += '<button class="btn btn-danger delete" data-field-id="' + json.Items[0][i].id + '"><i class="fas fa-trash" alt=“eliminar”></i>&nbsp;Eliminar</button>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#tblUsuarios').append(tr);
                        //}
                    }


                   // editarpropietarios();
                    //validareliminarPropietarios();
                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

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







$(document).ready(function() {


    inicio();



});