<?php


/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistropagador.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';




/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistropagador')) 
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
    
    $registroPagador =  new ctrregistropagador();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id_paga"   =>	$_POST["hidpagador"],
                    "id_inqu"   =>   $_POST["id_inqu"],
                    "tipo_inquilino"   =>   $_POST["tipo_inquilino"],
                    "cod_paga" =>   $_POST["registroCodigo"],
                    "nom_paga" =>   $_POST["registroNombre"],
                    "ape_paga" =>   $_POST["registroApellido"],
                    "nac_paga" =>   $_POST["registroNacionalidad"],
                    "ci_paga" =>    $_POST["registroCedula"],
                    "rif_paga" =>   $_POST["registroRif"],
                    "loc_paga" =>   $_POST["registroTelefono"],
                    "cel_paga" =>   $_POST["registroCelular"],  
                    "cor_paga" =>   $_POST["registroEmail"],
                    "est_paga" =>   $_POST["cboEstados"],          
                    "mun_paga" =>   $_POST["cboMunicipios"],     
                    "par_paga" =>   $_POST["cboParroquia"],
                    "dir_paga" =>   $_POST["registroDirecionH"],
                    "ofi_paga" =>   $_POST["registroDirecionO"],
                    "tip_paga" =>   $_POST["tipo_persona"],
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
     $result = $registroPagador->registrar($datos,$AchivosCargados);
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR TODOS LOS PAGADORES
 |--------------------------------------------------------------
*/

if($operacion == "C"){

   $prmid_inq = $_POST["id"];
   $prmtipo = $_POST["tipo"];

    /*
     |-------------------------------------------
     | AQUI CREO UNA INSTANCIA DE LA CLASE
     |-------------------------------------------
     */
     
     $registroPagador =  new ctrregistropagador();
 
    /* 
    |---------------------------------------------
    | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
    |---------------------------------------------
    */
      $result = $registroPagador->seleccionarregistros($prmid_inq,$prmtipo);
     
     /*
     |-------------------------------------------
     | AQUI REGRESO EL RESULTADO AL AJAX
     |-------------------------------------------
     */
    if (!headers_sent()) {
      //AGREGAR CABECERA SI NO LA TIENE
      header('Content-Type: application/json');
} 
      return $result;
      
 }