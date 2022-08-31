<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistromandato.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistromandato{

    //protected string $tabla;

    public function __construct()
    {
        /*
        |-------------------------------------------------
        | ESTO ES UN CONSTRUCTOR CUANDO SE CREA LA CLASE 
        |-------------------------------------------------
        */ 
    }

     

    /*tabla para visializar los cobradores registrados*/

     public function seleccionarregistros($prmidinmu){

        $tabla = "mandato";
        $modelo =  new mdlregistromandatos();
        $respuestas =  $modelo->seleccionarregistros($prmidinmu);
        return $respuestas;
    }




    public function eliminarpropietario($datos){

        $tabla = "users";
        $modelo =  new mdlregisbenficiario();
        $respuesta = $modelo->eliminarpropietario($tabla,$datos);

        return $respuesta;

    }


}