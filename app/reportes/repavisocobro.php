<?php
use setasign\Fpdi\Fpdi;
// or for usage with TCPDF:
// use setasign\Fpdi\Tcpdf\Fpdi;

// or for usage with tFPDF:
// use setasign\Fpdi\Tfpdf\Fpdi;

// setup the autoload function
require_once('../../vendor/autoload.php');

// initiate FPDI
$pdf = new Fpdi();
// add a page
//$pdf->AddPage();
// set the source file
$pdf->setSourceFile("avcobro.pdf");
// import page 1
$tplId = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
//$pdf->useTemplate($tplId, 10, 10, 100);

$templateSize = $pdf->getTemplateSize($tplId);
$orientation = $templateSize['width'] > $templateSize['height'] ? 'L' : 'P';
$pdf->AddPage($orientation, [$templateSize['width'], $templateSize['height']]);
$pdf->useTemplate($tplId, null, null, $templateSize['width'], $templateSize['height'], true);


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

        //AQUI ESCRIBO LA FECHA DE INPRESION DEL AVISO DE COBRO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(140, 62.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataFecha =  '25 de AGOSTO de 2022';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataFecha, $bordeCelda, 0, 'L', $celdaVisible);



         //AQUI ESCRIBO EL NOMBRE DEL INQUILINO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(57, 98.7);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataNombre =  'YIMAR ARIANA ALVAREZ PEREZ ';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
         $pdf->Cell(10, 3, $dataNombre, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL MES  EMICION DE EL AVIOS DE COBRO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(70, 124.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataMes =  'SEPTIEMBRE';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
         $pdf->Cell(10, 3, $dataMes, $bordeCelda, 0, 'L', $celdaVisible);


          //AQUI ESCRIBO MONTO EN LETRAS 
          $pdf->SetFont('Times', 'B', 9);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(120.5, 124.8);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
          $dataMontoLetra =  'SETECIENTOS CINCUENTA DOLARES AMERICANOS';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
          //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
          $pdf->Cell(10, 3, $dataMontoLetra, $bordeCelda, 0, 'L', $celdaVisible);



          //AQUI ESCRIBO MONTO EN NUEMRO 
          $pdf->SetFont('Times', 'B', 11.5);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(40, 132);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
          $dataMontonNuemero = '$750,00';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
          //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
          $pdf->Cell(10, 3, $dataMontonNuemero, $bordeCelda, 0, 'L', $celdaVisible);


           //AQUI ESCRIBO CODIGO DE CONTRATO
           $pdf->SetFont('Times', 'B', 10);
           $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
           $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
           $pdf->SetXY(95, 131);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
           //Atención!! el parámetro true rellena la celda con el color elegido
           $dataCodigoContrato = 'AV-00001-COT-0003-AP-0001';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
           //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
           $pdf->Cell(10, 3, $dataCodigoContrato, $bordeCelda, 0, 'L', $celdaVisible);


            //AQUI ESCRIBO EL MES A PAGAR AVIOS DE COBRO
            $pdf->SetFont('Times', 'B', 9);
            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
            $pdf->SetXY(98,139);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
            //Atención!! el parámetro true rellena la celda con el color elegido
            $dataMesPagar =  'AGOSTO';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
            //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
            $pdf->Cell(10, 3, $dataMesPagar, $bordeCelda, 0, 'L', $celdaVisible);











        $pdf->Output();