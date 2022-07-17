

function cargarEstados(){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','estados');
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/comunes/hndcomunes.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data,status,xhr) {

         var json = data;
        
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

                        $('#cboEstados') 
                        .find('option') 
                        .remove()
                        .end()
                        ;

                    /* 
                    |----------------------------------------
                    | AQUI CARGO EL TEXTO POR DEFECTO
                    |----------------------------------------
                    */

                        $('#cboEstados').append("<option value=''>Seleccione un estado...</option>"); 

                    /* 
                    |-------------------------------------------------
                    | AQUI RECORRO LOS ITEMS Y LOS CARGO EN EL COMBO
                    |--------------------------------------------------
                    */

                    for (var i = 0; i < json.Items[0].length; i++) {
       
                        $("#cboEstados").append($("<option></option>").val(json.Items[0][i].id).html(json.Items[0][i].estado)); 
        
                    }

                    onchangeestados();

                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}

function onchangeestados(){

    $("#cboEstados").change(function() {

        var idestado = $(this).val();

        if (idestado > 0 ){

            cargarMunicipios(idestado);

        }




 });



}


function cargarMunicipios(idestado){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','municipios');
    formData.append('idestado',idestado);
    
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/comunes/hndcomunes.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
        var json = data;
        
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

                        $('#cboMunicipios') 
                        .find('option') 
                        .remove()
                        .end()
                        ;

                    /* 
                    |----------------------------------------
                    | AQUI CARGO EL TEXTO POR DEFECTO
                    |----------------------------------------
                    */

                        $('#cboMunicipios').append("<option value=''>Seleccione un  municipio...</option>"); 

                    /* 
                    |-------------------------------------------------
                    | AQUI RECORRO LOS ITEMS Y LOS CARGO EN EL COMBO
                    |--------------------------------------------------
                    */

                    for (var i = 0; i < json.Items[0].length; i++) {
       
                        $("#cboMunicipios").append($("<option></option>").val(json.Items[0][i].id).html(json.Items[0][i].municipio)); 
        
                    }

                    onchangemunicipio()

                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}



function onchangemunicipio(){

    $("#cboMunicipios").change(function() {

        var idmunicipio = $(this).val();

        if (idmunicipio > 0 ){

            cargarParroquias(idmunicipio);

        }

 });
}



function cargarParroquias(idmunicipio){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','parroquia');
    formData.append('idmunicipio',idmunicipio);
    
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/comunes/hndcomunes.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
        var json = data;
        
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

                        $('#cboParroquia') 
                        .find('option') 
                        .remove()
                        .end()
                        ;

                    /* 
                    |----------------------------------------
                    | AQUI CARGO EL TEXTO POR DEFECTO
                    |----------------------------------------
                    */

                        $('#cboParroquia').append("<option value=''>Seleccione una Parroquia...</option>"); 

                    /* 
                    |-------------------------------------------------
                    | AQUI RECORRO LOS ITEMS Y LOS CARGO EN EL COMBO
                    |--------------------------------------------------
                    */

                    for (var i = 0; i < json.Items[0].length; i++) {
       
                        $("#cboParroquia").append($("<option></option>").val(json.Items[0][i].id).html(json.Items[0][i].parroquia)); 
        
                    }

                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}


function cargarBancos(cboBancos){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','banco');
  
    
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/comunes/hndcomunes.php",
        data: formData,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data,status,xhr) {
        var json = data;
        
        /*
        |-----------------------------------------------------------
        | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
        | EL RESULTADO SE CONVIERTE A JSON
        |-----------------------------------------------------------
        */

        var respuestaHeader = xhr.getResponseHeader("Content-Type");
        var verificarHeader = respuestaHeader.search('text/html')

        if(verificarHeader >= 0){
            json = JSON.parse(json);
        } 

        /*---------------------------------------------------------*/


        //console.log(json);
        //console.log("Este es el Mensaje: " + json.mensaje);
        //console.log("Items: " + json.Items.length);
        //console.log("Items Resultados: " + json.Items[0].length);
       // console.log("Rol Resultados: " + json.Items[0][1].rol);

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

                        $('#' + cboBancos) 
                        .find('option') 
                        .remove()
                        .end()
                        ;

                    /* 
                    |----------------------------------------
                    | AQUI CARGO EL TEXTO POR DEFECTO
                    |----------------------------------------
                    */

                        $('#' + cboBancos).append("<option value=''>Seleccione un Banco...</option>"); 

                    /* 
                    |-------------------------------------------------
                    | AQUI RECORRO LOS ITEMS Y LOS CARGO EN EL COMBO
                    |--------------------------------------------------
                    */

                    for (var i = 0; i < json.Items[0].length; i++) {
       
                        $('#' + cboBancos).append($("<option></option>").val(json.Items[0][i].id).html(json.Items[0][i].nombre).attr("data-codigobanco", json.Items[0][i].codigobanco)); 
        
                    }

                }
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}



