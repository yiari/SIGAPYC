<?php


class ctrsubirarchivos{




public function validarArchivos($listaarchivos,$idpropietario){

    $listaObjetos = array_keys($listaarchivos);

    foreach($listaObjetos as $objeto){

        print "Objeto: " . $objeto;

        if($listaarchivos[$objeto]['error'] == 0 ){

            self::subirArchivos($listaarchivos[$objeto],$idpropietario,$objeto);

        }
        
    }


}


private function subirArchivos($objeto,$idpropietario,$campoDocumento){

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

    $rutaDocumento = self::rutasCarpetas($docuTEMP[0]);


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



                /*
                |--------------------------------------------------
                | AQUI GUARDO LA INFORMACION EN LA BASE DE DATOS
                |--------------------------------------------------
                */

                //include database configuration file
                //include_once 'db.php';
                //insert form data in the database


               // $valor = $_POST['medidas'];

               // foreach ($valor as $medidas){
                    //echo $medidas."<br />";

                    //$insert = $conn->query("INSERT tbl_llantas (id_medida,id_manzana,foto,descripcion) VALUES ('".$medidas."','".$id_manzana."','" .$ruta. "','" . $codigo. "')");

               // }


            }
    
    } 




}

private function rutasCarpetas($tipoDocumento){
/*
|-----------------------------------------------------
| ESTA ES LA RUTA DE LAS CARPETAS DE LOS DOCUMENTOS
|-----------------------------------------------------
*/

    $ruta = "";

    switch($tipoDocumento){

        case "cedu":
            $ruta = '../../../documentos/natural/cedulas/';
            break;
        case "rif":
            $ruta = '../../../documentos/natural/rif/';
            break;
        case "refper":
            $ruta = '../../../documentos/natural/refpersonales/';
            break;
        case "reffam":
            $ruta = '../../../documentos/natural/reffamiliares/';
            break;
    

    }


    return $ruta;

}



public function uploadFile(){
//include "dbConectar.php";

    $valid_extensions = array('jpeg', 'jpg', 'png', 'pdf'); // Extensiones de arhivos validas
    
    //$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions

    $path = '../images/llantas/'; // upload directory


    if(!empty($_POST['cboMedidas']) || !empty($_POST['medidas']) || !empty($_POST['txtCodigo']) || $_FILES['imagen'])
    {
        $img = $_FILES['imagen']['name'];
        $tmp = $_FILES['imagen']['tmp_name'];

        
    /*
    |--------------------------------------------------------------------------
    | AQUI VERIFICO LA RESOLUCION DE LA IMAGEN QUE DEBE SER [ 640px x 427px ] |
    |--------------------------------------------------------------------------
    */

    $imageInformation = getimagesize($tmp);

    $imageWidth = $imageInformation[0]; //El indice 0 Contiene el Ancho de la imagen
    $imageHeight = $imageInformation[1]; //El indice 1 Contiene el Alto de la imagen


    if($imageWidth == 640 && $imageHeight == 427)
    {

        // get uploaded file's extension
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        // can upload same image using rand function
        $final_image = rand(1000,1000000).$img;
        // check's valid format
        if(in_array($ext, $valid_extensions)) 
        { 
            $path = $path.strtolower($final_image); 
            //echo '<br>';
            //echo $path;
        
            if(move_uploaded_file($tmp,$path)) 
                {

                    $ruta = str_replace("../", "", $path);

                    echo "<img src='$ruta'  width='240px' height='161px' />";
                    $id_medida = 0;// $_POST['cboMedidas'];
                    $id_manzana = $_POST['cboManzana'];
                    $codigo = $_POST['txtCodigo'];

                    //include database configuration file
                    //include_once 'db.php';
                    //insert form data in the database


                    $valor = $_POST['medidas'];

                    foreach ($valor as $medidas){
                        //echo $medidas."<br />";

                        //$insert = $conn->query("INSERT tbl_llantas (id_medida,id_manzana,foto,descripcion) VALUES ('".$medidas."','".$id_manzana."','" .$ruta. "','" . $codigo. "')");

                    }

                    //$insert = $conn->query("INSERT tbl_llantas (id_medida,id_manzana,foto,descripcion) VALUES ('".$id_medida."','".$id_manzana."','" .$ruta. "','" . $codigo. "')");
                    //echo $insert?'ok':'err';
                }
        
        } 
        else 
        {
            echo 'invalid';
        }

    } else {
        echo 'badres';
    }




        
    }

    //$conn->close();
}

}

?>