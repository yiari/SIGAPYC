<?php
use setasign\Fpdi\Fpdi;
// or for usage with TCPDF:
// use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function
require_once('../../vendor/autoload.php');
include_once '../../app/modelos/conexcion.php';
include_once '../../app/comunes/funciones.php';

// initiate FPDI
$pdf = new Fpdi();
// add a page
$prmFunciones = new funciones();
//$pdf->AddPage();
// set the source file
$pdf->setSourceFile("fichainmueble.pdf");
// import page 1
$tplId = $pdf->importPage(1);


/*for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $tplIdx = $pdf->importPage($pageNo);

    // add a page
    $pdf->AddPage();
    $pdf->useTemplate($tplIdx, null, null, 0, 0, true);

    // font and color selection
    $pdf->SetFont('Helvetica');
    $pdf->SetTextColor(200, 0, 0);

    // now write some text above the imported page
    $pdf->SetXY(40, 83);
    $pdf->Write(2, 'THIS IS JUST A TEST');
}*/



// use the imported page and place it at point 10,10 with a width of 100 mm
//$pdf->useTemplate($tplId, 10, 10, 100);

$templateSize = $pdf->getTemplateSize($tplId);
$orientation = $templateSize['width'] > $templateSize['height'] ? 'L' : 'P';
$pdf->AddPage($orientation, [$templateSize['width'], $templateSize['height']]);
$pdf->useTemplate($tplId, null, null, $templateSize['width'], $templateSize['height'], true);



/*
|------------------------------------------------
| AQUI CONSULTO LOS PARAMETROS QUE DEBO RECIBIR
|------------------------------------------------
*/
//idpro=13&codpro=P-01-0036-ALEJADRA%20 PERAZA &codtip=1

$idinmu_temp = 0;
$codinmu_temp = "";
//$codtip_temp = 0;


if(isset($_GET["idunid"])) {
  
    $idinmu_temp = $_GET["idunid"];
}


/*if(isset($_GET["codinq"])) {
  
    $codinmu_temp = $_GET["codinmu"];
}*/






/*
|------------------------------------------- 
| AQUI HAGO LA CONSULTA DE BASE DE DATOS
|-------------------------------------------
*/
try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_vermandatounidad(?)" );
    $stmt ->bindParam(1, $idinmu_temp, PDO::PARAM_INT);
    //$stmt ->bindParam(2, $codinmu_temp, PDO::PARAM_INT);


    $stmt->execute();
    $dataRegistromandato["Items"][] = $stmt->fetch();

    $dataRes = array(
      'error' => '0',
      'mensaje' =>  'El registro se obtuvo con exito.'
    );
    
    
   $resultado4 = array_merge($dataRegistromandato,$dataRes);

    } catch (\Throwable $th) {
    
        //$pdo->rollBack() ;
        //echo "Mensaje de Error: " . $th->getMessage();
        $dataRes = array(
          'error' => '1',
          'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
        );
  
        $resultado4 = $dataRes;

    }

if ($resultado4['error'] == 0){
//echo "imprimimos el PDF";
//echo $resultado['items'][0]['cod_prop'];
}

try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verunidades(?)" );
    $stmt ->bindParam(1, $idinmu_temp, PDO::PARAM_INT);
    //$stmt ->bindParam(2, $codinmu_temp, PDO::PARAM_INT);


    $stmt->execute();
    $dataRegistro["Items"][] = $stmt->fetch();

    $dataRes = array(
      'error' => '0',
      'mensaje' =>  'El registro se obtuvo con exito.'
    );
    
    
   $resultado = array_merge($dataRegistro,$dataRes);

    } catch (\Throwable $th) {
    
        //$pdo->rollBack() ;
        //echo "Mensaje de Error: " . $th->getMessage();
        $dataRes = array(
          'error' => '1',
          'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
        );
  
        $resultado = $dataRes;

    }

if ($resultado['error'] == 0){
//echo "imprimimos el PDF";
//echo $resultado['items'][0]['cod_prop'];
}


try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verinquiliniunidad(?)" );
    $stmt ->bindParam(1, $idinmu_temp, PDO::PARAM_INT);
    //$stmt ->bindParam(2, $codinmu_temp, PDO::PARAM_INT);


    $stmt->execute();
    $dataRegistro1["Items"][] = $stmt->fetch();

    $dataRes = array(
      'error' => '0',
      'mensaje' =>  'El registro se obtuvo con exito.'
    );
    
    
   $resultado1 = array_merge($dataRegistro1,$dataRes);

    } catch (\Throwable $th) {
    
        //$pdo->rollBack() ;
        //echo "Mensaje de Error: " . $th->getMessage();
        $dataRes = array(
          'error' => '1',
          'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
        );
  
        $resultado1 = $dataRes;

    }

if ($resultado1['error'] == 0){
//echo "imprimimos el PDF";
//echo $resultado['items'][0]['cod_prop'];
}




try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verdocumentoInmueble(?)" );
    $stmt ->bindParam(1, $idinmu_temp, PDO::PARAM_INT);
  

  
    $stmt->execute();
    $dataRegistrodocumentos= $stmt->fetchall();
  
   /*
    $dataRes = array(
      'error' => '0',
      'mensaje' =>  'El registro se obtuvo con exito.'
    );
   */ 
    $resultado3 = $dataRegistrodocumentos; // array_merge($dataRegistroInmueble,$dataRes);
  
  
    } catch (\Throwable $th) {
    
        //$pdo->rollBack() ;
        //echo "Mensaje de Error: " . $th->getMessage();
        $dataRes = array(
          'error' => '1',
          'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
        );
  
        $resultado3 = $dataRes;
  
    }
  
  //if ($resultado3['error'] == 0){
  //echo "imprimimos el PDF";
  //echo $resultado2['items'][0]['id_prop'];
 // }




