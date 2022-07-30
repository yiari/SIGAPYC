function inicio(){

    cargarUnidades();
    cargarEstados();
    cargartipo_inmueble();
    cargarBancos('cboBancoNP');
    guardarunidades();
    
    
    
    }
    
    
    
    
    function  guardarunidades(){
    
        $("#registrounidades").on('submit', function(evt) {
       /*
       |-----------------------------------------------
       | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
       |-----------------------------------------------
       */
       evt.preventDefault();
       /**********************************************/        
    
     
    if ($("#cboinmueble").val() == "") {
        mensaje("Debe indicar el tipo de inmueble de la unidad",1);
        return;
    }
    
    if ($("#registroletra").val() == "") {
        mensaje("Debe indicar la letra o número de la unidad",1);
        return;
    }
    
    
    
     if ($("#registrNombre").val() == "") {
         mensaje("Debe indicar el nombre del unidad",1);
         return;
         }
    
    if ($("#registroUso").val() == "") {
    mensaje("Debe indicar el uso del unidad",1);
    return;
    }
    
    if ($("#registroAntiguedad").val() == "") {
            mensaje("Debe indicar la  antiguedad del unidad",1);
            return;
            }
     
     
    if ($("#cboEstados").val() == "") {
        mensaje("Debe indicar el estado de residencia del unidad",1);
        return;
        }
    
    if ($("#cboMunicipios").val() == "") {
        mensaje("Debe indicar el Municipio de residencia del unidad",1);
        return;
        }
    
    if ($("#cboParroquia").val() == "") {
        mensaje("Debe indicar la parroquia de residencia del unidad",1);
        return;
        }
     
     if ($("#registroDirecionH").val() == "") {
         mensaje("Debe indicar la dirección de habitación del unidad ",1);
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
           url: "app/handler/alquileres/hndregistrounidades.php",
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
                   cargarInmueble();
    
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
    
        $("#hidunidad").val("");
        $("#cboinmueble").val("");
        $("#registroletra").val("");
        $("#registrNombre").val("");
        $("#registroUso").val("");
        $("#registroAntiguedad").val("");
        $("#cboEstados").val("");
        $("#cboMunicipios").val("");
        $("#cboParroquia").val("");
        $("#registroDirecionH").val("");
        $("#pun_inmu").val("");
        $("#equ_inmu").val("");
        $("#mtr_inmu").val("");
        $("#mtr_cons").val("");    
        $("#hab_inmu").val("");
        $("#ban_inmu").val("");
        $("#est_inmu").val("");
        $("#ser_inmu").val("");
        $("#lim_nort").val("");
        $("#lim_sur").val("");
        $("#lim_este").val("");
        $("#lim_oest").val("");
        $("#nom_regi").val("");
        $("#fec_regi").val("");
        $("#tom_regi").val("");
        $("#fol_regi").val("");
        $("#asi_regi").val("");
        $("#fic_cata").val("");
        $("#num_regi").val("");
        $("#gasto_admi").val("");
        $("#gasto_papel").val("");
        $("#iva").val("");
        $("#isrl").val("");
        $("#servicio").val("");
        $("#monto").val("");
        $("#cboBancoNP").val("");
        $("#num_cuenta").val("");
        $("#cedula").val("");
    
    
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
    
    
    
    function cargarUnidades(){
    
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
            url: "app/handler/alquileres/hndregistrounidades.php",
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
                                tr.append("<td>" + json.Items[0][i].foto + "</td>");
                                tr.append("<td>" + json.Items[0][i].propietario + "</td>");
                                tr.append("<td>" + json.Items[0][i].inquilino + "</td>");
                                tr.append("<td>" + json.Items[0][i].tipo + "</td>"); 
                                tr.append("<td>" + json.Items[0][i].estatus + "</td>"); 
                                
                                var html="";
                                html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                                html += '<a title="Editar" data-field-id="' + json.Items[0][i].id  + '"><i class="fa fa-edit" alt=“editar”></i></a>&nbsp;';
                                html += '<a title="Ver" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-search" alt=“Ver”></i></a>&nbsp;';
                                html += '<a title="Contrato" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-file-pen"></i></a>&nbsp;';
                                html += '<a title="Bitacora" data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-folder-open"></i></a>&nbsp;';
                                html += '<a title="inquilino"  data-field-id="' + json.Items[0][i].id + '"><i class="fa fa-id-badge"></i></a>&nbsp;';
                                html += '<a title="Eliminar"  data-field-id="'  + json.Items[0][i].id + '"><i class="fa fa-trash" alt=“eliminar”></i></a>';
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