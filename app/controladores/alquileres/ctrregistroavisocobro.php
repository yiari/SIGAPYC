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

        $tabla = "gestion_respuesta";
        $modelo = new mdlregistroavisocobro();

        $modelo =  new mdlregistroavisocobro();
        $respuesta = $modelo->registrar($tabla,$datos,$archivos);

        return $respuesta;

    }


    public function registrarabono($datos,$archivos){

        $tabla = "gestion_respuesta";
        $modelo = new mdlregistroavisocobro();

        $modelo =  new mdlregistroavisocobro();
        $respuesta = $modelo->registrarabono($tabla,$datos,$archivos);

        return $respuesta;

    }



    public function registroReciboPedido($datos){

        $tabla = "gestion_respuesta";
        $modelo =  new mdlregistroavisocobro();
        $respuesta = $modelo->registroReciboPedido($datos);

        return $respuesta;

    }



    public function consultarinquilino($datos){

        $tabla = "propietarios";
        $modelo =  new mdlregistroavisocobro();
        $respuestas =  $modelo->consultarinquilino($tabla,$datos);
        return $respuestas;
    }

    public function consultartasa($datos){

        $tabla = "tasa_cambio";
        $modelo =  new mdlregistroavisocobro();
        $respuestas =  $modelo->consultartasa($tabla,$datos);
        return $respuestas;
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