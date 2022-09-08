<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistroinmueble.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistroinmueble')) 
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
    
    $registroInmueble =  new ctrregistroinmueble();



if (isset($_POST["chkunidades"])){

    /*
   |---------------------------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR (INMUEBLE CON UNIDADES)
   |---------------------------------------------------------------
   */

  $datos = array(   "id_inmu"   => $_POST["hidinmueble"],
                     "id_prop"    => $_POST["id_prop"],
                     "tipo_propietario"    => $_POST["tipo_propietario"],
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
                     "lim_sur"    =>  $_POST["lim_sur"],
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

                        /*
                     |------------------------------------------
                     | AQUI VAN LOS DATOS DE LOS GASTOS FIJOS
                     |------------------------------------------
                     */
                     "id_gastos" => $_POST["hid_gastos"],
                     "gasto_administrativo" => $_POST["gasto_admi"],
                     "gastos_papeleria" => $_POST["gasto_papel"],
                     "tieneunidades" => 1,
                     "unidades" => $_POST["unidades"],
                     "posee_beneficiario" => $_POST["cbobeneficiarios"]
                  
                  );

} else {

   /*
   |---------------------------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR (INMUEBLE SIN UNIDADES)
   |---------------------------------------------------------------
   */

    $datos = array( "id_inmu"   => $_POST["hidinmueble"],
                    "id_prop"    => $_POST["id_prop"],
                    "tipo_propietario"    => $_POST["tipo_propietario"],
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
                    "lim_sur"    =>  $_POST["lim_sur"],
                    "lim_este"   => $_POST["lim_este"],
                    "lim_oest"   => $_POST["lim_oest"],
                    "nom_regi"   => $_POST["nom_regi"],
                    "fec_regi"   => $_POST["fec_regi"],
                    "tom_regi"   => $_POST["tom_regi"],
                    "fol_regi"   => $_POST["fol_regi"],
                    "asi_regi"   => $_POST["asi_regi"],
                    "fic_cata"   => $_POST["fic_cata"],
                    "num_regi"   => $_POST["num_regi"],
                    "letra"   => $_POST["registroletra"],
                    "tipo_persona"   => $_POST["tipo_persona"],

                     /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS GASTOS FIJOS
                   |------------------------------------------
                   */
                  "id_gastos" => $_POST["hid_gastos"],
                  "gasto_administrativo" => $_POST["gasto_admi"],
                  "gastos_papeleria" => $_POST["gasto_papel"],
                  "tieneunidades" => 0,
                  "unidades" => 0,
                  "posee_beneficiario" => $_POST["cbobeneficiarios"]
               );


}


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
     $result = $registroInmueble->registrar($datos,$AchivosCargados);
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR INMUEBLES
 |--------------------------------------------------------------
*/

if($operacion == "C"){


   $datos = array( 
      "id_prop"   => $_POST["id_prop"],
      "tipo_propietario"   => $_POST["tipo_propietario"]
   );

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroInmueble =  new ctrregistroinmueble();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroInmueble->seleccionarregistros($datos);
    
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
 |----------------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LOS INMUEBLES SIN UNINDAES
 |---------------------------------------------------------------------
*/

if($operacion == "CIS"){


   $datos = array( 
      "id_prop"   => $_POST["id_prop"],
      "tipo_propietario"   => $_POST["tipo_propietario"]
   );

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroInmueble =  new ctrregistroinmueble();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroInmueble->consultainmueblesinunidades($datos);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}



/* 
 |----------------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LOS INMUEBLES SIN UNINDAES
 |---------------------------------------------------------------------
*/

if($operacion == "CIC"){


   $datos = array( 
      "id_prop"   => $_POST["id_prop"],
      "tipo_propietario"   => $_POST["tipo_propietario"]
   );

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroInmueble =  new ctrregistroinmueble();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroInmueble->consultainmuebleconunidades($datos);
    
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

if($operacion == "BI"){

   $prmid_prop = $_POST["id_prop"];
   $prmTipoProp = $_POST["tipo_propietario"];

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroInmueble =  new ctrregistroinmueble();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroInmueble->seleccionarBeneficiario($prmid_prop,$prmTipoProp);
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR DEL Beneficiario
 |--------------------------------------------------------------
*/

if($operacion == "CI"){



   $datos = array( 
      "id_inmu" => $_POST["idInmueble"],
      "cod_inmu" => $_POST["codigoInmueble"],
     
   );

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroInmueble =  new ctrregistroinmueble();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroInmueble->consultainmueble($datos);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}


