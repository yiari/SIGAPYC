<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistroapoderado.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistroapoderado{

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

            $tabla = "apoderado";
            $modelo = new mdlregistroapoderado();

            $modelo =  new mdlregistroapoderado();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los apoderados registrados*/

     public function seleccionarregistros($id_prop){

        $tabla = "apoderado";
        $modelo =  new mdlregistroapoderado();
        $respuestas =  $modelo->seleccionarregistros($tabla,$id_prop);
        return $respuestas;
    }


    public function consultarApoderado($datos){

        $tabla = "propietarios";
        $modelo =  new mdlregistroapoderado();
        $respuestas =  $modelo->consultarApoderado($tabla,$datos);
        return $respuestas;
    }


     


    public function eliminarinquilino($datos){

        $tabla = "inquilino";
        $modelo =  new mdlregistroinquilinos();
        $respuesta = $modelo->eliminarinquilino($tabla,$datos);

        return $respuesta;

    }


}