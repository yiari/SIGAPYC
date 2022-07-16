<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregispropietarios.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistropropietarios{

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

            $tabla = "propietarios";
            $modelo = new mdlregispropietarios();

            $modelo =  new mdlregispropietarios();
            $respuesta = $modelo->registrar($tabla,$datos);

            return $respuesta;

    }

    /*tabla para visializar los usuarios registrados*/

     public function seleccionarregistros(){

<<<<<<< HEAD
        $tabla = "propietarios";
        $modelo =  new mdlpropietarios();
=======
        $tabla = "users";
        $modelo =  new mdlregispropietarios();
>>>>>>> 8c825feb90a52b4eae12ec62e8037022664ad31e
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