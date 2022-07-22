function inicio(){

    cargarInquilino();
    cargarEstados();
    guardarInquilino();
    generarCodigoInquilino();
    
  
    jQuery("#registroNombre").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroApellido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });



    /*
    |-------------------------
    | ESTO ES LO JURIDICO
    |------------------------------
    */


    guardarInquilinoJuridico();
    generarCodigoInquilinoj();

    jQuery("#registroNombreJ").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });





}


function validateEmail(email) {

    var re = /\S+@\S+\.\S+/;
    return re.test(email);


}



function guardarInquilino(){

    $("#registroinquilino").on('submit', function(evt) {
   /*
   |-----------------------------------------------
   | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
   |-----------------------------------------------
   */
   evt.preventDefault();
   /**********************************************/        

 
if ($("#registroNombre").val() == "") {
    mensaje("Debe indicar el nombre del inquilino",1);
    return;
}

if ($("#registroApellido").val() == "") {
    mensaje("Debe indicar el apellido del inquilino",1);
    return;
}



 if ($("#registroCedula").val() == "") {
     mensaje("Debe indicar la cédula del inquilino",1);
     return;
     }

if ($("#registroNacionalidad").val() == "") {
mensaje("Debe indicar la nacionalidad del inquilino",1);
return;
}

if ($("#registroRif").val() == "") {
        mensaje("Debe indicar el rif del inquilino",1);
        return;
        }
 
 if ($("#registroTeléfono").val() == "") {
     mensaje("Debe indicar el telefono del inquilino",1);
     return;
     }
 
 if ($("#registroCelular").val() == "") {
     mensaje("Debe indicar el celular del inquilino",1);
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
       url: "app/handler/alquileres/hndregistroinquilino.php",
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
               //limpiarTabla();
               //botones(0);
               cargarInquilino();

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


function limpiarCampos(){

    $("#hidinquilino").val("");
    $("#registroNombre").val("");
    $("#registroApellido").val("");
    $("#registroNacionalidad").val("");
    $("registroCedula").val("");
    $("#registroTeléfono").val("");
    $("#registroCelular").val("");
    $("#registroRif").val("");
    $("#cboEstados").val("");
    $("#registroMunicipio").val("");
    $("#registroParroquia").val("");
    $("#registroDirecionH").val("");
    $("#registroDirecionO").val("");
    $("#registroEmail").val("");

}


function generarCodigoInquilino(){


    $("#registroNombre").on('keyup', function () {

        var prmNombre= this.value;
        var prmApellido=$("#registroApellido").val();

        $("#registroCodigo").val('');
        $("#registroCodigo").val(codigoInquilino(prmNombre + ' ' + prmApellido));

    });

    $("#registroApellido").on('keyup', function () {

        var prmNombre= $("#registroNombre").val(); 
        var prmApellido=this.value;

        $("#registroCodigo").val('');
        $("#registroCodigo").val(codigoInquilino(prmNombre + ' ' + prmApellido));

    });
   

}



function cargarInquilino(){

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
        url: "app/handler/alquileres/hndregistroinquilino.php",
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
                            tr.append("<td>" + json.Items[0][i].nombre+ "</td>");
                            tr.append("<td>" + json.Items[0][i].cedula+ "</td>");
                            tr.append("<td>" + json.Items[0][i].telefono + "</td>");
                            tr.append("<td>" + json.Items[0][i].correo + "</td>"); 
                            
                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.5em;">';
                            html += '<a title="edit" data-field-id="' + json.Items[0][i].id  + '"><fa fa-pencil-square-o alt=“editar”></i></a>&nbsp;';
                            html += '<a title="ver" data-field-id="' + json.Items[0][i].id + '"><i class="fas fa-search"></i></a>&nbsp;';
                            html += '<a title="contrato" data-field-id="' + json.Items[0][i].id + '" data-field-nombre="' + json.Items[0][i].nom_legal + '" data-field-apellido="'+ json.Items[0][i].ape_legal + '" data-field-correo="'+ json.Items[0][i].cor_legal + '" data-field-cedula="' + json.Items[0][i].ced_inqu + '" data-field-telefo="' + json.Items[0][i].cel_inqu +  '"><i class="fa-solid fa-file-pen"></i></a>&nbsp;';
                            html += '<a title="bitacora" data-field-id="' + json.Items[0][i].id + '"><i class="fa-regular fa-folder-open"></i></a>&nbsp;';
                            html += '<a title="pagador"  data-field-id="' + json.Items[0][i].id + '"><i class="fa-regular fa-id-badge"></i></a>&nbsp;';
                            html += '<a title="eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fas fa-trash" alt=“eliminar”></i></a>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#datatablesSimple').append(tr);
                        //}
                    }


                    //editarRepresentante();
                    //validareliminarRepresentante();
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