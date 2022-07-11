<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/admin/mdlregistrousuarios.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrousuarios{

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

            $tabla = "users";
            $modelo = new mdlregistrousuarios();

            $modelo =  new mdlregistrousuarios();
            $respuesta = $modelo->registrar($tabla,$datos);

            return $respuesta;

    }

    /*tabla para visializar los usuarios registrados*/

     public function seleccionarregistros(){

        $tabla = "users";
        $modelo =  new mdlregistrousuarios();
        $respuestas =  $modelo->seleccionarregistros($tabla,null,null);
        return $respuestas;
    }


     public function getroles(){

        
        $modelo =  new mdlregistrousuarios();
        $respuestas =  $modelo->getroles();
        return $respuestas;
    }


    public function eliminarusuario($datos){

        $tabla = "users";
        $modelo =  new mdlregistrousuarios();
        $respuesta = $modelo->eliminarusuario($tabla,$datos);

        return $respuesta;

    }


}