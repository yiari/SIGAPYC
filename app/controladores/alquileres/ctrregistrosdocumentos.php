<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistrodocumento.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrosdocumentos{
     
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

     public function seleccionarregistros($id_prop,$tipo){

        $tabla = "beneficiario";
        $modelo =  new mdlregistrodocumento();
        $respuestas =  $modelo->seleccionarregistros($tabla,$id_prop,$tipo);
        return $respuestas;
    }



}