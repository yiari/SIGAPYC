function inicio(){

 


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */

    let idInquilino = getParameterByName('idinq');
    let prmCodInq = getParameterByName('codinq');
    let prmtipo = getParameterByName('codtip');

    let tipoInquilino = getParameterByName('codtip');
    /*--------------------------------------*/   

    if(tipoInquilino == 1){
        $("#nav-inq_juridico-tab").hide();
        $("#nav-inq_juridico").hide();
        $("#nav-inq_natural").addClass('show').addClass('active');

    } else if (tipoInquilino == 2) { 
        $("#nav-inq_natural-tab").hide(); 
        $("#nav-inq_natural").hide();
        $("#nav-inq_juridico").addClass('show').addClass('active');
    } 

    generarCodigoInquilino()
    cargarEstados();
  

    guardarInquilino();
   
   

   


    /*
    |--------------------------------------------------
    | TODOS LOS CAMPOS DE TEXTO ESCRIBEN EN MAYUSCULA
    |--------------------------------------------------
    */
    $("input[type=text]").keyup(function() {
        $(this).val($(this).val().toUpperCase());
    });
    /*------------------------------------------------*/

    jQuery("#registroNombre").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroApellido").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^A-Za-z ]/g, ''));
    });

    jQuery("#registroCedula").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9'.']/g, ''));
    });

    jQuery("#registroTelefono").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });

    jQuery("#registroCelular").on('input', function (evt) {
        jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
    });


    /*
    |------------------------------------------------------------------------------------------------
    | DESPUES DE CARGAR LAS FUNCIONES Y VALIDACIONES, ENTONCES SOLICITO LOS DATOS DEL PROPIETARIO
    |-------------------------------------------------------------------------------------------------
    */


    consultarInquilino(idInquilino,prmCodInq,prmtipo);

}






function consultarInquilino(id,codigo,tipo){

    console.log("consultando");
    
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
            var formData = new FormData();
            /*
            |-----------------------------------------------------
            | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
            |-----------------------------------------------------
            */
            formData.append('opcion','CI');
    
            formData.append('idInquilino',id);
            formData.append('codigoInquilino',codigo);
            formData.append('tipoInquilino',tipo);
            
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
                let idPropietario = 0;
                    console.log("Mensaje del JSON: " + json);
    
                    if(json.error == 0){
                        
                        //mensaje(json.mensaje,0);
                        if(json.Items.length > 0){
    
    
                            //<input type="hidden" id="tipo_persona" name="tipo_persona" value='1'>
                            $('#hidinquilino').val(json.Items[0].id_inqu);

                            /*
                            |------------------------------------------------------
                            | DATOS PRINCIPALES
                            |------------------------------------------------------
                            */
                            $('#registroNombre').val(json.Items[0].nom_inqu);
                            $('#registroApellido').val(json.Items[0].ape_inqu);
                            
                            $("select[name='registroNacionalidad']").val(json.Items[0].nac_inqu).change();
    
    
                            
                            $('#registroCedula').val(json.Items[0].ci_inqu);
                            $('#registroRif').val(json.Items[0].rif_inqu);
                            $('#registroTelefono').val(json.Items[0].loc_inqu);
                            $('#registroCelular').val(json.Items[0].cel_inqu);
                            $('#registroEmail').val(json.Items[0].cor_inqu);
    
    
                            $("select[name='cboEstados']").val(json.Items[0].est_inqu).change();
                            setTimeout(function(){ $("select[name='cboMunicipios']").val(json.Items[0].mun_inqu).change() }, 2000);
                            setTimeout(function(){ $("select[name='cboParroquia']").val(json.Items[0].par_inqu).change() }, 4000);
    
                            
                            $('#registroDirecionH').val(json.Items[0].dir_inqu);
                            $('#registroDirecionO').val(json.Items[0].ofi_inqu);
    
    
                            $("#registroCodigo").val(json.Items[0].cod_inqu);
    
                           
                           
    
                        }
    
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
     
     if ($("#registroTelefono").val() == "") {
         mensaje("Debe indicar el telefono del inquilino",1);
         return;
         }
     
     if ($("#registroCelular").val() == "") {
         mensaje("Debe indicar el celular del inquilino",1);
         return;
         }
     
    if ($("#cboEstados").val() == "") {
        mensaje("Debe indicar el estado de residencia del inquilino",1);
        return;
        }
    
    if ($("#cboMunicipios").val() == "") {
        mensaje("Debe indicar el Municipio de residencia del inquilino",1);
        return;
        }
    
    if ($("#cboParroquia").val() == "") {
        mensaje("Debe indicar la parroquia de residencia del inquilino",1);
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
                   
                   limpiarFormulario(1);
                   //botones(0);
                   //cargarInquilino();
    
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
    
    
    
    function generarCodigoInquilino(){


        $("#registroNombre").on('keyup', function () {
    
            var prmNombre= this.value;
            var prmApellido=$("#registroApellido").val();
    
            $("#registroCodigo").val('');
    
            codigoInquilino(prmNombre + ' ' + prmApellido,function(result){
                $("#registroCodigo").val(result);
            });
    
    
        });
    
        $("#registroApellido").on('keyup', function () {
    
            var prmNombre= $("#registroNombre").val(); 
            var prmApellido=this.value;
    
            $("#registroCodigo").val('');
            codigoInquilino(prmNombre + ' ' + prmApellido,function(result){
                $("#registroCodigo").val(result);
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
    

function cancelarRegistro(){
    
    $(".cancelar").click(function() {
        limpiarFormulario(1);
        botones(0);

    })
}


function botones(opcion){

    if(opcion == 1){
    
        $(".cancelar").show();
    
    } else {
        
        $(".cancelar").hide();
    
    }
    
    }


function limpiarFormulario(valor){

        if(valor == 1){
            document.getElementById("registroinquilino").reset();
        }
    
    }


    function validateEmail(email) {

        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    
    
    }
    
    

$(document).ready(function() {


    inicio();



});