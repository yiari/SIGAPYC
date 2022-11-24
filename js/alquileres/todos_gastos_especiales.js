function inicio(){


    GastosEspeciales();


}




function GastosEspeciales(){

    /*
    |-----------------------------------------------------
    | AQUI SE AGREGA UN PARAMETRO ADICIONAL AL FORMULARIO 
    |-----------------------------------------------------
    */
    var formData = new FormData();

    formData.append('opcion','C');

    //formData.append('id_inmu',prminmu);
   
  
    /*
    |-----------------------------------------------
    | AQUI SE LLAMA EL AJAX 
    |-----------------------------------------------
    */
    $.ajax({
        url: "app/handler/alquileres/hndregistrogastosespeciales.php",
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

                    if(json.Items[0].length > 0){
                        for (var i = 0; i < json.Items[0].length; i++) {
                
                       // if (isEmpty(json.Items[0][i]) == false) {
                            tr = $('<tr/>');
                            
                            tr.append("<td>" + (i+1) + "</td>");
                            tr.append("<td>" + json.Items[0][i].mes_gasto + "</td>");
                            tr.append("<td>" + json.Items[0][i].inmueble + "</td>");
                            tr.append("<td>" + json.Items[0][i].concepto + "</td>");
                            tr.append("<td>" + json.Items[0][i].monto + "</td>");
                            tr.append("<td>" + json.Items[0][i].fecha + "</td>"); 
                            
                            var html="";
                            html = '<div class="btn-group">';
                            html += '<button class=" delete" data-field-id="' + json.Items[0][i].id_gesp + '"><i class="fa fa-trash" ></i>&nbsp;</button>';
                            html += '</div>'
                            tr.append("<td>" + html + "</td>");
                            $('#gastosEspeciales').append(tr);
                        //}
                    }


                }else {

                    var tr;
                    tr = $('<tr/>');
                    tr.append("<td colspan=6 style='text-align:center'>NO HAY INFORMACION REGISTRADA</td>");
                    $('#gastosEspeciales').append(tr);

                    }

                

                   /*
                    ***********************
                    ASI ERA ORIGINALMENTE
                    ************************
                    new simpleDatatables.DataTable("#gastosEspeciales");
                    */

                    $('#gastosEspeciales').DataTable(
                        {
                            language: {
                                url: '//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json'
                            }
                            
                        }
                    );

            } 
                /************************************************ */


        },
        error: function (e) {
            $("#error").html(e).fadeIn();
        }
    });

}



$(document).ready(function() {


    inicio();



});