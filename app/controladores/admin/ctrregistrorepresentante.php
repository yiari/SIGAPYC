<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/admin/mdlresgistrarrepresentantel.php';


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

     public function registrar($datos){

            $tabla = "representante_legal";
            $modelo = new mdlregistrorepresentante();

            $modelo =  new mdlregistrorepresentante();
            $respuesta = $modelo->registrar($tabla,$datos);

            return $respuesta;

    }

    /*tabla para visializar los registrados*/

     public function seleccionarregistros(){

        $tabla = "representante_legal";
        $modelo =  new mdlregistrorepresentante();
        $respuestas =  $modelo->seleccionarregistros($tabla,null,null);
        return $respuestas;
    }


  


    public function eliminarrepresentante($datos){

        $tabla = "representante_legal";
        $modelo =  new mdlregistrorepresentante();
        $respuesta = $modelo->eliminarusuario($tabla,$datos);

        return $respuesta;

    }


}