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

    atrasInmueble(idPropietario,prmCodPro,prmTipo);
    
    cargarValores(idPropietario,prmIdInmu,prmIdUnidad);

    cargarInmuebleBeneficiario(idPropietario,prmTipo,prmIdInmu,prmIdUnidad);


}


function cargarValores(prmIdPropietario,prmIdInmueble,prmIdUnidad){

    var A = document.getElementById("id_propietario");
    A.value = prmIdPropietario;

    var B = document.getElementById("id_inmueble");
    B.value = prmIdInmueble;

    var C = document.getElementById("id_unidad");

    if(prmIdUnidad == "" || prmIdUnidad == undefined){
        C.value = 0;
    } else {
        C.value = prmIdUnidad;
    }

    

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


function cargarInmuebleBeneficiario(prmDato,prmTipo,prmIdInmueble,prmIdUnidad){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');
    formData.append('id_prop',prmDato);
    formData.append('tipo',prmTipo);
    formData.append('id_inmueble',prmIdInmueble);
    formData.append('id_unidad',prmIdUnidad);

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
        dataType: "json",
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
                    var vlSumar = false;

                    if(json.Items[0].length > 0){
                        

                        for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                            tr = $('<tr/>');
                            
                           
                            tr.append("<td>" + json.Items[0][i].codigo + "</td>");
                            tr.append("<td>" + json.Items[0][i].nombre + "</td>");
                         
                            
                            var html="";
                            
                            if(json.Items[0][i].porcentaje > 0){
                            
                                html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                                html += '<input type="checkbox" class="chksumarporcentaje"  id="chkunidades_' + json.Items[0][i].id_bene +'" name="chkporcentajes[' + i + '][' + json.Items[0][i].id_bene +  ']"  onchange="checkPorcentaje(' + json.Items[0][i].id_bene + ');" checked="checked">&nbsp;';
                                html += '<input type="text" class="form-control campo_numero" id="idben_' + json.Items[0][i].id_bene + '" name="txtporcentajes[' + i + '][' + json.Items[0][i].id_bene + ']" onchange="sumar();" maxlength="3" placeholder="%" value="' + json.Items[0][i].porcentaje + '">'
                                html += '<input type="hidden" name="hidTipoBene[' + i + '][' + json.Items[0][i].id_bene + ']"  value="' + json.Items[0][i].tipo + '" >'
                                html += '</div>'
                                tr.append('<td style="text-align:center;">' + html + '</td>');
                                $('#datosBeneficiario').append(tr);
                            
                                vlSumar = true;

                            } else {

                                html = '<div class="btn-group" style="font-size:1.3em; letter-spacing:0.2em;">';
                                html += '<input type="checkbox" class="chksumarporcentaje"  id="chkunidades_' + json.Items[0][i].id_bene +'" name="chkporcentajes[' + i + '][' + json.Items[0][i].id_bene +  ']"  onchange="checkPorcentaje(' + json.Items[0][i].id_bene + ');">&nbsp;';
                                html += '<input type="text" class="form-control campo_numero" id="idben_' + json.Items[0][i].id_bene + '" name="txtporcentajes[' + i + '][' + json.Items[0][i].id_bene + ']" onchange="sumar();" maxlength="3" placeholder="%" disabled>'
                                html += '<input type="hidden" name="hidTipoBene[' + i + '][' + json.Items[0][i].id_bene + ']"  value="' + json.Items[0][i].tipo + '" >'
                                html += '</div>'
                                tr.append('<td style="text-align:center;">' + html + '</td>');
                                $('#datosBeneficiario').append(tr);
    

                            }

                        //}
                        }

                        tr = $('<tr/>');
                        tr.append('<td colspan="2" style="text-align:right;">TOTAL:</td>');
                        tr.append('<td style="text-align:center;"><span id="lbltotal"><strong>0.00</strong></span></td>');
                        $('#datosBeneficiario').append(tr);


                        tr = $('<tr/>');
                        tr.append('<td colspan="3" style="text-align:right;"><button type="submit" class="btn btn-primary">Guardar</button></td>');
                        $('#datosBeneficiario').append(tr);

                        if (vlSumar == true){
                            sumar();
                        }

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


            if(json.error == 0){

                let urlATRAS  =$('.atrasURL').attr('href')

                mensaje(json.mensaje,0,urlATRAS);
                    //limpiarFormulario(1);

            }else {

                mensaje(json.mensaje,1);

                //$("#mensaje").html(html).fadeIn();
            }



            },
            error: function (e) {
                $("#error").html(e).fadeIn();
            }
        });





    });


}


function mensaje(mensaje, condicion, url = ""){

    var html="";
    var urlhtml="";

    if(condicion == 0){//ESTOS SON MENSAJES CON EXITO

        if(url != ""){
            $('#btnMensajeNormal').hide(); //OCULTO EL BOTON NORMAL
            $('#btnMensajeAtras').show(); //MUESTRO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
                       
            html='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + mensaje;

            urlhtml = '<a class="btn btn-primary" href="' + url + '"  role="button">Aceptar</a>';


        } else {
            $('#btnMensajeNormal').show(); //MUESTRO EL BOTON NORMAL
            $('#btnMensajeAtras').hide(); //OCUTLO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
            html='<i class="fa fa-check-circle fa-2x" aria-hidden="true" style="color:#29bf1d;"></i>&nbsp' + mensaje;
        }


        

    } else if (condicion == 1){//ESTOS SON MENSAJES CON ERROR
        $('#btnMensajeNormal').show(); //MUESTRO EL BOTON NORMAL
        $('#btnMensajeAtras').hide(); //OCUTLO EL BOTON ACEPTAR QUE REGRESA A LA TABLA ANTERIOR
        html='<i class="fa fa-times-circle fa-2x" aria-hidden="true" style="color:#bf1d1d;"></i>&nbsp' + mensaje;
    }


    $('#spanMsg').html('');
    $('#spanMsg').html(html);

    if(url != ""){
        $('#btnMensajeAtras').html('');
        $('#btnMensajeAtras').html(urlhtml);
    }

    //open the modal
    $('#msgModal').modal('show');

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