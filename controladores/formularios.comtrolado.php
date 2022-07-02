<?php


class ControladorFormulario{

/*=====================================
            metodo no estatico
    =======================================*/ 

/*public function ctrregistros(){
      
        if(isset($_POST["registroNombre"])){

            echo $_POST["registroNombre"];
        }


    }*/


    static public function ctrregistros(){
      
        if(isset($_POST["registroNombre"])){

            /*return $_POST["registroNombre"]."<br>".$_POST["registroEmail"] ."<br>".$_POST["registroContraseña"]."<br>";*/

            //return "ok";

            $tabla = "users";

            $datos = array("nombre" => $_POST["registroNombre"],
                            "apellido" => $_POST["registroApellido"],
                            "usuario" => $_POST["registroUsuario"],
                            "password" => $_POST["registroContraseña"],                
                            "email" => $_POST["registroEmail"]);

            $respuesta = modeloFormularios::mblregistros($tabla,$datos);

            return $respuesta;

        }


    }

    /*tabla para visializar los usuarios registrados*/

    static public function ctrselccionarRegistros(){

        $tabla = "users";
        $respuestas =  modeloFormularios::mdlselccionarRegistros($tabla,null,null);
        return $respuestas;
    }


    static public function ctrselccionarlistaPropietarios(){

        $tabla = "propietario";
        $respuestas =  modeloFormularios::mdlselccionarPropietraios($tabla,null,null);
        return $respuestas;
    }


    static public function ctrselccionarlistaInquilinos(){

        $tabla = "inquilino";
        $respuestas =  modeloFormularios::mdlselccionarPropietraios($tabla,null,null);
        return $respuestas;
    }



}