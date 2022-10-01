<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistrobeneficiario.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrobeneficiarios{

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

            $tabla = "beneficiario";
            $modelo = new mdlregisbenficiario();

            $modelo =  new mdlregisbenficiario();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los usuarios registrados*/

     public function seleccionarregistros($id_prop,$tipo){

        $tabla = "beneficiario";
        $modelo =  new mdlregisbenficiario();
        $respuestas =  $modelo->seleccionarregistros($tabla,$id_prop,$tipo);
        return $respuestas;
    }


    public function consultabeneficiario($datos){

        $tabla = "beneficiario";
        $modelo =  new mdlregisbenficiario();
        $respuestas =  $modelo->consultabeneficiario($tabla,$datos);
        return $respuestas;
    }


    public function consultabeneficiariobitacora($datos){

        $tabla = "beneficiario";
        $modelo =  new mdlregisbenficiario();
        $respuestas =  $modelo->consultabeneficiariobitacora($tabla,$datos);
        return $respuestas;
    }

     


    public function eliminarpropietario($datos){

        $tabla = "users";
        $modelo =  new mdlregisbenficiario();
        $respuesta = $modelo->eliminarpropietario($tabla,$datos);

        return $respuesta;

    }


    public function InmueblesBeneficiarios($datos,$ids,$porcentajes,$tipos){

        $modelo =  new mdlregisbenficiario();
        $respuesta = $modelo->InmueblesBeneficiarios($datos,$ids,$porcentajes,$tipos);

        return $respuesta;

    }


}