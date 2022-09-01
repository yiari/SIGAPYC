<?php


/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistrogestioncliente.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';




/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistrogestioncliente')) 
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
    
    $registrorespuestas =  new ctrregistrogestioncliente();

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
               $result = $registrorespuestas->registrar($datos,$AchivosCargados);
               
               /*
               |-------------------------------------------
               | AQUI REGRESO EL RESULTADO AL AJAX
               |-------------------------------------------
               */
               header('Content-Type: application/json');
               return $result;
               
            }




 