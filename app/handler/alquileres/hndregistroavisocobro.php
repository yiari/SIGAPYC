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
      //"registroCodigo" => $_POST["registroCodigo"],
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

if($operacion == "TC"){



   $datos = array( 
      "cambio" => $_POST["cambio"],
     
   );



   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registrotasa =  new ctrregistroavisocobro();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registrotasa->consultartasa($datos);
    
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
                    "respuestas" => $_POST["registrorespuesta"],
                    "id_usuario" => $_POST["id_usuario"],);
                    



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
 |-------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE INSERTAR
 |-------------------------------------------
*/

if($operacion == "IA"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroaviso =  new ctrregistroavisocobro ();

if (isset($_POST["chktranferencia"])&& isset($_POST["chkpagomovil"])){



               $datos = array( "id_abono"  => $_POST["hidabono"],
               "id_aviso"  => $_POST["id_aviso"],

               "id_inqu"  => $_POST["id_inquilino"],
               "id_inmu"  => $_POST["id_inmueble"],
               "id_unid"  => $_POST["id_unidad"],

               "id_usuario" => $_POST["id_usuario"],
               "transferencia" => 1,
               "pago_movil" => 1,
               
               "id_transfe" => $_POST["id_tranferencia"],
               "id_banco" => $_POST["cboBancoNP"],
               "referencia" => $_POST["referencia"],
               "monto" => $_POST["monto"],
            
               "id_movil" => $_POST["id_movil"],
               "id_banco_movil" => $_POST["cboBancoj"],
               "operacion" => $_POST["operacion"],
               "monto_movil" => $_POST["monto_movil"]
            
               );

} elseif (isset($_POST["chktranferencia"])){
   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id_abono"  => $_POST["hidabono"],
                    "id_aviso"  => $_POST["id_aviso"],

                    "id_inqu"  => $_POST["id_inquilino"],
                     "id_inmu"  => $_POST["id_inmueble"],
                     "id_unid"  => $_POST["id_unidad"],

                    "id_usuario" => $_POST["id_usuario"],
                    "transferencia" => 1,
                    "pago_movil" => 0,
                    
                    "id_transfe" => $_POST["id_tranferencia"],
                    "id_banco" => $_POST["cboBancoNP"],
                    "referencia" => $_POST["referencia"],
                    "monto" => $_POST["monto"],
                  
                    "id_movil" => 0,
                    "id_banco_movil" => 0,
                    "operacion" => 0,
                    "monto_movil" => 0
                  
                     );
                    
} elseif(isset($_POST["chkpagomovil"])) {


   $datos = array( "id_abono"  => $_POST["hidabono"],
                    "id_aviso"  => $_POST["id_aviso"],

                     "id_inqu"  => $_POST["id_inquilino"],
                     "id_inmu"  => $_POST["id_inmueble"],
                     "id_unid"  => $_POST["id_unidad"],

                    "id_usuario" => $_POST["id_usuario"],
                    "transferencia" => 0,
                    "pago_movil" => 1,

                    "id_transfe" => 0,
                    "id_banco" => 0,
                    "referencia" =>'',
                    "monto" => 0,
                  
                    "id_movil" => $_POST["id_movil"],
                    "id_banco_movil" => $_POST["cboBancoj"],
                    "operacion" => $_POST["operacion"],
                    "monto_movil" => $_POST["monto_movil"]);

}


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
               $result = $registroaviso->registrarabono($datos,$AchivosCargados);
               
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

if($operacion == "RP"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroaviso =  new ctrregistroavisocobro ();

   $datos = array( "id"  => $_POST["hidrecibo"],
                   "id_aviso"  => $_POST["id_aviso"],
                   "id_inqu"  => $_POST["id_inqu"],
                   "id_inmu"  => $_POST["id_inmu"],
                   "id_unid"  => $_POST["id_unid"],

                   "cod_aviso"  => $_POST["codigo"],
                   "cod_recibo"  => $_POST["cod_recibo"],
                   "cod_pedido"  => $_POST["cod_pedido"],

                   "tipo_inqu"  => $_POST["tipo_inqu"],

                   "fecha"  => $_POST["fecha"],
                   "mes"  => $_POST["mes"],
                   "mensualidad" => $_POST["monto"],
                   "monto_recibo" => $_POST["recibo"],
                   "monto_pedido" => $_POST["pedido"],

                   "id_usuario" => $_POST["id_usuario"] );



               /* 
               |---------------------------------------------
               | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
               |---------------------------------------------
               */
               $result = $registroaviso->registroReciboPedido($datos);
               
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
