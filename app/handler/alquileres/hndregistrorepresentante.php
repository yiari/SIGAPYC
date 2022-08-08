<?php


/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistrorepresentante.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';




/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistrorepresentante')) 
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
    
    $registroRepresentante =  new ctrregistrorepresentante();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id_repr"  =>	$_POST["hidrepresentante"],
                    "id_prop"  =>   $_POST["id_prop"],
                    "cod_repr" =>   $_POST["registroCodigo"],
                    "nom_repr" =>   $_POST["registroNombre"],
                    "ape_repr" =>   $_POST["registroApellido"],
                    "nac_repr" =>   $_POST["registroNacionalidad"],
                    "ci_repr " =>   $_POST["registroCedula"],
                    "rif_repr" =>   $_POST["registroRif"],
                    "loc_repr" =>   $_POST["registroTelefono"],
                    "cel_repr" =>   $_POST["registroCelular"],  
                    "cor_repr" =>   $_POST["registroEmail"],
                    "est_repr" =>   $_POST["cboEstados"],          
                    "mun_repr" =>   $_POST["cboMunicipios"],     
                    "par_repr" =>   $_POST["cboParroquia"],
                    "dir_repr" =>   $_POST["registroDirecionH"],
                    "ofi_repr" =>   $_POST["registroDirecionO"],
                    "tip_repr" =>   $_POST["tipo_persona"],
                    "cod_regi" =>   $_POST["cod_regi"],
                    "not_regi" =>   $_POST["not_regi"],
                    "fec_regi" =>   $_POST["fec_regi"],
                    "num_regi" =>   $_POST["num_regi"],
                    "tom_regi" =>   $_POST["tom_regi"],
                    "fol_regi" =>   $_POST["fol_regi"]
    
                  );

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
     $result = $registroRepresentante->registrar($datos,$AchivosCargados);
    
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

   $prmid_prop = $_POST["id_propj"];

    /*
     |-------------------------------------------
     | AQUI CREO UNA INSTANCIA DE LA CLASE
     |-------------------------------------------
     */
     
     $registroRepresentante =  new ctrregistrorepresentante();
 
    /* 
    |---------------------------------------------
    | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
    |---------------------------------------------
    */
      $result = $registroRepresentante->seleccionarregistros($prmid_prop);
     
     /*
     |-------------------------------------------
     | AQUI REGRESO EL RESULTADO AL AJAX
     |-------------------------------------------
     */
     header('Content-Type: application/json');
      return $result;
      
 }