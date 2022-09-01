<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistroavisocobro.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistroavisocobro')) 
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR TODOS LOS USUARIOS
 |--------------------------------------------------------------
*/

if($operacion == "C"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroaviso =  new ctrregistroavisocobro();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */

   $parametro = "";
   $estatus = 0;

   if(isset($_POST["nom_inqu"])){
      $parametro = $_POST["nom_inqu"];
   } 


   if(isset($_POST["estatus"])){
      $estatus = $_POST["estatus"];
   } 


    $datos = array(
         "nom_inqu"=> $parametro,
         "estatus"=> $estatus
   );

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroaviso->seleccionarregistros($datos);
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR DEL PROPIETARIO
 |--------------------------------------------------------------
*/

if($operacion == "GC"){



   $datos = array( 
      "id_inqu" => $_POST["idinquilino"],
      //"inquilino" => $_POST["codigoinquilino"],
      "tipo_inqu" => $_POST["tipoInquilino"]
   );



   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroaviso =  new ctrregistroavisocobro();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroaviso->consultarinquilino($datos);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
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
    
    $registroaviso =  new ctrregistroavisocobro ();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id_respuesta"  => $_POST["hidrespuesta"],
                    "id_aviso"  => $_POST["id_aviso"],
                    "respuesta" => $_POST["registrorespuesta"],);




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
               $result = $registroaviso->registrar($datos,$AchivosCargados);
               
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
