function inicio(){

    
    cargarPagador();
    generarCodigoPagador();
    cargarEstados();
    guardarPagador();


    jQuery("#registroNombre").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroApellido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });


    jQuery("#registroCedula").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroTelefono").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroCelular").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });


    /*
    |-------------------------
    | ESTO ES LO JURIDICO
    |------------------------------
    */

    guardarPagadorJuridico();
    generarCodigoPagadorj();

}


function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}



function guardarPagador(){

    $("#registrarpagador").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

  

   if ($("#registroNombre").val() == "") {
       mensaje("Debe indicar el nombre del pagador",1);
       return;
   }

   if ($("#registroApellido").val() == "") {
       mensaje("Debe indicar el apellido del pagador",1);
       return;
   }

   if ($("#registroNacionalidad").val() == "") {
    mensaje("Debe indicar la nacionalidad del pagador",1);
    return;
    }

    if ($("#registroCedula").val() == "") {
        mensaje("Debe indicar la cédula del pagador",1);
        return;
        }
    
    if ($("#registroTeléfono").val() == "") {
        mensaje("Debe indicar el telefono del pagador",1);
        return;
        }
    
    if ($("#registroCelular").val() == "") {
        mensaje("Debe indicar el celular del pagador",1);
        return;
        }

    if ($("#registroRif").val() == "") {
        mensaje("Debe indicar el rif del pagador",1);
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
        mensaje("Debe indicar la dirección de habitación del pagador ",1);
        return;
        }

    if ($("#registroDirecionO").val() == "") {
        mensaje("Debe indicar la dirección de la oficina del pagador ",1);
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
            url: "app/handler/alquileres/hndregistropagador.php",
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

                //console.log("Mensaje del JSON: " + json.mensaje);

                if(json.error == 0){
                    
                    mensaje(json.mensaje,0);

                    //$("#mensaje").html(html).fadeIn();
                    limpiarCampos();
                    limpiarTabla();
                    //botones(0);

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



function cargarPagador(){

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
        url: "app/handler/alquileres/hndregistropagador.php",
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
                            
                           
                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].nombre + "</td>");
                            tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                            tr.append("<td>" + json.Items[0][i].telefono + "</td>");
                            tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                            
                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                            html += '<a href="javascript:void(0);" onclick="cargarPantalla(' + json.Items[0][i].id_paga + ')" title="edit"><i class="fas fa-edit" alt=“editar”></i></a>&nbsp;';
                            html += '<a title="ver" data-field-id_paga="' + json.Items[0][i].id_paga + '"><i class="fas fa-search"></i></a>&nbsp;';
                            html += '<a title="eliminar"  data-field-id_paga="'  + json.Items[0][i].id_paga + '"><i class="fas fa-trash" alt=“eliminar”></i></a>';
                            
                           
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datatablesSimple').append(tr);
                        //}
                    }


                    editarPagador();
                    //validareliminarRepresentante();
                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}


function cargarPantalla(prmid_paga){

    window.open("index.php?url=app/vistas/alquileres/ingresar_pagador?id_paga=" + prmid_paga, "_self");
   
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



function generarCodigoPagador(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');
        $("#registroCodigo").val(codigoPagador(prmNombre + ' ' + prmApellido));

    });

    $("#registroApellido").on('keyup', function () {

        var prmNombre= $("#registroNombre").val(); 
        var prmApellido=this.value;

        $("#registroCodigo").val('');
        $("#registroCodigo").val(codigoPagador(prmNombre + ' ' + prmApellido));

    });
   

}


function limpiarTabla() {

    $('#datatablesSimple tbody').children().remove();

}


function limpiarCampos(){

    $("#hidapoderado").val("");
    $("#registroCodigo").val("");
    $("#registroNombre").val("");
    $("#registroApellido").val("");
    $("#registroNacionalidad").val("");
    $("#registroCedula").val("");
    $("#registroRif").val("");
    $("#registroTelefono").val("");
    $("#registroCelular").val(""); 
    $("#registroEmail").val("");
    $("#cboEstados").val("");                
    $("#cboMunicipios").val("");
    $("#cboParroquia").val("");
    $("#registroDirecionH").val("");
    $("#registroDirecionO").val("");
   

}



function editarPagador(){

    $(".edit").click(function() {

    

        var prmid_paga = $(this).data('field-id_paga');
        var prmcod_paga = $(this).data('field-cod_paga');
        var prmnom_paga = $(this).data('field-nom_paga');
        var prmape_paga = $(this).data('field-ape_pag');
        var prmnac_paga = $(this).data('field-nac_paga');
        var prmci_paga  = $(this).data('field-ci_paga');
        var prmrif_paga = $(this).data('field-rif_paga');
        var prmloc_paga = $(this).data('field-loc_paga');
        var prmcel_paga = $(this).data('field-cel_paga');
        var prmcor_paga = $(this).data('field-cor_paga');
        var prmest_paga = $(this).data('field-est_paga');
        var prmmun_paga = $(this).data('field-mun_paga');
        var prmpar_paga = $(this).data('field-par_paga');
        var prmdir_paga = $(this).data('field-dir_paga');
        var prmofi_paga = $(this).data('field-ofi_paga');
       

        
        $("#hidapoderado").val(prmid_paga);
        $("#registroCodigo").val(prmcod_paga);
        $("#registroNombre").val(prmnom_paga);
        $("#registroApellido").val(prmape_paga);
        $("#registroNacionalidad").val( prmnac_paga);
        $("#registroCedula").val(prmci_paga);
        $("#registroRif").val(prmrif_paga);
        $("#registroTelefono").val(prmloc_paga);
        $("#registroCelular").val(prmcel_paga); 
        $("#registroEmail").val(prmcor_paga);
        $("#cboEstados").val(prmest_paga);                
        $("#cboMunicipios").val(prmmun_paga);
        $("#cboParroquia").val(prmpar_paga);
        $("#registroDirecionH").val(prmdir_paga);
        $("#registroDirecionO").val(prmofi_paga );
       

      

        botones(1);

        cancelarRegistro();
       
    })


}


function botones(opcion){

    if(opcion == 1){
    
        $(".cancelar").show();
    
    } else {
        
        $(".cancelar").hide();
    
    }
    
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