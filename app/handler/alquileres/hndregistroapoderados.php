<?php


/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistroapoderados.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';




/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistroapoderado')) 
{
   //$o_miClase = new ctrregistrousuarios();
}
else
{

   $dataRes = array(
      'error' => '1',
      'mensaje' =>  "La clase Registros, no se ha cargado correctamente "
    );

    return json_encode($dataRes);
}


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrcapturararchivos')) 
{
   //$o_miClase = new ctrregistrousuarios();
}
else
{

   $dataRes = array(
      'error' => '1',
      'mensaje' =>  "La clase para el manejo de archivos, no se ha cargado correctamente "
    );

    return json_encode($dataRes);
}



/*
|-------------------------------------------------
| AQUI VALIDO SI LOS PARAMETROS FUERON RECIBIDOS
|-------------------------------------------------
*/
$continuar = false;
$operacion = "";

if(isset($_POST["opcion"])) {
     $continuar = true;
     $operacion = $_POST["opcion"];
} else {
   $continuar = false;
   
   $dataRes = array(
      'error' => '1',
      'mensaje' =>  "Faltan parametros para continuar la operación."
    );

    return json_encode($dataRes);
}
   

/* 
 |-------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE INSERTAR
 |-------------------------------------------
*/

if($operacion == "I"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroApoderado =  new ctrregistroapoderado();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id_apod"  => $_POST["hidapoderado"],
                    "id_prop"  => $_POST["id_prop"],
                    "cod_apod" => $_POST["registroCodigo"],
                    "nom_apod" => $_POST["registroNombre"],
                    "ape_apod" => $_POST["registroApellido"],
                    "nac_apod" => $_POST["registroNacionalidad"],
                    "ci_apod"  => $_POST["registroCedula"],
                    "rif_apod" => $_POST["registroRif"],
                    "loc_apod" => $_POST["registroTelefono"],
                    "cel_apod" => $_POST["registroCelular"],  
                    "cor_apod" => $_POST["registroEmail"],
                    "est_apod" => $_POST["cboEstados"],                 
                    "mun_apod" => $_POST["cboMunicipios"],
                    "par_apod" => $_POST["cboParroquia"],
                    "dir_apod" => $_POST["registroDirecionH"],
                    "ofi_apod" => $_POST["registroDirecionO"],
                    "tip_apod" => $_POST["tipo_persona"],
                    "cod_pode" => $_POST["cod_pode"],
                    "not_pode" => $_POST["not_pode"],
                    "fec_pode" => $_POST["fec_pode"],
                    "num_pode" => $_POST["num_pode"],
                    "tom_pode" => $_POST["tom_pode"],
                    "fol_pode" => $_POST["fol_pode"],
                   /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS BANCOS NACIONALES
                   |------------------------------------------
                   */
                  "cuenta_id_nacional" => $_POST["hidcuenta_id_nacional"],
                  "cuenta_id_banco" => $_POST["cboBancoN"],
                  "num_cuenta_nacional" => $_POST["num_cuen"],

                  "pagomovil_cedula" => $_POST["ced_pmov"],
                  "pagomovil_id_banco" => $_POST["cboBancoNP"],
                  "pagomovil_telefono" => $_POST["cel_pmov"],
                
                                     /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS BANCOS INTERNACIONALES
                   |------------------------------------------
                   */
                  "cuenta_id_internacional" => $_POST["hidcuenta_id_internacional"],
                  "ban_extr" => $_POST["ban_extr"],
                  "age_extr" => $_POST["age_extr"],
                  "dc_extr" => $_POST["dc_extr"],
                  "cue_extr" => $_POST["cue_extr"],
                  "iba_extr" => $_POST["iba_extr"],
                  "bic_extr" => $_POST["bic_extr"]);



      //echo json_encode($datos);
     //die;


         /*
         |-------------------------------------------------------------------------------------------------------------
         | AQUI PASO LA RUTA DE LOS DOCUMENTOS
         |-------------------------------------------------------------------------------------------------------------
         |
         | CUANDO SE PASAN DOCUMENTOS O ARCHIVOS, SIEMPRE SE DEBEN CAPTURAR DOS DATOS, POR CADA CAMPO ARCHIVO
         |
         | EJEMPLO: SI EL CAMPO SE LLAMA [cedu_docu] entonces se deben capturar los dos datos
         |  $_FILES['cedu_docu']['name']; -> Este es el nombre real del archivo
         |  $_FILES['cedu_docu']['tmp_name']; -> Este es un nombre temporal que se crea cuando se carga el archivo
         |-------------------------------------------------------------------------------------------------------------
         */
                     
                  $capturarArchivos =  new ctrcapturararchivos();

                  $AchivosCargados = $capturarArchivos->GetPostedFiles();

                  // echo $resultado;


               /* 
               |---------------------------------------------
               | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
               |---------------------------------------------
               */
               $result = $registroApoderado->registrar($datos,$AchivosCargados);
               
               /*
               |-------------------------------------------
               | AQUI REGRESO EL RESULTADO AL AJAX
               |-------------------------------------------
               */
               header('Content-Type: application/json');
               return $result;
               
            }


/* 
 |--------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR TODOS LOS USUARIOS
 |--------------------------------------------------------------
*/

if($operacion == "C"){


     $prmid_prop = $_POST["id_prop"];

    /*
     |-------------------------------------------
     | AQUI CREO UNA INSTANCIA DE LA CLASE
     |-------------------------------------------
     */
     
     $registroApoderado =  new ctrregistroapoderado();
 
    /* 
    |---------------------------------------------
    | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
    |---------------------------------------------
    */
      $result = $registroApoderado->seleccionarregistros($prmid_prop);
     
     /*
     |-------------------------------------------
     | AQUI REGRESO EL RESULTADO AL AJAX
     |-------------------------------------------
     */
     header('Content-Type: application/json');
      return $result;
      
 }