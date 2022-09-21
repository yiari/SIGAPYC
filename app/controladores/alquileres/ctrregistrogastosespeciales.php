<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/alquileres/mdlregistrogastosespesiales.php';


/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/

class ctrregistrogastosespeciales{

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

            $tabla = "gastos_especiales";
            $modelo =  new mdlregistrogastosespesiales();
            $respuesta = $modelo->registrar($tabla,$datos,$archivos);

            return $respuesta;

    }

    
    public function seleccionarregistros(){

        $tabla = "gastos_especiales";
        $modelo =  new mdlregistrogastosespesiales();
        $respuestas =  $modelo->seleccionarregistros($tabla,null,null);
        return $respuestas;
    }


    public function seleccionarconsultagastos($prmid_inmu,$prmid_unid,$prmid_innq,$prmtipo_inqui){

        $tabla = "gastos_especiales";
        $modelo =  new mdlregistrogastosespesiales();
        $respuestas =  $modelo->seleccionarconsultagastos($prmid_inmu,$prmid_unid,$prmid_innq,$prmtipo_inqui);
        return $respuestas;
    }


    public function eliminargastos($datos){

        $tabla = "users";
        $modelo =  new mdlregistrogastosespesiales();
        $respuesta = $modelo->eliminargastos($tabla,$datos);

        return $respuesta;

    }
   

    


    public function eliminarpropietario($datos){

        $tabla = "users";
        $modelo =  new mdlregisbenficiario();
        $respuesta = $modelo->eliminarpropietario($tabla,$datos);

        return $respuesta;

    }


}