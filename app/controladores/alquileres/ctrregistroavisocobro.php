<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistroavisocobro.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistroavisocobro{

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

            $tabla = "propietarios";
            $modelo = new mdlregispropietarios();

            $modelo =  new mdlregispropietarios();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los usuarios registrados*/

     public function seleccionarregistros($datos){

        $tabla = "aviso_cobro";
        $modelo =  new mdlregistroavisocobro();
        $respuestas =  $modelo->seleccionarregistros($tabla,$datos);
        return $respuestas;
    }


    
    
     


    public function eliminarpropietario($datos){

        $tabla = "users";
        $modelo =  new mdlregispropietarios();
        $respuesta = $modelo->eliminarpropietario($tabla,$datos);

        return $respuesta;

    }


}