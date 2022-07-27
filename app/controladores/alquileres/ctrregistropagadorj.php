<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistropagadorj.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistropagadorj{

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

            $tabla = "pagador_juridico";
            $modelo = new mdlregistropagadorj();

            $modelo =  new mdlregistropagadorj();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }



     


    public function eliminarinquilinoj($datos){

        $tabla = "pagador_juridico";
        $modelo =  new mdlregistropagadorj();
        $respuesta = $modelo->eliminarinquilinoj($tabla,$datos);

        return $respuesta;

    }


}