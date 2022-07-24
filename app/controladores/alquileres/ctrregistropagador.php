<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistropagador.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistropagador{

    //protected string $tabla;

    public function __construct()
    {
        /*
        |-------------------------------------------------
        | ESTO ES UN CONSTRUCTOR CUANDO SE CREA LA CLASE 
        |-------------------------------------------------
        */ 
    }

     public function registrar($datos){

            $tabla = "pagador";
            $modelo = new mdlregistropagador();

            $modelo =  new mdlregistropagador();
            $respuesta = $modelo->registrar($tabla,$datos);

            return $respuesta;

    }

    /*tabla para visializar los apoderados registrados*/

     public function seleccionarregistros(){

        $tabla = "pagador";
        $modelo =  new mdlregistropagador();
        $respuestas =  $modelo->seleccionarregistros($tabla,null,null);
        return $respuestas;
    }


     


    public function eliminarinquilino($datos){

        $tabla = "inquilino";
        $modelo =  new mdlregistroinquilinos();
        $respuesta = $modelo->eliminarinquilino($tabla,$datos);

        return $respuesta;

    }


}