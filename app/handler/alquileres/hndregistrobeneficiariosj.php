<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistrobeneficiariosj.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistrobeneficiariosj')) 
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
    
    $registroBenefesiariosj =  new ctrregistrobeneficiariosj();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id" => $_POST["hidbeneficiarioj"],
                    "id_prop" => $_POST["id_propietarioj"],
                    "tipo_propietarioj"   =>   $_POST["tipo_propietarioj"],
                    "cod_bene" => $_POST["registroCodigoj"],
                    "mon_benej" => $_POST["registroNombrej"],
                    "rif_benej" => $_POST["registrorifj"], 
                    "act_benej" => $_POST["registroActividad"],
                    "cor_benej" => $_POST["registroEmailj"],
                    "cel_benej" => $_POST["registroCelularj"],
                    "dir_benej" => $_POST["registroDirecionHj"],
                    "tipo_persona" => $_POST["tipo_personaj"],
                
                   /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS BANCOS NACIONALES
                   |------------------------------------------
                   */
                  "cuenta_id_nacionalj" => $_POST["hidcuenta_id_nacionalj"],
                  "id_bancoj" => $_POST["cboBancoj"],
                  "num_cuenta_nacionalj" => $_POST["num_cuenj"],

                  "pagomovil_cedulaj" => $_POST["ced_pmovj"],
                  "pagomovil_id_bancoj" => $_POST["cboBancop"],
                  "pagomovil_telefonoj" => $_POST["cel_pmovj"],
                
                  /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS BANCOS INTERNACIONALES
                   |------------------------------------------
                   */
                  "cuenta_id_internacional" => $_POST["hidcuenta_id_internacionalj"],
                  "ban_extrj" => $_POST["ban_extrj"],
                  "age_extrj" => $_POST["age_extrj"],
                  "dc_extrj" => $_POST["dc_extrj"],
                  "cue_extrj" => $_POST["cue_extrj"],
                  "iba_extrj" => $_POST["iba_extrj"],
                  "bic_extrj" => $_POST["bic_extrj"],


                   /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE PAYPAL
                   |------------------------------------------
                   */
                  "cuenta_id_paypalj" => $_POST["hidcuenta_id_paypalj"],
                  "cor_paypj" => $_POST["cor_paypj"],
                  "nom_paypj" => $_POST["nom_paypj"],


                  /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE ZELLE
                   |------------------------------------------
                   */
                  "cuenta_id_zelle" => $_POST["hidcuenta_id_zelle"],
                  "tel_zellej" => $_POST["tel_zellj"],
                  "cor_zellej" => $_POST["cor_zellj"],
                  "nom_zellej" => $_POST["nom_zellj"]);

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
     $result = $registroBenefesiariosj->registrar($datos,$AchivosCargados);
    
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
 | AQUI SE EJECUTA LA OPERACION ELIMINAR USUARIO
 |--------------------------------------------------------------
*/

if($operacion == "D"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroPropietario =  new ctrregistropropietarios();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
  $datos = array( "id_prop" => $_POST["id_prop"]);
   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
   $result = $registroPropietario->eliminarpropietario($datos);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}
