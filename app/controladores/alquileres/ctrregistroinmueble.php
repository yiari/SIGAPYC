<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistroinmuebles.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistroinmueble{

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

            $tabla = "inmuebles";
            $modelo =  new mdlregistroinmueble();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los inquiilonos registrados*/

     public function consultainmueble($datos){

        $tabla = "inmuebles";
        $modelo =  new mdlregistroinmueble();
        $respuestas =  $modelo->consultainmueble($tabla,$datos);
        return $respuestas;
    }


    public function consultatodos(){

        $tabla = "inmuebles";
        $modelo =  new mdlregistroinmueble();
        $respuestas =  $modelo->consultatodos($tabla,null,null);
        return $respuestas;
    }


    public function consultainmueblesinunidades($datos){

        $tabla = "inmuebles";
        $modelo =  new mdlregistroinmueble();
        $respuestas =  $modelo->consultainmueblesinunidades($tabla,$datos);
        return $respuestas;
    }


    public function consultainmuebleconunidades($datos){

        $tabla = "inmuebles";
        $modelo =  new mdlregistroinmueble();
        $respuestas =  $modelo->consultainmuebleconunidades($tabla,$datos);
        return $respuestas;
    }


    public function seleccionarregistros($datos){

        $tabla = "inmuebles";
        $modelo =  new mdlregistroinmueble();
        $respuestas =  $modelo->seleccionarregistros($tabla,$datos);
        return $respuestas;
    }



    /*tabla para visializar los inquiilonos registrados*/

    public function seleccionarBeneficiario($prmid_prop,$prmTipoProp){

        $tabla = "inmuebles";
        $modelo =  new mdlregistroinmueble();
        $respuestas =  $modelo->seleccionarregistros($tabla,$prmid_prop,$prmTipoProp);
        return $respuestas;
    }


    public function consultabitacoraInmueble($datos){

        $tabla = "inquilinos";
        $modelo =  new mdlregistroinmueble();
        $respuestas =  $modelo->consultabitacoraInmueble($tabla,$datos);
        return $respuestas;
    }

     


    public function eliminarinquilino($datos){

        $tabla = "inquilino";
        $modelo =  new mdlregistroinquilinos();
        $respuesta = $modelo->eliminarinquilino($tabla,$datos);

        return $respuesta;

    }


}