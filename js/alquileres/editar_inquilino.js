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