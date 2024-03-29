<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistroinquilinosj.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistroinquilinoj')) 
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
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrcapturararchivos')) 
{
   //$o_miClase = new ctrregistrousuarios();
}
else
{

   $dataRes = array(
      'error' => '1',
      'mensaje' =>  "La clase para el manejo de archivos, no se ha cargado correctamente "
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
    
    $registroInquilinoj =  new ctrregistroinquilinoj();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id"  => $_POST["hidinquilinoj"],
                    "cod_inqu" => $_POST["registroCodigoj"],
                    "nom_inqj" => $_POST["registroNombrej"],
                    "rif_inqj" => $_POST["registroRifj"],
                    "act_inqj" => $_POST["registroactividad"],
                    "dir_inqj" => $_POST["registroDirecionj"],
                    "tel_inqj" => $_POST["registroCelularj"],
                    "cor_inqj" => $_POST["registroEmailj"],
                    "cod_regi" => $_POST["codigo"],
                    "not_regi" => $_POST["nombreRegistro"],
                    "fec_regi" => $_POST["fechaRegistro"],
                    "num_regi" => $_POST["numeroRegistro"],
                    "tom_regi" => $_POST["tomoRegistro"],
                    "fol_regi" => $_POST["foliRegistro"],
                    "tipo_persona" => $_POST["tipo_personaj"],
                    "posee_pagadorj" => $_POST["cbopagadorj"],

                    "nom_repr1"	=> $_POST["nombreRepresentante"],
                    "ape_repr1"  => $_POST["apellidoRepresentante"],
                    "nac_repr1"  => $_POST["nacionalidad"],
                    "ci_repr1"   => $_POST["cedulaRepresentante"],
                    "rif_repr1"  => $_POST["rifRepresentante"],
                    "loc_repr1"  => $_POST["telefonoRepresentante"],
                    "cel_repr1"  => $_POST["celularRepresentante"],
                    "cor_repr1"  => $_POST["emailRepresentante"],
                  
                    "nom_repr2"	=> $_POST["nombreRepresentante2"],
                    "ape_repr2"  => $_POST["apellidoRepresentante2"],
                    "nac_repr2"  => $_POST["nacionalidad2"],
                    "ci_repr2"   => $_POST["RepresentanteCedula2"],
                    "rif_repr2"  => $_POST["rifRepresentante2"],
                    "loc_repr2"  => $_POST["telefonoRepresentante2"],
                    "cel_repr2"  => $_POST["celularRepresentante2"],
                    "cor_repr2"  => $_POST["emailRepresentante2"]); 
				

                    

      //echo json_encode($datos);
      //die;

       /*
   |-------------------------------------------------------------------------------------------------------------
   | AQUI PASO LA RUTA DE LOS DOCUMENTOS
   |-------------------------------------------------------------------------------------------------------------
   |
   | CUANDO SE PASAN DOCUMENTOS O ARCHIVOS, SIEMPRE SE DEBEN CAPTURAR DOS DATOS, POR CADA CAMPO ARCHIVO
   |
   | EJEMPLO: SI EL CAMPO SE LLAMA [cedu_docu] entonces se deben capturar los dos datos
   |  $_FILES['cedu_docu']['name']; -> Este es el nombre real del archivo
   |  $_FILES['cedu_docu']['tmp_name']; -> Este es un nombre temporal que se crea cuando se carga el archivo
   |-------------------------------------------------------------------------------------------------------------
   */
                        
         $capturarArchivos =  new ctrcapturararchivos();

         $AchivosCargados = $capturarArchivos->GetPostedFiles();

         // echo $resultado;



   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroInquilinoj->registrar($datos,$AchivosCargados);
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR TODOS LOS INQUILINOS
 |--------------------------------------------------------------
*/

if($operacion == "CIJ"){

   $datos = array( 
      "id_inqu" => $_POST["idInquilino"],
      "cod_inqu " => $_POST["codigoInquilino"],
      "tip_inqu" => $_POST["tipoInquilino"]
   );

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroInquilinoj =  new ctrregistroinquilinoj();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroInquilinoj->consultarInquilinoJuridico($datos);
    
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
    
    $registroInquilinoj =  new ctrregistroinquilinoj();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
  $datos = array( "id" => $_POST["id"]);
   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
   $result = $registroInquilinoj->eliminarinquilinoJ($datos);
    
    /*
    |-------------------------------------------
    | AQUI REGRESO EL RESULTADO AL AJAX
    |-------------------------------------------
    */
    header('Content-Type: application/json');
     return $result;
     
}
