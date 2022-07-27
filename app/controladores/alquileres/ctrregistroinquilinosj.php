<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistroinquilinosj.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistroinquilinoj{

    //protected string $tabla;

    public function __construct()
    {
        /*
        |-------------------------------------------------
        | ESTO ES UN CONSTRUCTOR CUANDO SE CREA LA CLASE 
        |-------------------------------------------------
        */ 
    }

     public function registrar($datos,$archivos){

            $tabla = "inquilino_juridico";
            $modelo = new mdlregistroinquilinosj();

            $modelo =  new mdlregistroinquilinosj();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los usuarios registrados*/

     public function seleccionarregistros(){

        $tabla = "inquilino_juridico";
        $modelo =  new mdlregistroinquilinosj();
        $respuestas =  $modelo->seleccionarregistros($tabla,null,null);
        return $respuestas;
    }


     


    public function eliminarinquilinoj($datos){

        $tabla = "inquilino_juridico";
        $modelo =  new mdlregistroinquilinosj();
        $respuesta = $modelo->eliminarinquilinoj($tabla,$datos);

        return $respuesta;

    }


}