<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/controladores/alquileres/ctrregistrobeneficiarios.php';
include_once '../../../app/controladores/comunes/ctrcapturararchivos.php';


/*
|-------------------------------------------------
| AQUI VALIDO QUE LA CLASE SE CARGO CORRECTAMENTE
|-------------------------------------------------
*/

if (class_exists('ctrregistrobeneficiarios')) 
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
    
    $registroBenefesiarios =  new ctrregistrobeneficiarios();

   /*
   |---------------------------------------------
   | AQUI CARGO LOS DATOS PARA ALMACENAR
   |---------------------------------------------
   */
    $datos = array( "id_bene" => $_POST["hidbeneficiario"],
                    "id_prop" => $_POST["id_prop"],
                    "tipo_propietario"   =>   $_POST["tipo_propietario"],
                    "cod_bene" => $_POST["registroCodigo"],
                    "mon_bene" => $_POST["registroNombre"],
                    "ape_bene" => $_POST["registroApellido"],
                    "nac_bene" => $_POST["registroNacionalidad"],
                    "ci_bene" => $_POST["registroCedula"],
                    "rif_bene" => $_POST["registrorif"],
                    "loc_bene" => $_POST["registroTelefono"],  
                    "cel_bene" => $_POST["registroCelular"],
                    "cor_bene" => $_POST["registroEmail"],                 
                    "id_estado" => $_POST["cboEstados"],
                    "id_municipio" => $_POST["cboMunicipios"],
                    "id_parroquia" => $_POST["cboParroquia"],
                    "dir_bene" => $_POST["registroDirecionH"],
                    "ofi_bene" => $_POST["registroDirecionO"],
                    "tipo_persona" => $_POST["tipo_persona"],
                
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
                  "bic_extr" => $_POST["bic_extr"],


                   /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE PAYPAL
                   |------------------------------------------
                   */
                  "cuenta_id_paypal" => $_POST["hidcuenta_id_paypal"],
                  "cor_payp" => $_POST["cor_payp"],
                  "nom_payp" => $_POST["nom_payp"],


                   /*
                   |------------------------------------------
                   | AQUI VAN LOS DATOS DE ZELLE
                   |------------------------------------------
                   */
                  "cuenta_id_zelle" => $_POST["hidcuenta_id_zelle"],
                  "tel_zelle" => $_POST["tel_zelle"],
                  "cor_zelle" => $_POST["cor_zelle"],
                  "nom_zelle" => $_POST["nom_zelle"]);



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
     $result = $registroBenefesiarios->registrar($datos,$AchivosCargados);
    
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
 | AQUI SE EJECUTA LA OPERACION INSERTAR INMUEBLE BENEFICIARIO
 |--------------------------------------------------------------
*/

if($operacion == "IB"){


   $prmid_propietario = $_POST["id_propietario"];
   $prmid_inmueble = $_POST["id_inmueble"];
   $prmid_unidad = $_POST["id_unidad"];

   $prmPorcentajes = $_POST["txtporcentajes"];
   $prmTipoBeneficiario = $_POST["hidTipoBene"];

   $array = $prmPorcentajes; //filter_input_array($prmPorcentajes);
   $newArrayID = array();
   $newArrayVALORES = array();
   $newArrayTIPOS = array();
   $contador = 0;

   foreach (array_keys($array) as $fieldKey) {
       foreach ($array[$fieldKey] as $key=>$value) {
   
         //$newArrayID = [$key][$fieldKey] = $value;

         $newArrayID[$contador] = $key;
         $newArrayVALORES[$contador] = $value;


         foreach (array_keys($prmTipoBeneficiario) as $fieldKey) {
            foreach ($prmTipoBeneficiario[$fieldKey] as $key=>$value) {


               if($newArrayID[$contador] == $key){
                  $newArrayTIPOS[$contador] = $value;
                  break;
               }

            }
         }
   
         $contador++;

         }
   }  

   $datos = array(
      "id_registro" => 0, 
      "id_propietario"   => $prmid_propietario,
      "id_inmueble"   => $prmid_inmueble,
      "id_unidad"   => $prmid_unidad,
  );

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroBenefeciarios =  new ctrregistrobeneficiarios();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroBenefeciarios->InmueblesBeneficiarios($datos,$newArrayID,$newArrayVALORES,$newArrayTIPOS);
    
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




/* 
 |--------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR TODOS LOS USUARIOS
 |--------------------------------------------------------------
*/

if($operacion == "C"){


   $prmid_prop = $_POST["id_prop"];
   $prmtipo = $_POST["tipo"];

   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroBenefesiarios =  new ctrregistrobeneficiarios();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroBenefesiarios->seleccionarregistros($prmid_prop,$prmtipo);
    
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



/* 
 |--------------------------------------------------------------
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR DEL Beneficiario
 |--------------------------------------------------------------
*/

if($operacion == "CB"){



   $datos = array( 
      "id_bene" => $_POST["idbeneficiario"],
      "cod_bene" => $_POST["codigoBeneficiario"],
      "tipo_persona" => $_POST["tipoBeneficiario"]
   );



   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroBenefesiarios =  new ctrregistrobeneficiarios();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroBenefesiarios->consultabeneficiario($datos);
    
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
 | AQUI SE EJECUTA LA OPERACION DE CONSULTAR DEL Beneficiario
 |--------------------------------------------------------------
*/

if($operacion == "CBB"){



   $datos = array( 
      "id_bene" => $_POST["idbeneficiario"],
      "codigo" => $_POST["codigoBeneficiario"],
      "tipo_persona" => $_POST["tipoBeneficiario"]
   );



   /*
    |-------------------------------------------
    | AQUI CREO UNA INSTANCIA DE LA CLASE
    |-------------------------------------------
    */
    
    $registroBenefesiariosBitacora =  new ctrregistrobeneficiarios();

   /* 
   |---------------------------------------------
   | AQUI OBTENGO EL RESULTADO DE LA EJECUCION
   |---------------------------------------------
   */
     $result = $registroBenefesiariosBitacora->consultabeneficiariobitacora($datos);
    
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
