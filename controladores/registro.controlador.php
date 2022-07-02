<?php
/*esteno*/
class ControladorRegistros{

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

            $datos = array("name" => $_POST["registroNombre"],
                            "lastname" => $_POST["registroApellido"],
                            "usuario" => $_POST["registroUsuario"],
                            "password" => $_POST["registroContraseña"],                
                            "email" => $_POST["registroEmail"]);

            $respuesta = modeloFormularios::mblregistros($tabla,$datos);

            return $respuesta;

        }


    }

            /*seleccionar registros*/

            static public function ctrselccionarRegistros(){

                $tabla = "users";
                $respuestas =  modeloFormularios::mdlselccionarRegistros($tabla,null,null);
                return $respuestas;
            }

            /*Ingreso al sistema*/


            public function ctrIngreso(){

                if(isset($_POST["IngresoEmail"])){

                    $tabla = "Users";
                    $iten = "email";
                    $valor = $_POST["IngresoEmail"];

                    $respuesta =  modeloFormularios::mdlselccionarRegistros($tabla,$iten,$valor);
                    
                    //echo '<pre>'; print_r($respuesta); echo '</pre>';

                     /*echo ($respuesta["email"]) .'<br>'; 
                     echo ($respuesta["password"]) .'<br>'; 
                     echo ($_POST["IngresoEmail"]) .'<br>'; 
                     echo ($_POST["IngresoContraseña"]) .'<br>';*/ 
                     //return;
                    
                    If($respuesta["email"] == $_POST["IngresoEmail"] && $respuesta["password"] == $_POST["IngresoContraseña"] ){
                       
                        $_SESSION["validarIngreso"] = "oK";

                        
                       echo '<script>
                        
                        if (window.history.replaceState){

                            window.history.replaceState(null,null,window.location.herf);
                        }
                            window.location = "menuinicial.php?url=menuinicial";

                       </script>';
                       
                       
                       //echo '<div class="alert alert-success">Ingreso exitoso</div>';

                    }else{

                        echo '<script>
                                if (window.history.replaceState){

                                    window.history.replaceState(null,null,window.location.herf);
                                }

                               
                            </script>';

                    echo '<div class="alert alert-danger">Error al ingresar al sistema, el email o la contraseña no coinsiden  </div>';

                    }

                   /* echo '<pre>'; print_r($respuesta); echo '</pre>'*/;
                }

            }

}