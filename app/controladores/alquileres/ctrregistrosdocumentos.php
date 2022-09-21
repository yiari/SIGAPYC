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

        $tabla = "documentos";
        $modelo =  new mdlregistrodocumento();
        $respuestas =  $modelo->seleccionarregistros($tabla,$id_prop,$tipo);
        return $respuestas;
    }


    public function documetoInquilino($id_inqui,$tipo){

        $tabla = "documentos";
        $modelo =  new mdlregistrodocumento();
        $respuestas =  $modelo->documetoInquilino($tabla,$id_inqui,$tipo);
        return $respuestas;
    }


    public function documetoBeneficiario($prmid_bene,$tipo){

        $tabla = "documentos";
        $modelo =  new mdlregistrodocumento();
        $respuestas =  $modelo->documetoBeneficiario($tabla,$prmid_bene,$tipo);
        return $respuestas;
    }


    public function documetoApoderado($prmid_apod,$tipo){

        $tabla = "documentos";
        $modelo =  new mdlregistrodocumento();
        $respuestas =  $modelo->documetoApoderado($prmid_apod,$tipo);
        return $respuestas;
    }






}