/*
        |---------------------------------------------
        | CONFIGURACIONES DOCUMENTO
        |---------------------------------------------
        |
        | COLOR LETRAS *
        |
        |  BASICOS:
        |  AZUL: '9,45,93'
        |  ROJO: '255,0,0'
        |---------------------------------------------
        */

        $fontColorContenido = array(
            'r' => 0,
            'g' => 0,
            'b' => 0
        );


    /*
|-----------------------------------------------------------------
| CONTROLO LAS CELDAS PARA QUE SEAN VISIBLES CUANDO ESTE EDITANDO
|-----------------------------------------------------------------
*/

    $celdaVisible = false;
    $bordeCelda = 1;

    if ($celdaVisible == false) {
        $bordeCelda = 0;
    }


    /*
|-----------------------------------------------------------------
| AQUI CARGO LOS DATOS PERSONALES DEL PASTOR
|-----------------------------------------------------------------
*/

    $pdf->SetFont('Times', 'B', 9);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(35,47);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datamanadato =  $resultado4['Items'][0]['codigo'] ;  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
    $pdf->Cell(10, 3, $datamanadato, $bordeCelda, 0, 'L', $celdaVisible);

    //AQUI ESCRIBO LA FECHA DE INPRESION DEL LA FECHA FICHA INMUEBLE
    $pdf->SetFont('Times', 'B', 9);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(100,30);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataFecha =  date('d-m-Y ');  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
    $pdf->Cell(10, 3, $dataFecha, $bordeCelda, 0, 'L', $celdaVisible);

    /*
    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(100,20);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    //$datafoto =  $resultado['Items'][0]['foto']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    $pdf->Image($resultado['Items'][0]['foto'] , 80 ,22, 35 , 38,'JPG', 'PNG');
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    //$pdf->Cell(10, 3, $pdf, $bordeCelda, 0, 'L', $celdaVisible);
    */

    
    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(85,57);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacodigo =  $resultado['Items'][0]['codigo']  ;  
    $pdf->Cell(10, 3, $datacodigo, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(25,66);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datatipo =  $resultado['Items'][0]['tipo']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datatipo, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(75,66);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataletra =  $resultado['Items'][0]['letra']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $dataletra, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(124,66);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datauso =  $resultado['Items'][0]['uso']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datauso, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(27,71);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datametros =  $resultado['Items'][0]['metros_inmu']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datametros, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(66,71);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datahabitacion =  $resultado['Items'][0]['habitacion']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datahabitacion, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(90,71);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $databaño =  $resultado['Items'][0]['baños']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $databaño, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(128,71);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataestacionamiento =  $resultado['Items'][0]['estacionamiento']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $dataestacionamiento, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(185,71);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataservicio =  $resultado['Items'][0]['servicio']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $dataservicio, $bordeCelda, 0, 'L', $celdaVisible);

    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(31,76);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datadireccion =  $resultado['Items'][0]['direccion']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datadireccion, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(31,80);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacastratal =  $resultado['Items'][0]['castratal']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacastratal, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(85,90);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datapropietario =  $resultado['Items'][0]['propietario']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datapropietario, $bordeCelda, 0, 'L', $celdaVisible);
    



    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(45,99);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacedula =  $resultado['Items'][0]['cedula']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacedula, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(105,99);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataRif =  $resultado['Items'][0]['rif']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $dataRif, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(169,99);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacelular =  $resultado['Items'][0]['celular']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacelular, $bordeCelda, 0, 'L', $celdaVisible);

    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(35,104);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacorreo =  $resultado['Items'][0]['correo']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacorreo, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(85,180);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacorreo =  $resultado['Items'][0]['contrato']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacorreo, $bordeCelda, 0, 'L', $celdaVisible);

    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(26,189);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datadesde =  $resultado['Items'][0]['desde']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datadesde, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(69,189);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datahasta =  $resultado['Items'][0]['hasta']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datahasta, $bordeCelda, 0, 'L', $celdaVisible);

    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(26,194);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacanon =  $resultado['Items'][0]['canon']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacanon, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(156,189);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataprorroga =  $resultado['Items'][0]['prorroga']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $dataprorroga, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(155,194);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datadeposito =  $resultado['Items'][0]['deposito']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datadeposito, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(196,189);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datadeposito =  $resultado['Items'][0]['inpeccion']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datadeposito, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(81,194);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datadeposito =  $resultado['Items'][0]['administrativo']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datadeposito, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(125,194);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datadeposito =  $resultado['Items'][0]['papeleria']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datadeposito, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(190,194);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datadeposito =  $resultado['Items'][0]['comision']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datadeposito, $bordeCelda, 0, 'L', $celdaVisible);


		  
		if($resultado1['Items'][0] == false){
            
        $data =  '' ;
    
    }else{

    //**INQUILINO  */

    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(85,204);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacodigoinquilino =  $resultado1['Items'][0]['codigo_inquilino']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacodigoinquilino, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(39,213);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacedulainquilino =  $resultado1['Items'][0]['cedula_inquilino']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacedulainquilino, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(105,213);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datarifinquilino =  $resultado1['Items'][0]['rif_inqu']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datarifinquilino, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(30,218);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacorreoinquilino =  $resultado1['Items'][0]['correo']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacorreoinquilino, $bordeCelda, 0, 'L', $celdaVisible);


    $pdf->SetFont('Times', 'B', 11);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(169,213);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $datacelularinquilino =  $resultado1['Items'][0]['celular']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
    //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
    $pdf->Cell(10, 3, $datacelularinquilino, $bordeCelda, 0, 'L', $celdaVisible);

    }


    $pdf->Output();