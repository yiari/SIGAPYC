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
$pdf->setSourceFile("fichapropietario.pdf");
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

$idpro_temp = 0;
$codpro_temp = "";
$codtip_temp = 0;


if(isset($_GET["idpro"])) {
  
    $idpro_temp = $_GET["idpro"];
}


if(isset($_GET["codpro"])) {
  
    $codpro_temp = $_GET["codpro"];
}


if(isset($_GET["codtip"])) {
  
    $codtip_temp = $_GET["codtip"];
}



/*
|------------------------------------------- 
| AQUI HAGO LA CONSULTA DE BASE DE DATOS
|-------------------------------------------
*/


try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verpropietraio(?,?,?)" );
    $stmt ->bindParam(1, $idpro_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codpro_temp, PDO::PARAM_INT);
    $stmt ->bindParam(3, $codtip_temp, PDO::PARAM_INT);


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
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verpropietarioinmueble(?,?,?)" );
    $stmt ->bindParam(1, $idpro_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codpro_temp, PDO::PARAM_INT);
    $stmt ->bindParam(3, $codtip_temp, PDO::PARAM_INT);


    $stmt->execute();
    $dataRegistro["Items2"][] = $stmt->fetch();

    $dataRes = array(
      'error' => '0',
      'mensaje' =>  'El registro se obtuvo con exito.'
    );
    
    
   $resultado2 = array_merge($dataRegistro,$dataRes);

    } catch (\Throwable $th) {
    
        //$pdo->rollBack() ;
        //echo "Mensaje de Error: " . $th->getMessage();
        $dataRes = array(
          'error' => '1',
          'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
        );
  
        $resultado2 = $dataRes;

    }

if ($resultado2['error'] == 0){
//echo "imprimimos el PDF";
//echo $resultado2['items'][0]['id_prop'];
}





try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verapoderarepresentante(?,?,?)" );
    $stmt ->bindParam(1, $idpro_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codpro_temp, PDO::PARAM_INT);
    $stmt ->bindParam(3, $codtip_temp, PDO::PARAM_INT);


    $stmt->execute();
    $dataRegistro["Items3"][] = $stmt->fetch();

    $dataRes = array(
      'error' => '0',
      'mensaje' =>  'El registro se obtuvo con exito.'
    );
    
    
   $resultado3 = array_merge($dataRegistro,$dataRes);

    } catch (\Throwable $th) {
    
        //$pdo->rollBack() ;
        //echo "Mensaje de Error: " . $th->getMessage();
        $dataRes = array(
          'error' => '1',
          'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
        );
  
        $resultado3 = $dataRes;

    }

