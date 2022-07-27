<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistroinmuebles.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistroinmueble{

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
            $modelo = new mdlregistroinmueble();

            $modelo =  new mdlregistroinmueble();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los inquiilonos registrados*/

     public function seleccionarregistros(){

        $tabla = "inmuebles";
        $modelo =  new mdlregistroinmueble();
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