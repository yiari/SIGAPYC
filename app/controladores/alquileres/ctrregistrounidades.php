<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistrounidades.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrounidades{

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

            $tabla = "inmuebles";
            $modelo = new mdlregistrounidades();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los inquiilonos registrados*/

     public function seleccionarregistros($prmidinmu){

        $tabla = "inmuebles";
        $modelo =  new mdlregistrounidades();
        $respuestas =  $modelo->seleccionarregistros($tabla,$prmidinmu);
        return $respuestas;
    }


    public function consultaunidad($datos){

        $tabla = "unidades_inmuebles";
        $modelo =  new mdlregistrounidades();
        $respuestas =  $modelo->consultaunidad($tabla,$datos);
        return $respuestas;
    }


     


    public function eliminarinquilino($datos){

        $tabla = "inquilino";
        $modelo =  new mdlregistroinquilinos();
        $respuesta = $modelo->eliminarinquilino($tabla,$datos);

        return $respuesta;

    }



    public function consultabitacoraUnidad($datos){

        $tabla = "unidades_inmuebles";
        $modelo =  new mdlregistrounidades();
        $respuestas =  $modelo->consultabitacoraUnidad($tabla,$datos);
        return $respuestas;
    }


}