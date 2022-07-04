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

    protected string $tabla;

    public function __construct()
    {
        /*
        |-------------------------------------------------
        | ESTO ES UN CONSTRUCTOR CUANDO SE CREA LA CLASE 
        |-------------------------------------------------
        */ 
    }

    public function test(){
        return "lion";
    }

    static public function registrar($datos){

            $tabla = "users";

            $respuesta = mdlregistrousuarios::registrar($tabla,$datos);

            return $respuesta;

    }

    /*tabla para visializar los usuarios registrados*/

    static public function seleccionarregistros(){

        $tabla = "users";
        $respuestas =  mdlregistrousuarios::seleccionarregistros($tabla,null,null);
        return $respuestas;
    }


    static public function seleccionarlistaPropietarios(){

        $tabla = "propietario";
        $respuestas =  mdlregistrousuarios::seleccionarpropietarios($tabla,null,null);
        return $respuestas;
    }


    static public function seleccionarlistainquilinos(){

        $tabla = "inquilino";
        $respuestas =  mdlregistrousuarios::seleccionarpropietarios($tabla,null,null);
        return $respuestas;
    }



}