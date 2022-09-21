<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistrorecibopedido.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrorecibopedido{

    //protected string $tabla;

    public function __construct()
    {
        /*
        |-------------------------------------------------
        | ESTO ES UN CONSTRUCTOR CUANDO SE CREA LA CLASE 
        |-------------------------------------------------
        */ 
    }


    /*tabla para visializar los usuarios registrados*/

     public function seleccionarregistros(){

        $tabla = "recibo_pedido";
        $modelo =  new mdlregistrorecibopedido();
        $respuestas =  $modelo->seleccionarregistros($tabla,null,null);
        return $respuestas;
    }


    


    public function eliminarpropietario($datos){

        $tabla = "users";
        $modelo =  new mdlregispropietarios();
        $respuesta = $modelo->eliminarpropietario($tabla,$datos);

        return $respuesta;

    }


}