<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/

include_once '../../../app/modelos/conexcion.php';


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
 | AQUI VALIDO LA OPCION ENVIADA
 |-------------------------------------------
*/

if($operacion == "codigoPropietario" || $operacion == "codigoApoderado" || $operacion == "codigoRepresentante"|| $operacion == "codigoBeneficiario" || $operacion == "codigoInquilino" || $operacion == "codigoPagador" || $operacion == "codigoInmueble" || $operacion == "codigoUnidad" || $operacion == "codigoCobrador"){

        /* 
        |------------------------------------------------------------
        | AQUI DECLARO LA VARIABLE - INSTANCIA DEL METODO CONEXION
        |------------------------------------------------------------
        */
        $dbConexion = new conexcion();
        /* 
        |------------------------------------------------------------------------------------------------
        | AQUI DECLARO LA VARIABLES QUE CAPTURARAN EL RESULTADO DE LA OPERAION PARA INFORMAR AL USUARIO
        |------------------------------------------------------------------------------------------------
        */
        $prmError = 0;
        $prmMensaje = "";
        $prmRespuesta = 0;
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_getcodigosregistros(?)");
          $stmt -> bindParam(1, $operacion, PDO::PARAM_STR); //ESTE ES EL ID DEL PROPIETARIO
          $stmt->execute();

          $resultado = $stmt->fetchAll();


          if (count($resultado) >0){

            foreach ($resultado as $key=> $row) {

                  $prmRespuesta = $row[0]; //AQUI OBTENGO EL ID DEL PROPIETARIO
              
              }
            }
        
            $dataRes = array('valor' => ($prmRespuesta + 1));

          echo json_encode($dataRes);


} 


?>