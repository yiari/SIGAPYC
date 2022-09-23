<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/                                                  
include_once '../../../app/controladores/alquileres/ctrregistrosdocumentos.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistrosdocumentos')) 
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
 |--------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR TODOS LOS USUARIOS
 |--------------------------------------------------------------
*/

if($operacion == "C"){


    $prmid_prop = $_POST["id_prop"];
    $prmtipo = $_POST["tipo_propietario"];

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroDocumentos =  new ctrregistrosdocumentos();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroDocumentos->seleccionarregistros($prmid_prop,$prmtipo);
    
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

if($operacion == "DI"){


   $prmid_inqui = $_POST["id_inqui"];
   $prmtipo = $_POST["tipo_inquilino"];

  /*
   |-------------------------------------------
   | AQUI CREO UNA INSTANCIA DE LA CLASE
   |-------------------------------------------
   */
   
   $registroDocumentos =  new ctrregistrosdocumentos();

  /* 
  |---------------------------------------------
  | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
  |---------------------------------------------
  */
    $result = $registroDocumentos->documetoInquilino($prmid_inqui,$prmtipo);
   
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

if($operacion == "DB"){


   $prmid_bene = $_POST["id_bene"];
   $prmtipo = $_POST["tipo_beneficiario"];

  /*
   |-------------------------------------------
   | AQUI CREO UNA INSTANCIA DE LA CLASE
   |-------------------------------------------
   */
   
   $registroDocumentos =  new ctrregistrosdocumentos();

  /* 
  |---------------------------------------------
  | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
  |---------------------------------------------
  */
    $result = $registroDocumentos->documetoBeneficiario($prmid_bene,$prmtipo);
   
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

if($operacion == "DA"){


   $prmid_apod = $_POST["id_apod"];
   $prmtipo = $_POST["tipo_apoderado"];

  /*
   |-------------------------------------------
   | AQUI CREO UNA INSTANCIA DE LA CLASE
   |-------------------------------------------
   */
   
   $registroDocumentos =  new ctrregistrosdocumentos();

  /* 
  |---------------------------------------------
  | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
  |---------------------------------------------
  */
    $result = $registroDocumentos->documetoApoderado($prmid_apod,$prmtipo);
   
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

if($operacion == "DR"){


   $prmid_repre = $_POST["id_repr"];
   $prmtipo = $_POST["tipo_representante"];

  /*
   |-------------------------------------------
   | AQUI CREO UNA INSTANCIA DE LA CLASE
   |-------------------------------------------
   */
   
   $registroDocumentos =  new ctrregistrosdocumentos();

  /* 
  |---------------------------------------------
  | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
  |---------------------------------------------
  */
    $result = $registroDocumentos->documetoPresentante($prmid_repre,$prmtipo);
   
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

if($operacion == "DP"){


   $prmid_paga = $_POST["id_paga"];
   $prmtipo = $_POST["tipo_pagador"];

  /*
   |-------------------------------------------
   | AQUI CREO UNA INSTANCIA DE LA CLASE
   |-------------------------------------------
   */
   
   $registroDocumentos =  new ctrregistrosdocumentos();

  /* 
  |---------------------------------------------
  | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
  |---------------------------------------------
  */
    $result = $registroDocumentos->documetoPagador($prmid_paga,$prmtipo);
   
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

if($operacion == "DIN"){


   $prmid_inmu = $_POST["id_inmu"];
   $prmtipo = $_POST["tipo_inmueble"];

  /*
   |-------------------------------------------
   | AQUI CREO UNA INSTANCIA DE LA CLASE
   |-------------------------------------------
   */
   
   $registroDocumentos =  new ctrregistrosdocumentos();

  /* 
  |---------------------------------------------
  | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
  |---------------------------------------------
  */
    $result = $registroDocumentos->documetoInmueble($prmid_inmu,$prmtipo);
   
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

if($operacion == "DU"){


   $prmid_unid = $_POST["id_unid"];
   $prmtipo = $_POST["tipo_unidad"];

  /*
   |-------------------------------------------
   | AQUI CREO UNA INSTANCIA DE LA CLASE
   |-------------------------------------------
   */
   
   $registroDocumentos =  new ctrregistrosdocumentos();

  /* 
  |---------------------------------------------
  | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
  |---------------------------------------------
  */
    $result = $registroDocumentos->documetoUnidad($prmid_unid,$prmtipo);
   
   /*
   |-------------------------------------------
   | AQUI REGRESO EL RESULTADO AL AJAX
   |-------------------------------------------
   */
   header('Content-Type: application/json');
   return $result;
    
}







