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
$pdf->setSourceFile("fichabeneficiario.pdf");
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

$idbene_temp = 0;
$codbene_temp = "";
$codtip_temp = 0;


if(isset($_GET["idbene"])) {
  
    $idbene_temp = $_GET["idbene"];
}


if(isset($_GET["codbene"])) {
  
    $codbene_temp = $_GET["codbene"];
}


if(isset($_GET["codtipbene"])) {
  
    $codtip_temp = $_GET["codtipbene"];
}




/*
|------------------------------------------- 
| AQUI HAGO LA CONSULTA DE BASE DE DATOS
|-------------------------------------------
*/


try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verbeneficiario(?,?,?)" );
    $stmt ->bindParam(1, $idbene_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codbene_temp, PDO::PARAM_INT);
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
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_beneficiapropietario(?,?,?)" );
    $stmt ->bindParam(1, $idbene_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codbene_temp, PDO::PARAM_INT);
    $stmt ->bindParam(3, $codtip_temp, PDO::PARAM_INT);



    $stmt->execute();
    $datapropietarobeneficiario["Items"][] = $stmt->fetch();

    $dataRes = array(
      'error' => '0',
      'mensaje' =>  'El registro se obtuvo con exito.'
    );
    
    
   $resultado1 = array_merge($datapropietarobeneficiario,$dataRes);

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
        $pdf->SetFont('Times', 'B', 10);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(149, 20);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataFecha =  date('d-m-Y ');  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
        $pdf->Cell(10, 3, $dataFecha, $bordeCelda, 0, 'L', $celdaVisible);
       
       
        //AQUI ESCRIBO EL CODIGO DEL BENEFICIARIO
        $pdf->SetFont('Times', 'B', 10);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(140, 32);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        //$dataCodigo =  'P-12-0017-Mayerlin Hernandez';  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        $dataCodigo =  $resultado['Items'][0]['beneficiario'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        $pdf->Cell(10, 3, $dataCodigo, $bordeCelda, 0, 'L', $celdaVisible);
        
        //AQUI ESCRIBO EL NONMBRE DEL BENEFICIARIO
        $pdf->SetFont('Times', 'B', 10);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(140, 38);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataNombre =  $resultado['Items'][0]['nombre']. ' ' . $resultado['Items'][0]['apellido'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        $pdf->Cell(10, 3, $dataNombre, $bordeCelda, 0, 'L', $celdaVisible);

        //AQUI ESCRIBO 
        $pdf->SetFont('Times', 'B', 10);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(140, 43);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCedula =  $resultado['Items'][0]['nacinalidad']. ' ' . $resultado['Items'][0]['cedula'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
        $pdf->Cell(10, 3, $dataCedula, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO 
         $pdf->SetFont('Times', 'B', 10);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(140, 47);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataRif =  $resultado['Items'][0]['rif'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         $pdf->Cell(10, 3, $dataRif, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO 
         $pdf->SetFont('Times', 'B', 10);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(140, 52);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCelular =  $resultado['Items'][0]['celular'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
         $pdf->Cell(10, 3, $dataCelular, $bordeCelda, 0, 'L', $celdaVisible);


          //AQUI ESCRIBO 
          $pdf->SetFont('Times', 'B', 10);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(140, 58);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
          $dataCorreo =  $resultado['Items'][0]['correo'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
          $pdf->Cell(10, 3, $dataCorreo, $bordeCelda, 0, 'L', $celdaVisible);



           //AQUI ESCRIBO 
           $pdf->SetFont('Times', 'B', 10);
           $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
           $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
           $pdf->SetXY(45, 75);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
           //Atención!! el parámetro true rellena la celda con el color elegido
           $dataBanco =  $resultado['Items'][0]['nombre_banco'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
           $pdf->Cell(10, 3, $dataBanco, $bordeCelda, 0, 'L', $celdaVisible);


            //AQUI ESCRIBO 
            $pdf->SetFont('Times', 'B', 10);
            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
            $pdf->SetXY(165, 75);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
            //Atención!! el parámetro true rellena la celda con el color elegido
            $dataCuenta =  $resultado['Items'][0]['numero_cuenta'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
            $pdf->Cell(10, 3, $dataCuenta, $bordeCelda, 0, 'L', $celdaVisible);



            //AQUI ESCRIBO 
            $pdf->SetFont('Times', 'B', 10);
            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
            $pdf->SetXY(45, 80);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
            //Atención!! el parámetro true rellena la celda con el color elegido
            $dataCuenta =  $resultado['Items'][0]['banco_movil'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
            $pdf->Cell(10, 3, $dataCuenta, $bordeCelda, 0, 'L', $celdaVisible);


            //AQUI ESCRIBO 
            $pdf->SetFont('Times', 'B', 10);
            $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
            $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
            $pdf->SetXY(125, 80);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
            //Atención!! el parámetro true rellena la celda con el color elegido
            $datacedulaMovil =  $resultado['Items'][0]['cedula_movil'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
            $pdf->Cell(10, 3, $datacedulaMovil, $bordeCelda, 0, 'L', $celdaVisible);


             //AQUI ESCRIBO 
             $pdf->SetFont('Times', 'B', 10);
             $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
             $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
             $pdf->SetXY(165, 80);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
             //Atención!! el parámetro true rellena la celda con el color elegido
             $datacelularMovil =  $resultado['Items'][0]['telefono_movil'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
             $pdf->Cell(10, 3, $datacelularMovil, $bordeCelda, 0, 'L', $celdaVisible);


              //AQUI ESCRIBO 
              $pdf->SetFont('Times', 'B', 10);
              $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
              $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
              $pdf->SetXY(45, 85);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
              //Atención!! el parámetro true rellena la celda con el color elegido
              $datacBancoExtrajero =  $resultado['Items'][0]['banco_extrajero'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
              $pdf->Cell(10, 3, $datacBancoExtrajero, $bordeCelda, 0, 'L', $celdaVisible);

          

              //AQUI ESCRIBO 
              $pdf->SetFont('Times', 'B', 10);
              $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
              $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
              $pdf->SetXY(65, 90);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
              //Atención!! el parámetro true rellena la celda con el color elegido
              $datacCuentaExtrajero =  $resultado['Items'][0]['cuenta_extrajera'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
              $pdf->Cell(10, 3, $datacCuentaExtrajero, $bordeCelda, 0, 'L', $celdaVisible);


                //AQUI ESCRIBO 
                $pdf->SetFont('Times', 'B', 10);
                $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                $pdf->SetXY(65, 90);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                //Atención!! el parámetro true rellena la celda con el color elegido
                $datacCuentaExtrajero =  $resultado['Items'][0]['cuenta_extrajera'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                $pdf->Cell(10, 3, $datacCuentaExtrajero, $bordeCelda, 0, 'L', $celdaVisible);


                //AQUI ESCRIBO 
                $pdf->SetFont('Times', 'B', 10);
                $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                $pdf->SetXY(65, 90);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                //Atención!! el parámetro true rellena la celda con el color elegido
                $datacCuentaExtrajero =  $resultado['Items'][0]['cuenta_extrajera'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                $pdf->Cell(10, 3, $datacCuentaExtrajero, $bordeCelda, 0, 'L', $celdaVisible);


                 //AQUI ESCRIBO 
                 $pdf->SetFont('Times', 'B', 10);
                 $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                 $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                 $pdf->SetXY(159, 85);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                 //Atención!! el parámetro true rellena la celda con el color elegido
                 $datacde =  $resultado['Items'][0]['de'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                 $pdf->Cell(10, 3, $datacde, $bordeCelda, 0, 'L', $celdaVisible);


                 //AQUI ESCRIBO 
                 $pdf->SetFont('Times', 'B', 10);
                 $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                 $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                 $pdf->SetXY(130, 85);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                 //Atención!! el parámetro true rellena la celda con el color elegido
                 $dataAgencia =  $resultado['Items'][0]['agencia'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                 $pdf->Cell(10, 3, $dataAgencia, $bordeCelda, 0, 'L', $celdaVisible);


                 //AQUI ESCRIBO 
                 $pdf->SetFont('Times', 'B', 10);
                 $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                 $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                 $pdf->SetXY(130, 85);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                 //Atención!! el parámetro true rellena la celda con el color elegido
                 $dataAgencia =  $resultado['Items'][0]['agencia'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                 $pdf->Cell(10, 3, $dataAgencia, $bordeCelda, 0, 'L', $celdaVisible);


                  //AQUI ESCRIBO 
                  $pdf->SetFont('Times', 'B', 10);
                  $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                  $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                  $pdf->SetXY(130, 90);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                  //Atención!! el parámetro true rellena la celda con el color elegido
                  $dataiba =  $resultado['Items'][0]['iba'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                  $pdf->Cell(10, 3, $dataiba, $bordeCelda, 0, 'L', $celdaVisible);



                   //AQUI ESCRIBO 
                   $pdf->SetFont('Times', 'B', 10);
                   $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                   $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                   $pdf->SetXY(172, 90);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                   //Atención!! el parámetro true rellena la celda con el color elegido
                   $databic =  $resultado['Items'][0]['bic'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                   $pdf->Cell(10, 3, $databic, $bordeCelda, 0, 'L', $celdaVisible);


                     //AQUI ESCRIBO 
                     $pdf->SetFont('Times', 'B', 10);
                     $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                     $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                     $pdf->SetXY(65,95);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                     //Atención!! el parámetro true rellena la celda con el color elegido
                     $datatelefonoZelle =  $resultado['Items'][0]['Telefono_zelle'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                     $pdf->Cell(10, 3, $datatelefonoZelle, $bordeCelda, 0, 'L', $celdaVisible);


                     //AQUI ESCRIBO 
                     $pdf->SetFont('Times', 'B', 10);
                     $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                     $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                     $pdf->SetXY(125,94.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                     //Atención!! el parámetro true rellena la celda con el color elegido
                     $dataCorreoZelle =  $resultado['Items'][0]['correo_zelle'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                     $pdf->Cell(10, 3, $dataCorreoZelle, $bordeCelda, 0, 'L', $celdaVisible);


                      //AQUI ESCRIBO 
                      $pdf->SetFont('Times', 'B', 10);
                      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                      $pdf->SetXY(65,99);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                      //Atención!! el parámetro true rellena la celda con el color elegido
                      $dataCorreoPaypal =  $resultado['Items'][0]['Correo_paypal'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                      $pdf->Cell(10, 3, $dataCorreoPaypal, $bordeCelda, 0, 'L', $celdaVisible);





                      //AQUI ESCRIBO LOS PROPIETARIOS 
                      $pdf->SetFont('Times', 'B', 10);
                      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                      $pdf->SetXY(55,118);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                      //Atención!! el parámetro true rellena la celda con el color elegido
                      $dataNombrePropietario =  $resultado1['Items'][0]['nombre'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                      $pdf->Cell(10, 3, $dataNombrePropietario, $bordeCelda, 0, 'L', $celdaVisible);


                      //AQUI ESCRIBO LOS PROPIETARIOS 
                      $pdf->SetFont('Times', 'B', 10);
                      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                      $pdf->SetXY(130,118);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                      //Atención!! el parámetro true rellena la celda con el color elegido
                      $dataPropietariocedula =  $resultado1['Items'][0]['cedula'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                      $pdf->Cell(10, 3, $dataPropietariocedula, $bordeCelda, 0, 'L', $celdaVisible);


                      //AQUI ESCRIBO LOS PROPIETARIOS 
                      $pdf->SetFont('Times', 'B', 10);
                      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                      $pdf->SetXY(15,130);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                      //Atención!! el parámetro true rellena la celda con el color elegido
                      $dataPropietarioDireccion =  $resultado1['Items'][0]['direccion'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                      $pdf->Cell(10, 3, $dataPropietarioDireccion, $bordeCelda, 0, 'L', $celdaVisible);


                       //AQUI ESCRIBO LOS PROPIETARIOS 
                       $pdf->SetFont('Times', 'B', 10);
                       $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                       $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                       $pdf->SetXY(120,123);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                       //Atención!! el parámetro true rellena la celda con el color elegido
                       $dataPropietarioCorreo =  $resultado1['Items'][0]['correo'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                       $pdf->Cell(10, 3, $dataPropietarioCorreo, $bordeCelda, 0, 'L', $celdaVisible);


                        //AQUI ESCRIBO LOS PROPIETARIOS 
                        $pdf->SetFont('Times', 'B', 10);
                        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                        $pdf->SetXY(178,118);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                        //Atención!! el parámetro true rellena la celda con el color elegido
                        $dataPropietarioTelefono =  $resultado1['Items'][0]['telefono'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                        $pdf->Cell(10, 3, $dataPropietarioTelefono, $bordeCelda, 0, 'L', $celdaVisible);



                     
  
  
 










        $pdf->Output();