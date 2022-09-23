<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistrounidades.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistrounidades')) 
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
    
    $registroUnidades =  new ctrregistrounidades();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id_unid"   => $_POST["hidunidad"],
                    "id_inmu"    => $_POST["id_inmu"],
                    "cod_inmu"   => $_POST["registroCodigo"],
                    "tip_inmu"   => $_POST["cboinmueble"],
                    "act_inmu"   => $_POST["registroUso"],
                    "ant_inmu"   => $_POST["registroAntiguedad"],
                    "cod_esta"   => $_POST["cboEstados"],
                    "cod_muni"   => $_POST["cboMunicipios"],
                    "cod_parr"   => $_POST["cboParroquia"],
                    "dir_inmu"   => $_POST["registroDirecionH"],
                    "pun_inmu"   => $_POST["pun_inmu"],
                    "equ_inmu"   => $_POST["equ_inmu"],
                    "mtr_inmu"   => $_POST["mtr_inmu"],
                    "mtr_cons"   => $_POST["mtr_cons"],
                    "hab_inmu"   => $_POST["hab_inmu"],
                    "ban_inmu"   => $_POST["ban_inmu"],
                    "est_inmu"   => $_POST["est_inmu"],
                    "ser_inmu"   => $_POST["ser_inmu"],
                    "lim_nort"   => $_POST["lim_nort"],
                    "lim_sur"    => $_POST["lim_sur"],
                    "lim_este"   => $_POST["lim_este"],
                    "lim_oest"   => $_POST["lim_oest"],
                    "nom_regi"   => $_POST["nom_regi"],
                    "fec_regi"   => $_POST["fec_regi"],
                    "tom_regi"   => $_POST["tom_regi"],
                    "fol_regi"   => $_POST["fol_regi"],
                    "asi_regi"   => $_POST["asi_regi"],
                    "fic_cata"   => $_POST["fic_cata"],
                    "num_regi"   => $_POST["num_regi"],
                    "tipo_persona"   => $_POST["tipo_persona"],
                    "posee_beneficiario" => $_POST["cbobeneficiarios"],
                    "letra" => $_POST["registroletra"],

                     /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS GASTOS FIJOS
                   |------------------------------------------
                   */
                  "id_gastos" => $_POST["hid_gastos"],
                  "gasto_admi" => $_POST["gasto_admi"],
                  "gasto_papel" => $_POST["gasto_papel"],
                   "iva" => 16,
                   "isrl" => 3,


                    /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS GASTOS FIJOS
                   |------------------------------------------
                   */
                     "id_gesp" => $_POST["hidgastos_especial"],
                     "servicio" => $_POST["servicio"],
                     "monto" => $_POST["monto"],
                     "id_banco" => $_POST["cboBancoNP"],
                     "num_cuenta" => $_POST["num_cuenta"],
                     "cedula" => $_POST["cedula"]);

                     $fecha = str_replace("-","",$_POST["fec_regi"]);
                  
                     //echo json_encode($fecha);
                     // die;

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
     $result = $registroUnidades->registrar($datos,$AchivosCargados);
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR TODOS LOS INQUILINOS
 |--------------------------------------------------------------
*/

if($operacion == "C"){


   $prmid_inmu = $_POST["id_inmu"];

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroUnidades =  new ctrregistrounidades();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroUnidades->seleccionarregistros($prmid_inmu);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    if (!headers_sent()) {
      //AGREGAR CABECERA SI NO LA TIENE
      header('Content-Type: application/json');
} 
     return $result;
     
}



/* 
 |--------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR DEL Beneficiario
 |--------------------------------------------------------------
*/

if($operacion == "CU"){



   $datos = array( 
      "id_unid" => $_POST["idUnidad"],
      "cod_unid" => $_POST["codigoUnidad"],
     
   );

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroInmueble =  new ctrregistrounidades();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroInmueble->consultaunidad($datos);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}
