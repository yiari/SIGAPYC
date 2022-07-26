<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/comunes/ctrcombos.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrcombos')) 
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LOS ESTADOS
 |--------------------------------------------------------------
*/

if($operacion == "estados"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $combo =  new ctrcombos();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $combo->getestados();
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LOS MUNICIPIOS
 |--------------------------------------------------------------
*/

if($operacion == "municipios"){


    $idestado = $_POST["idestado"];

    /*
     |-------------------------------------------
     | AQUI CREO UNA INSTANCIA DE LA CLASE
     |-------------------------------------------
     */
     
     $combo =  new ctrcombos();
 
    /* 
    |---------------------------------------------
    | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
    |---------------------------------------------
    */
      $result = $combo->getmunicipios($idestado);
     
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LAS PARROQUIAS
 |--------------------------------------------------------------
*/

if($operacion == "parroquia"){


    $idmunicipio = $_POST["idmunicipio"];

    /*
     |-------------------------------------------
     | AQUI CREO UNA INSTANCIA DE LA CLASE
     |-------------------------------------------
     */
     
     $combo =  new ctrcombos();
 
    /* 
    |---------------------------------------------
    | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
    |---------------------------------------------
    */
      $result = $combo->getparroquias($idmunicipio);
     
     /*
     |-------------------------------------------
     | AQUI REGRESO EL RESULTADO AL AJAX
     |-------------------------------------------
     */
     header('Content-Type: application/json');
      return $result;
      
 }


 /* 
 |------------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LOS bANCOS nACIONALES
 |------------------------------------------------------------------
*/

if($operacion == "banco"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $combo =  new ctrcombos();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $combo->getbancos();
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */

    // header('Content-Type: application/json');
     return $result;
     
}



/* 
 |--------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LOS ESTADOS
 |--------------------------------------------------------------
*/

if($operacion == "representante"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $combo =  new ctrcombos();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $combo->getrepresentante();
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LOS TIPO INMUEBLES
 |--------------------------------------------------------------
*/

if($operacion == "tipoinmueble"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $combo =  new ctrcombos();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $combo->gettipoinmueble();
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR LOS INQUILINOS
 |--------------------------------------------------------------
*/

if($operacion == "inquilino"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $combo =  new ctrcombos();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $combo->getinquilinos();
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}
