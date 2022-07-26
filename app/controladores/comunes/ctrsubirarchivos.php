<?php


class ctrsubirarchivos{




public function validarArchivos($listaarchivos,$idpropietario,$tipo,$coordenada){

    $listaObjetos = array_keys($listaarchivos);

    foreach($listaObjetos as $objeto){

        print "Objeto: " . $objeto;

        if($listaarchivos[$objeto]['error'] == 0 ){

            self::subirArchivos($listaarchivos[$objeto],$idpropietario,$objeto,$tipo,$coordenada);

        }
        
    }

}


private function subirArchivos($objeto,$idpropietario,$campoDocumento,$tipo,$coordenada){

    /*
    |--------------------------------------------------------------
    | AQUI CARGO CUALES SERAN LAS EXTENSIONES DE ARCHIVOS VALIDAS
    |--------------------------------------------------------------
    */
    $extensiones_validas = array('jpeg', 'jpg', 'png', 'pdf'); // Extensiones de arhivos validas


    /*
    |--------------------------------------------------------
    | AQUI OBTENGO LA RUTA DONDE VOY A GUARDAR EL DOCUMENTO
    |--------------------------------------------------------
    */

    $docuTEMP = explode('_',$campoDocumento); 

    $rutaDocumento = self::rutasCarpetas($docuTEMP[0],$tipo,$coordenada);


    /* 
    |-----------------------------------------
    | AQUI OBTENGO EL NOMBRE Y EL TEMPORAL
    |-----------------------------------------
    */
    $docimg = $objeto['name'];
    $tmp = $objeto['tmp_name'];


    /* 
    |---------------------------------------------------
    | AQUI OBTENGO LA EXTENSION DEL DOCUMENTO O IMAGEN
    |---------------------------------------------------
    */

    $ext = strtolower(pathinfo($docimg, PATHINFO_EXTENSION));


    /*
    |---------------------------------------------------
    | AQUI LE DOY UN NOMBRE PERSONALIZADO AL DOCUMENTO
    |---------------------------------------------------
    */
 
     $documentoASubir = rand(1000,1000000).$docimg;

    /*
    |----------------------------------------------------
    | AQUI VERIFICO QUE LA EXTENSION ES VALIDA
    |----------------------------------------------------
    */


    if(in_array($ext, $extensiones_validas)) 
    { 

        /* 
        |----------------------------------
        | AQUI ARMO LA RUTA DEL DOCUMENTO
        |----------------------------------
        */
        $path = $rutaDocumento . strtolower($documentoASubir); 


        /* 
        |----------------------------------------------
        | AQUI SUBO EL ARCHIVO A LA RUTA ESPECIFICADA
        |----------------------------------------------
        */
        if(move_uploaded_file($tmp,$path)) 
            {

                /*
                |--------------------------------------------
                | AQUI REEMPLAZO LA RUTA (ESTO ES OPCIONAL)
                |--------------------------------------------
                */
                $ruta = str_replace("../", "", $path);


                try {
                /*
                |--------------------------------------------------
                | AQUI GUARDO LA INFORMACION EN LA BASE DE DATOS
                |--------------------------------------------------
                */

                $dbConexionDocumento = new conexcion();

                //$idpropietario,$campoDocumento,$tipo,$coordenada,$rutaDocumento


                $stmtDOCU = $dbConexionDocumento->conectar()->prepare("CALL usp_registrodocumentos(?,?,?,?,?)");
                $stmtDOCU -> bindParam(1, $idpropietario, PDO::PARAM_INT); //ESTE ES EL ID DEL PROPIETARIO
                $stmtDOCU -> bindParam(2, $tipo, PDO::PARAM_INT);
                $stmtDOCU -> bindParam(3, $campoDocumento, PDO::PARAM_STR);            
                $stmtDOCU -> bindParam(4, $coordenada, PDO::PARAM_STR); 
                $stmtDOCU -> bindParam(5, $path, PDO::PARAM_STR); 
                

                /*
                |---------------------------------
                | AQUI SE EJECUTA LA OPERACION
                |---------------------------------
                */
                $stmtDOCU->execute();


                } catch (\Exception $e) {
        

                    $codigoError = $e->getCode();
            
                    if ($codigoError == 23000) { //ERROR DE REGISTRO DUPLICADO
                    $dataRes = array(
                        'error' => '1',
                        'mensaje' =>  "El registro se encuentra duplicado " . $e->getMessage()
                    );
                    } else {
                    $dataRes = array(
                        'error' => '1',
                        'mensaje' =>  "Mensaje de Error: " . $e->getMessage()
                    );
            
                    }
            
                    echo json_encode($dataRes);
            
                }













            }
    
    } 




}

private function rutasCarpetas($tipoDocumento,$tipo,$coordenada){

/* 
|-------------------------------------------------------------------
| LA VARIABLE COORDENADA ES PARA SABER COMO SE MANEJARA LA INFORMACION
|-------------------------------------------------------------------
| COORDENADA PERSONA NATURAL
|--------------------------------- 
| -> 1P = PROPIETARIO 
| -> 1PA = APODERADO 
| -> 1I = INMUEBLE 
| -> 1IB = BENEFICIARIO 
| -> 1Q = INQUILINO
| -> 1QP = PAGADOR 
|---------------------------------
| COORDENADA PERSONA JURIDICA
|---------------------------------  
| -> 2P = PROPIETARIO 
| -> 2PR = REPRESENTANTE LEGAL 
| -> 2I = INMUEBLE 
| -> 2IB = BENEFICIARIO 
| -> 2Q = INQUILINO
| -> 2QP = PAGADOR 
|
|----------------------------------------------------------------------
*/

$carpetaTipo = "";

if($tipo == 1){
    $carpetaTipo = "natural";
} else {
    $carpetaTipo = "juridico";
}


/*
|------------------------------------------------------
| AQUI CONSULTO LA CONFIGURACION DE LAS CARPETAS
|------------------------------------------------------
*/


                $dbConexionCarpetas = new conexcion();  


                $prmTipo = "";
                $prmCarpeta = "";
                $prmRutaDirecta = 0;

                $stmt = $dbConexionCarpetas->conectar()->prepare('CALL usp_getrutacarpetas (' . $tipo. ',"' . $tipoDocumento . '","' . $coordenada . '")');
                $stmt->execute();
                $respuesta = $stmt->fetchAll();
      
                //echo "stop datos";
                
                if (count($respuesta) > 0){

                    $prmTipo = $respuesta[0]['tipo'];
                    $prmCarpeta =  $respuesta[0]['carpeta'];
                    $prmRutaDirecta =  $respuesta[0]['rutadirecta'];

                }

/*
|-----------------------------------------------------
| ESTA ES LA RUTA DE LAS CARPETAS DE LOS DOCUMENTOS
|-----------------------------------------------------
*/


$ruta = '../../../documentos/';


if ($prmRutaDirecta == 0){

    $ruta = '../../../documentos/' . $carpetaTipo . '/' . $prmCarpeta;

} else {

    $ruta = '../../../documentos/' . $prmCarpeta;

}

    return $ruta;

}



}

?>