if ($resultado3['error'] == 0){
//echo "imprimimos el PDF";
//echo $resultado2['items'][0]['id_prop'];
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
        $pdf->SetXY(149, 20);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataFecha =  '25 de AGOSTO de 2022';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataFecha, $bordeCelda, 0, 'L', $celdaVisible);
       
       
        //AQUI ESCRIBO EL CODIGO DEL PROPIETARIO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(140, 27);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCodigo =  $resultado['Items'][0]['codigo_propietario'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataCodigo, $bordeCelda, 0, 'L', $celdaVisible);
        
        //AQUI ESCRIBO EL NONMBRE DEL PROPIETARIO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(140, 31);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataNombre =  $resultado['Items'][0]['nombre'] . ' ' . $resultado['Items'][0]['apellido']  ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataNombre, $bordeCelda, 0, 'L', $celdaVisible);

        //AQUI ESCRIBO EL CEDULA DEL PROPIETARIO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(140, 35.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCedula =  $resultado['Items'][0]['cedula'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataCedula, $bordeCelda, 0, 'L', $celdaVisible);

        //AQUI ESCRIBO EL CEDULA DEL PROPIETARIO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(140, 41);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCedula =  $resultado['Items'][0]['rif'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataCedula, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL TELEFONO DEL PROPIETARIO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(140, 46);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataTelefono =  $resultado['Items'][0]['celular'] .' ' . $resultado['Items'][0]['telefono'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
         $pdf->Cell(10, 3, $dataTelefono, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL CORREO DEL PROPIETARIO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(140, 50);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCorreo =  $resultado['Items'][0]['correo'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
         $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO DATOS BANCARIOS DEL PROPIETARIO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(45, 69);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCorreo =  $resultado['Items'][0]['nombre_banco'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
         $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);

          //AQUI ESCRIBO DATOS NUMERO CUENTAS BANCARIOS DEL PROPIETARIO
          $pdf->SetFont('Times', 'B', 9);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(150, 69);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
          $dataCorreo =  $resultado['Items'][0]['num_cuen'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
          //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
          $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


           //AQUI ESCRIBO NUMERO DE CEDULA DEL PAGO MOVIL DEL PROPIETARIO
           $pdf->SetFont('Times', 'B', 9);
           $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
           $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
           $pdf->SetXY(150, 74);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
           //Atención!! el parámetro true rellena la celda con el color elegido
           $dataCorreo =  $resultado['Items'][0]['pagomovil_cedula'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
           //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
           $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


            //AQUI ESCRIBO BANCO DEL PAGO MOVIL DEL PROPIETARIO
            $pdf->SetFont('Times', 'B', 9);
            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
            $pdf->SetXY(45, 74);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
            //Atención!! el parámetro true rellena la celda con el color elegido
            $dataCorreo =  $resultado['Items'][0]['banco_pago'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
            //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
            $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);



             //AQUI ESCRIBO TELEFONO DEL PAGO MOVIL DEL PROPIETARIO
             $pdf->SetFont('Times', 'B', 9);
             $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
             $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
             $pdf->SetXY(183, 74);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
             //Atención!! el parámetro true rellena la celda con el color elegido
             $dataCorreo =  $resultado['Items'][0]['pagomovil_telefono'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
             //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
             $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


              //AQUI ESCRIBO BANCO EXTRAJERO DEL PROPIETARIO
              $pdf->SetFont('Times', 'B', 9);
              $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
              $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
              $pdf->SetXY(45, 83);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
              //Atención!! el parámetro true rellena la celda con el color elegido
              $dataCorreo =  $resultado['Items'][0]['banco_extrajero'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
              //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
              $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


            //AQUI ESCRIBO AGENCIA BANCO EXTRAJERO DEL PROPIETARIO
            $pdf->SetFont('Times', 'B', 9);
            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
            $pdf->SetXY(129, 83);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
            //Atención!! el parámetro true rellena la celda con el color elegido
            $dataCorreo =  $resultado['Items'][0]['agencia'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
            //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
            $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);

            //AQUI ESCRIBO DC: BANCO EXTRAJERO DEL PROPIETARIO
            $pdf->SetFont('Times', 'B', 9);
            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
            $pdf->SetXY(161, 83);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
            //Atención!! el parámetro true rellena la celda con el color elegido
            $dataCorreo =  $resultado['Items'][0]['dc'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
            //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
            $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);

             //AQUI ESCRIBO CUENTA: BANCO EXTRAJERO DEL PROPIETARIO
             $pdf->SetFont('Times', 'B', 9);
             $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
             $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
             $pdf->SetXY(65, 93);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
             //Atención!! el parámetro true rellena la celda con el color elegido
             $dataCorreo =  $resultado['Items'][0]['numero_cuneta'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
             //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
             $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


              //AQUI ESCRIBO iba_extr: BANCO EXTRAJERO DEL PROPIETARIO
              $pdf->SetFont('Times', 'B', 9);
              $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
              $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
              $pdf->SetXY(125, 92.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
              //Atención!! el parámetro true rellena la celda con el color elegido
              $dataCorreo =  $resultado['Items'][0]['iba'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
              //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
              $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


               //AQUI ESCRIBO bic_extr,: BANCO EXTRAJERO DEL PROPIETARIO
               $pdf->SetFont('Times', 'B', 9);
               $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
               $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
               $pdf->SetXY(175, 92.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
               //Atención!! el parámetro true rellena la celda con el color elegido
               $dataCorreo =  $resultado['Items'][0]['bic'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
               //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
               $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


                //AQUI ESCRIBO CUENTA ZELLE DEL PROPIETARIO
                $pdf->SetFont('Times', 'B', 9);
                $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                $pdf->SetXY(66, 102);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                //Atención!! el parámetro true rellena la celda con el color elegido
                $dataCorreo =  $resultado['Items'][0]['telefo_zelle'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
                $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);


                 //AQUI ESCRIBO  NCORREO DE TELEFONO CUENTA ZELLE DEL PROPIETARIO
                 $pdf->SetFont('Times', 'B', 9);
                 $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                 $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                 $pdf->SetXY(66, 108);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                 //Atención!! el parámetro true rellena la celda con el color elegido
                 $dataCorreo =  $resultado['Items'][0]['correo_zelle'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                 //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
                 $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);
   


                  //AQUI ESCRIBO  NCORREO DE TELEFONO CUENTA ZELLE DEL PROPIETARIO
                  $pdf->SetFont('Times', 'B', 9);
                  $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                  $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                  $pdf->SetXY(129, 102.3);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                  //Atención!! el parámetro true rellena la celda con el color elegido
                  $dataCorreo =  $resultado['Items'][0]['correo_paypal'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                  //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
                  $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);
  


                 
                   $valor = [$resultado2];
                    foreach ($resultado2 as $valor) {
                         //AQUI ESCRIBO  NCORREO DE TELEFONO CUENTA ZELLE DEL PROPIETARIO
                            $pdf->SetFont('Times', 'B', 9);
                            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                            $pdf->SetXY(15,195);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                            //Atención!! el parámetro true rellena la celda con el color elegido
                            $datainmueble =  $resultado2['Items2'][0]['codigo_inmueble'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                            //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
                            $pdf->Cell(10, 3, $datainmueble, $bordeCelda, 0, 'L', $celdaVisible);
                    }




                     //AQUI ESCRIBO  NCORREO DE TELEFONO CUENTA ZELLE DEL PROPIETARIO
                     $pdf->SetFont('Times', 'B', 9);
                     $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                     $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                     $pdf->SetXY(25,195);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                     //Atención!! el parámetro true rellena la celda con el color elegido
                     $datapersona =  $resultado3['Items3'][0]['codigo'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                     //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
                     $pdf->Cell(10, 3, $datapersona, $bordeCelda, 0, 'L', $celdaVisible);






        $pdf->Output();