<?php
use setasign\Fpdi\Fpdi;
// or for usage with TCPDF:
// use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function
require_once('../../vendor/autoload.php');
include_once '../../app/modelos/conexcion.php';

// initiate FPDI
$pdf = new Fpdi();
// add a page
//$pdf->AddPage();
// set the source file
$pdf->setSourceFile("recibo.pdf");
// import page 1
$tplId = $pdf->importPage(1);
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

$idrecibo_temp = 0;
$codrecibo_temp = "";
//$codtip_temp = 0;


if(isset($_GET["id"])) {
  
    $idrecibo_temp = $_GET["id"];
}


if(isset($_GET["codreci"])) {
  
    $codrecibo_temp = $_GET["codreci"];
}



/*
|------------------------------------------- 
| AQUI HAGO LA CONSULTA DE BASE DE DATOS
|-------------------------------------------
*/


try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verrecibopedido(?,?)" );
    $stmt ->bindParam(1, $idrecibo_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codrecibo_temp, PDO::PARAM_STR);
  


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



/*
        |---------------------------------------------
        | CONFIGURACIONES DOCUMENTO
        |---------------------------------------------
        |
        | COLOR LETRAS *
        |
        |  BASICOS:
        |  AZUL: '9,45,93'
        |  ROJO: '  255,0,0036                              '
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

        //AQUI ESCRIBO LA FECHA DE INPRESION DEL AVISO DE COBRO
        $pdf->SetFont('Times', 'B', 12);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(135, 51);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataFecha =  '20 de Septiembre de 2022';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataFecha, $bordeCelda, 0, 'L', $celdaVisible);

        //AQUI ESCRIBO EL NOMBRE DEL INQUILINO
        $pdf->SetFont('Times', 'B',12);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(150,28);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $datarecibo =  $resultado['Items'][0]['cod_recibo'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $datarecibo, $bordeCelda, 0, 'L', $celdaVisible);

         //AQUI ESCRIBO EL NOMBRE DEL INQUILINO
         $pdf->SetFont('Times', 'B',12);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(75,64);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataNombre =  $resultado['Items'][0]['inquilino'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
         $pdf->Cell(10, 3, $dataNombre, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL NOMBRE DEL INMUEBLE
        $pdf->SetFont('Times', 'B',12);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(29,83);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataUInmueble1 =  $resultado['Items'][0]['inmueble'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataUInmueble1, $bordeCelda, 0, 'L', $celdaVisible);

        //AQUI ESCRIBO EL NOMBRE DEL INMUEBLE
        $pdf->SetFont('Times', 'B',12);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(29,206);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataInmueble2 =  $resultado['Items'][0]['inmueble'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataInmueble2, $bordeCelda, 0, 'L', $celdaVisible);



         //AQUI ESCRIBO EL MES  EMICION DE EL AVIOS DE COBRO
         $pdf->SetFont('Times', 'B', 12);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(102, 109);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataMes =  $resultado['Items'][0]['nombre_mes'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
         $pdf->Cell(10, 3, $dataMes, $bordeCelda, 0, 'L', $celdaVisible);


          //AQUI ESCRIBO MONTO EN LETRAS 
          $pdf->SetFont('Times', 'B', 9);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(120.5, 124.8);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
          $dataMontoLetra =  '';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
          //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
          $pdf->Cell(10, 3, $dataMontoLetra, $bordeCelda, 0, 'L', $celdaVisible);



          //AQUI ESCRIBO MONTO EN NUEMRO 
          $pdf->SetFont('Times', 'B', 11.5);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(40, 132);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
          $dataMontonNuemero = '';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
          //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
          $pdf->Cell(10, 3, $dataMontonNuemero, $bordeCelda, 0, 'L', $celdaVisible);


           //AQUI ESCRIBO CODIGO DE CONTRATO
           $pdf->SetFont('Times', 'B', 10);
           $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
           $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
           $pdf->SetXY(95, 131);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
           //Atención!! el parámetro true rellena la celda con el color elegido
           $dataCodigoContrato = '';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
           //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
           $pdf->Cell(10, 3, $dataCodigoContrato, $bordeCelda, 0, 'L', $celdaVisible);


            //AQUI ESCRIBO EL MES A PAGAR AVIOS DE COBRO
            $pdf->SetFont('Times', 'B', 9);
            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
            $pdf->SetXY(98,139);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
            //Atención!! el parámetro true rellena la celda con el color elegido
            $dataMesPagar =  '';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
            //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
            $pdf->Cell(10, 3, $dataMesPagar, $bordeCelda, 0, 'L', $celdaVisible);











        $pdf->Output();