function inicio(){

 


    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
    $('#id_inqu').val(getParameterByName('idinq'));
    $('#id_inquj').val(getParameterByName('idinq'));
    $('#tipo_inquilino').val(getParameterByName('codtip'));
    $('#tipo_inquilinoj').val(getParameterByName('codtip'));

    let idInquilino = getParameterByName('idinq');
    let prmCodInq = getParameterByName('codinq');
    let prmtipo = getParameterByName('codtip');
    /*--------------------------------------*/    

    codigoInquilino(prmCodInq);
   

    editarInquilino(idInquilino,prmCodInq,prmtipo);


}



function codigoInquilino(prmDato){

    var html = "";

    html='<strong>INQUILINO : </strong>'  + prmDato +'</span>';

    $("#lblinquilino").html('');
    $("#lblinquilino").html(html);

}





function editarInquilino(prmidinquilino,prmcodigo,prmtipo){
/*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','CI');
    formData.append('idinquilino',prmidinquilino);
    formData.append('tipo',prmtipo);


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
     
                console.log("Mensaje del JSON: " + json.mensaje);
     
                if(json.Items.length > 0){
                    var tr;
                        for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                            tr = $('<tr/>');
                            
                           
                            tr.append("<td>" + json.Items[0][i].registroCodigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroNombre + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroApellido + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroNacionalidad + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroCedula + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroRif + "</td>");
                            tr.append("<td>" + json.Items[0][i].actividad + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroTeléfono + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroCelular + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroEmail + "</td>");
                            tr.append("<td>" + json.Items[0][i].estado + "</td>");
                            tr.append("<td>" + json.Items[0][i].municipio + "</td>");
                            tr.append("<td>" + json.Items[0][i].parroquica + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroDirecionH + "</td>");
                            tr.append("<td>" + json.Items[0][i].registroDirecionO + "</td>");
                            tr.append("<td>" + json.Items[0][i].codigo_registro + "</td>");
                            tr.append("<td>" + json.Items[0][i].notaria + "</td>");
                            tr.append("<td>" + json.Items[0][i].fecha + "</td>");
                            tr.append("<td>" + json.Items[0][i].numero + "</td>");
                            tr.append("<td>" + json.Items[0][i].tomo + "</td>");
                            tr.append("<td>" + json.Items[0][i].folio + "</td>");
  
                            tr.append("<td>" + html + "</td>");
                           $('#registroinquilino').append(tr);
                           
                        //}
                    }
                    
                }


                if(json.error == 0){
                    
                    mensaje(json.mensaje,0);
     
                    //$("#mensaje").html(html).fadeIn();
                    
                    //limpiarFormulario(1);
                    botones(1);
                    cancelarRegistro()
                    
     
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
    

$(document).ready(function() {


    inicio();



});