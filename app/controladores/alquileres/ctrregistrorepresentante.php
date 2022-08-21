<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistrorepresentante.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrorepresentante{

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

            $tabla = "representante";
            $modelo = new mdlregistrorepresentante();

            $modelo =  new mdlregistrorepresentante();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los apoderados registrados*/

     public function seleccionarregistros($id_prop){

        $tabla = "representante";
        $modelo =  new mdlregistrorepresentante();
        $respuestas =  $modelo->seleccionarregistros($tabla,$id_prop);
        return $respuestas;
    }


    public function consultarRepresentante($datos){

        $tabla = "representante";
        $modelo =  new mdlregistrorepresentante();
        $respuestas =  $modelo->consultarRepresentante($tabla,$datos);
        return $respuestas;
    }

     


    public function eliminarinquilino($datos){

        $tabla = "inquilino";
        $modelo =  new mdlregistroinquilinos();
        $respuesta = $modelo->eliminarinquilino($tabla,$datos);

        return $respuesta;

    }


}