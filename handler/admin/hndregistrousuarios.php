<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
//require_once '../controladores/admin/ctrregistrousuarios.php';

include '../controladores/admin/ctrregistrousuarios';

use controladores\admin\ctrregistrousuarios;

/*
|-------------------------------------------------
| AQUI VALIDO SI LOS PARAMETROS FUERON ENVIADOS
|-------------------------------------------------
*/


echo 'invalid';

if(isset($_POST["registroNombre"])) {
     
    /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    $registroUsuario =  new ctrregistrousuarios();
    $datos = array("nombre" => $_POST["registroNombre"],
                    "apellido" => $_POST["registroApellido"],
                    "usuario" => $_POST["registroUsuario"],
                    "password" => $_POST["registroContraseña"],                
                    "email" => $_POST["registroEmail"]);

     $result = $myAnimal->getName();
    
    
     echo $result;
}
