<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistrobeneficiarioj.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrobeneficiariosj{

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

            $tabla = "beneficiario_juridico";
            $modelo = new mdlregisbenficiarioj();

            $modelo =  new mdlregisbenficiarioj();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    
    public function consultabeneficiariojuridico($datos){

        $tabla = "beneficiario_juridico";
        $modelo =  new mdlregisbenficiarioj();
        $respuestas =  $modelo->consultabeneficiariojuridico($tabla,$datos);
        return $respuestas;
    }
     


    public function eliminarpropietario($datos){

        $tabla = "users";
        $modelo =  new mdlregisbenficiario();
        $respuesta = $modelo->eliminarpropietario($tabla,$datos);

        return $respuesta;

    }


}