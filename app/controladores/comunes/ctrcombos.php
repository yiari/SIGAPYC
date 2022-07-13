<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/comunes/mdlcombos.php';


class ctrcombos{


    public function __construct()
    {
        /*
        |-------------------------------------------------
        | ESTO ES UN CONSTRUCTOR CUANDO SE CREA LA CLASE 
        |-------------------------------------------------
        */ 
    }

    public function getestados(){

        
        $modelo =  new mdlcombos();
        $respuestas =  $modelo->getestados();
        return $respuestas;
    }

    public function getmunicipios($idestado){

        
        $modelo =  new mdlcombos();
        $respuestas =  $modelo->getmunicipios($idestado);
        return $respuestas;
    }


    public function getparroquias($idmunicipio){

        
        $modelo =  new mdlcombos();
        $respuestas =  $modelo->getparroquias($idmunicipio);
        return $respuestas;
    }


    public function getbancos(){

        
        $modelo =  new mdlcombos();
        $respuestas =  $modelo->getbancos();
        return $respuestas;
    }




}
