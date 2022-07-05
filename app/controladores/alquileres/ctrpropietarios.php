 <?php

 /*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once 'app/modelos/alquileres/mdlpropietarios.php';
 
 class ctrpropietarios {


     public function seleccionarlistaPropietarios(){

        $tabla = "propietario";
        $respuestas = new  mdlpropietarios ();
        $res = $respuestas->mdlselccionarPropietraios($tabla,null,null);

        return $res;
    }


    



 } 