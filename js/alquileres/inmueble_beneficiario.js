function inicio(){

    /*
    |----------------------------------------
    | ASI SE CAPTURAN LOS PARAMETROS
    |---------------------------------------
    */
   let idPropietario = getParameterByName('idpro');
   let prmCodPro = getParameterByName('codpro');
   let prmTipo = getParameterByName('codtip');
   let prmIdInmu = getParameterByName('idinmu');
   let prmCodInmu = getParameterByName('codinmu');
   let prmIdUnidad = getParameterByName('idunid');
    /*--------------------------------------*/    

    codigoPropietario(prmCodPro,prmCodInmu);

    cargarInmuebleBeneficiario(idPropietario,prmTipo);

    atrasInmueble(idPropietario,prmCodPro,prmTipo);
    
    cargarValores(idPropietario,prmIdInmu,prmIdUnidad);


}


function cargarValores(prmIdPropietario,prmIdInmueble,prmIdUnidad){

    var A = document.getElementById("id_propietario");
    A.value = prmIdPropietario;

    var B = document.getElementById("id_inmueble");
    B.value = prmIdInmueble;

    var C = document.getElementById("id_unidad");
    C.value = prmIdUnidad;

}

function codigoPropietario(prmDato, prmCodiInmueble){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';
    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

    html='<strong>INMUEBLE SELECCIONADO : </strong>'  + prmCodiInmueble +'</span>';
    $("#lblInmueble").html('');
    $("#lblInmueble").html(html);

}


function codigoPropietario(prmDato, prmCodiInmueble){

    var html = "";

    html='<strong>PROPIETARIO : </strong>'  + prmDato +'</span>';
    $("#lblPropietario").html('');
    $("#lblPropietario").html(html);

    html='<strong>INMUEBLE SELECCIONADO : </strong>'  + prmCodiInmueble +'</span>';
    $("#lblInmueble").html('');
    $("#lblInmueble").html(html);

}

function atrasInmueble(prmIdPro,prmCodPro,prmTipo){

    //if (isEmpty(prmDato) == false ){


        var html = "";
        html='index.php?url=app/vistas/alquileres/inmuebles&idpro=' + prmIdPro  + '&codpro=' + prmCodPro + '&codtip=' + prmTipo;
    
        $(".codpro").prop("href", html);


    //}

}


function cargarInmuebleBeneficiario(prmDato,prmTipo){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    formData.append('id_prop',prmDato);
    formData.append('tipo',prmTipo);
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrobeneficiarios.php",
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

                    if(json.Items[0].length > 0){
                        

                        for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                            tr = $('<tr/>');
                            
                           
                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].nombre + "</td>");
                         
                            
                            var html="";
                            html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                            html += '<input type="checkbox" class="chksumarporcentaje" id="chkunidades_' + json.Items[0][i].id_bene +'" name="chkporcentajes[]"  onchange="checkPorcentaje(' + json.Items[0][i].id_bene + ');">&nbsp;';
                            html += '<input type="text" class="form-control campo_numero" id="idben_' + json.Items[0][i].id_bene + '" name="txtporcentajes[]" onchange="sumar();" maxlength="3" placeholder="%" disabled>'
                            html += '<input type="hidden" name="hidIdBen[]"  value="' + json.Items[0][i].id_bene + '" >'
                            html += '</div>'
                            tr.append('<td style="text-align:center;">' + html + '</td>');
                            $('#datosBeneficiario').append(tr);
                        //}
                        }

                        tr = $('<tr/>');
                        tr.append('<td colspan="2" style="text-align:right;">TOTAL:</td>');
                        tr.append('<td style="text-align:center;"><span id="lbltotal"><strong>0.00</strong></span></td>');
                        $('#datosBeneficiario').append(tr);


                        tr = $('<tr/>');
                        tr.append('<td colspan="3" style="text-align:right;"><button type="submit" class="btn btn-primary">Guardar</button></td>');
                        $('#datosBeneficiario').append(tr);


                        GuardarBeneficiario();

                    }else {

                        var tr;
                        tr = $('<tr/>');
                        tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                        $('#datosBeneficiario').append(tr);

                        }

                    //new simpleDatatables.DataTable("#datosBeneficiario");

                } 

   
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}


function GuardarBeneficiario(){

    $("#registrarbeneficiario").on('submit', function(evt) {
        /*
        |-----------------------------------------------
        | AQUI SE PREVIENE QUE EL FORMULARIO CONTINUE 
        |-----------------------------------------------
        */
        evt.preventDefault();
        /**********************************************/    

        /*
        |-----------------------------------------------------
        | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
        |-----------------------------------------------------
        */
        var formData = new FormData(this);

        formData.append('opcion','IB');



        $.ajax({
            url: "app/handler/alquileres/hndregistrobeneficiarios.php",
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


            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });





    });


}

function limpiarTabla() {

    $('#datatablesSimple tbody').children().remove();

}

function checkPorcentaje(valor){

    if($('#chkunidades_' + valor).is(':checked'))
    {
        //checked
        $('#idben_' + valor).attr("disabled", false);
        sumar();
    }
    else
    {
        //unchecked
        $('#idben_' + valor).attr("disabled", true);
        sumar();

    }

}

function financial(x) {
    return Number.parseFloat(x).toFixed(2);
  }

function sumar(){

    var checkboxes = document.getElementsByClassName("chksumarporcentaje");
    var resutado = financial(0.00);
    let valores = [];
    let obtuvovalor = false;

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].type == "checkbox") {
            var isChecked = checkboxes[i].checked;

            console.log("Checked : " + isChecked);

            if(isChecked == true){
                //console.log("Checkbox seleccionado: " + checkboxes[i].id + " Posicion: " + i);
                
                let postmp = checkboxes[i].id;
                let valtmp = postmp.split("_");
                let idtmp = $('#idben_' + valtmp[1]).val();

                if(!isNaN(idtmp)){
                    valores.push(parseFloat(idtmp));
                }
                
               // resutado += financial(idtmp);

            }

        }
    }


    resutado = valores.reduce((a, b) => a + b);


    var html = "";

    if(!isNaN(resutado)){
        html='<strong>' + resutado +  '</strong>';
        $("#resuma").val(resutado);
    } else {
        html='<strong>0.00</strong>';
    }

    
    
    $("#lbltotal").html('');
    $("#lbltotal").html(html);


}

$(document).ready(function() {


    inicio();



});