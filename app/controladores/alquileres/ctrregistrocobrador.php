<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistrocobrador.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrocobradores{

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

            $tabla = "cobrador";
            $modelo = new mdlregiscobrador();

            $modelo =  new mdlregiscobrador();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    /*tabla para visializar los cobradores registrados*/

     public function seleccionarregistros(){

        $tabla = "cobrador";
        $modelo =  new mdlregiscobrador();
        $respuestas =  $modelo->seleccionarregistros($tabla,null,null);
        return $respuestas;
    }


   /*tabla para visializar los inamuebles para ser asigandos */

    public function seleccionasignar($id_cobrador){

        $tabla = "cobrador";
        $modelo =  new mdlregiscobrador();
        $respuestas =  $modelo->seleccionasignar($tabla,$id_cobrador,null);
        return $respuestas;
    }


    public function InmuebleCobrador($id_cobrador){

        $tabla = "cobrador";
        $modelo =  new mdlregiscobrador();
        $respuestas =  $modelo->InmuebleCobrador($tabla,$id_cobrador,null);
        return $respuestas;
    }



    public function vincular($idusuario,$idcobrador,$idinmueble,$idunidad){

        $tabla = "cobrador";
        $modelo = new mdlregiscobrador();

        $modelo =  new mdlregiscobrador();
        $respuesta = $modelo->vincular($idusuario,$idcobrador,$idinmueble,$idunidad);

        return $respuesta;

}


    /*tabla para visializar los inamuebles ya asigandos al cobrador */

    public function seleccioninmueblecobrador(){

        $tabla = "cobrador_inmueble";
        $modelo =  new mdlregiscobrador();
        $respuestas =  $modelo->seleccioninmueblecobrador($tabla,null,null);
        return $respuestas;
    }


     


    public function eliminarpropietario($datos){

        $tabla = "users";
        $modelo =  new mdlregisbenficiario();
        $respuesta = $modelo->eliminarpropietario($tabla,$datos);

        return $respuesta;

    }


}