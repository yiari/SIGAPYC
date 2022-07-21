<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistropropietarios.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistropropietarios')) 
{
   //$o_miClase = new ctrregistrousuarios();
}
else
{

   $dataRes = array(
      'error' => '1',
      'mensaje' =>  "La clase Registros, no se ha cargado correctamente "
    );

    return json_encode($dataRes);
}


/*
|-------------------------------------------------
| AQUI VALIDO SI LOS PARAMETROS FUERON RECIBIDOS
|-------------------------------------------------
*/
$continuar = false;
$operacion = "";

if(isset($_POST["opcion"])) {
     $continuar = true;
     $operacion = $_POST["opcion"];
} else {
   $continuar = false;
   
   $dataRes = array(
      'error' => '1',
      'mensaje' =>  "Faltan parametros para continuar la operación."
    );

    return json_encode($dataRes);
}
   

/* 
 |-------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE INSERTAR
 |-------------------------------------------
*/

if($operacion == "I"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroPropietario =  new ctrregistropropietarios();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id_prop" => $_POST["hidpropietario"],
                    "cod_prop" => $_POST["registroCodigo"],
                    "mon_prop" => $_POST["registroNombre"],
                    "ape_prop" => $_POST["registroApellido"],
                    "id_nacionalidad" => $_POST["registroNacionalidad"],
                    "cedula_prop" => $_POST["registroCedula"],
                    "rif_prop" => $_POST["registroCedula"],
                    "pre_prop" => $_POST["registropre_prop"],
                    "telefono_prop" => $_POST["registroTelefono"],  
                    "cel_prop" => $_POST["registroCelular"],
                    "correo_prop" => $_POST["registroEmail"],                 
                    "id_estado" => $_POST["cboEstados"],
                    "id_municipio" => $_POST["cboMunicipios"],
                    "id_parroquia" => $_POST["cboParroquia"],
                    "dir_prop" => $_POST["registroDirecionH"],
                    "ofi_prop" => $_POST["registroDirecionO"],
                    "tipo_persona" => $_POST["tipo_persona"],
                    "rep_prop" => "",
                   /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS BANCOS NACIONALES
                   |------------------------------------------
                   */
                  "cuenta_id_nacional" => $_POST["hidcuenta_id_nacional"],
                  "cuenta_id_banco" => $_POST["cboBancoN"],
                  "num_cuenta_nacional" => $_POST["num_cuen"],

                  "pagomovil_cedula" => $_POST["ced_pmov"],
                  "pagomovil_id_banco" => $_POST["cboBancoNP"],
                  "pagomovil_telefono" => $_POST["cel_pmov"],
                
                                     /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE LOS BANCOS INTERNACIONALES
                   |------------------------------------------
                   */
                  "cuenta_id_internacional" => $_POST["hidcuenta_id_internacional"],
                  "ban_extr" => $_POST["ban_extr"],
                  "age_extr" => $_POST["age_extr"],
                  
                  "dc_extr" => $_POST["dc_extr"],
                  "cue_extr" => $_POST["cue_extr"],
                  "iba_extr" => $_POST["iba_extr"],
                  "bic_extr" => $_POST["bic_extr"]
                  
                  
                  
                  );

     // echo json_encode($datos);
     // die;


   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroPropietario->registrar($datos);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}



/* 
 |--------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR TODOS LOS USUARIOS
 |--------------------------------------------------------------
*/

if($operacion == "C"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroPropietario =  new ctrregistropropietarios();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroPropietario->seleccionarregistros();
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}




/* 
 |--------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION ELIMINAR USUARIO
 |--------------------------------------------------------------
*/

if($operacion == "D"){

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroPropietario =  new ctrregistropropietarios();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
  $datos = array( "id_prop" => $_POST["id_prop"]);
   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
   $result = $registroPropietario->eliminarpropietario($datos);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}
