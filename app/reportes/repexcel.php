<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/

include_once '../../app/clases/clsreportepedidos.php';

/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('clsreportepedidos')) 
{
   //$o_miClase = new ctrregistrousuarios();
}
else
{

   $dataRes = array(
      'error' => '1',
      'mensaje' =>  "Error en la clase reporte excel, no se ha cargado correctamente."
    );

    return json_encode($dataRes);
}


/*
|-----------------------------------------------------------------------------------
| AQUI CREO UNA INSTANCIA DE LA CLASE ENVIO LOS PARAMETROS QUE NECESITA EL REPORTE
|-----------------------------------------------------------------------------------
*/

$nombreArchivo = "reportepedidos";
$fechaArchivo = date('d-m-y');


$reportepedidos =  new clsreportepedidos("Reporte de Prueba",0, $nombreArchivo . "_" .  $fechaArchivo . ".xlsx");

$reportepedidos->armarReporte();