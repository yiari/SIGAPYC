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
$pdf->setSourceFile("fichainquilino.pdf");
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

$idinqu_temp = 0;
$codinqu_temp = "";
$codtip_temp = 0;


if(isset($_GET["idinq"])) {
  
    $idinqu_temp = $_GET["idinq"];
}


if(isset($_GET["codinq"])) {
  
    $codpro_temp = $_GET["codinq"];
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
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarbitacorainquilino(?,?)" );
    $stmt ->bindParam(1, $idinqu_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codtip_temp, PDO::PARAM_INT);


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
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_verpagador(?,?)" );
    $stmt ->bindParam(1, $idinqu_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codtip_temp, PDO::PARAM_INT);


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

    //AQUI ESCRIBO LA FECHA DE INPRESION DEL LA FECHA FICHA INQUILINO
    $pdf->SetFont('Times', 'B', 9);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(180, 20);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataFecha =  date('d-m-Y ');  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
    $pdf->Cell(10, 3, $dataFecha, $bordeCelda, 0, 'L', $celdaVisible);

    


    //AQUI ESCRIBO EL CODIGO DEL INQUILINO
    $pdf->SetFont('Times', 'B', 9);
    $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
    $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
    $pdf->SetXY(112, 27);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataCodigo =  $resultado['Items'][0]['inquilino'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
    $pdf->Cell(10, 3, $dataCodigo, $bordeCelda, 0, 'L', $celdaVisible);



      //AQUI ESCRIBO EL NOMBRE DEL INQUILINO
      $pdf->SetFont('Times', 'B', 9);
      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
      $pdf->SetXY(112, 31.8);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
      //Atención!! el parámetro true rellena la celda con el color elegido
      $dataInquilino =  $resultado['Items'][0]['nombre'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
      $pdf->Cell(10, 3, $dataInquilino, $bordeCelda, 0, 'L', $celdaVisible); 

      
      //AQUI ESCRIBO 
      $pdf->SetFont('Times', 'B', 9);
      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
      $pdf->SetXY(112, 36);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
      //Atención!! el parámetro true rellena la celda con el color elegido
      $dataCedula =  $resultado['Items'][0]['cedula'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
      //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
      $pdf->Cell(10, 3, $dataCedula, $bordeCelda, 0, 'L', $celdaVisible); 


      //AQUI ESCRIBO 
      $pdf->SetFont('Times', 'B', 9);
      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
      $pdf->SetXY(112, 41);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
      //Atención!! el parámetro true rellena la celda con el color elegido
      $dataRif=  $resultado['Items'][0]['rif'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
      //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
      $pdf->Cell(10, 3, $dataRif, $bordeCelda, 0, 'L', $celdaVisible); 


      //AQUI ESCRIBO 
      $pdf->SetFont('Times', 'B', 9);
      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
      $pdf->SetXY(112, 45);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
      //Atención!! el parámetro true rellena la celda con el color elegido
      $dataTelefono=  $resultado['Items'][0]['celular'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
      //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
      $pdf->Cell(10, 3, $dataTelefono, $bordeCelda, 0, 'L', $celdaVisible); 


       //AQUI ESCRIBO 
       $pdf->SetFont('Times', 'B', 9);
       $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
       $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
       $pdf->SetXY(112, 45);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
       //Atención!! el parámetro true rellena la celda con el color elegido
       $dataTelefono=  $resultado['Items'][0]['celular'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
       //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
       $pdf->Cell(10, 3, $dataTelefono, $bordeCelda, 0, 'L', $celdaVisible);

       //AQUI ESCRIBO 
       $pdf->SetFont('Times', 'B', 9);
       $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
       $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
       $pdf->SetXY(112, 50);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
       //Atención!! el parámetro true rellena la celda con el color elegido
       $dataTelefono=  $resultado['Items'][0]['correo'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
       //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
       $pdf->Cell(10, 3, $dataTelefono, $bordeCelda, 0, 'L', $celdaVisible);


        //AQUI ESCRIBO EL CODIGO DEL INQUILINO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(120, 59.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataContrato =  $resultado['Items'][0]['codigo'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
        $pdf->Cell(10, 3, $dataContrato, $bordeCelda, 0, 'L', $celdaVisible);


        //AQUI ESCRIBO 
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(45, 69);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
       
        if($resultado['Items'][0]['unidad'] != ''){
            $dataInmueble =  $resultado['Items'][0]['unidad']; 
        }else{
            $dataInmueble =  $resultado['Items'][0]['inmuebles']; 
        }
      
        
        $pdf->Cell(10, 3, $dataInmueble, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO 
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(35,78);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
        
         if($resultado['Items'][0]['unidad'] != ''){
             $datadireccion =  $resultado['Items'][0]['direccion_unidad']; 
         }else{
             $datadireccion =  $resultado['Items'][0]['direccion_inmueble']; 
         }
       
         
         $pdf->Cell(10, 3, $datadireccion, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO 
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(125,69);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
        
         if($resultado['Items'][0]['unidad'] != ''){
             $dataLetra =  $resultado['Items'][0]['letra_unidad']; 
         }else{
             $dataLetra =  $resultado['Items'][0]['letra_imueble']; 
         }
       
         
         $pdf->Cell(10, 3, $dataLetra, $bordeCelda, 0, 'L', $celdaVisible);


          //AQUI ESCRIBO 
          $pdf->SetFont('Times', 'B', 9);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(182,69);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
         
          if($resultado['Items'][0]['unidad'] != ''){
              $dataUso =  $resultado['Items'][0]['activis_unidad']; 
          }else{
              $dataUso =  $resultado['Items'][0]['activida_inmueble']; 
          }
        
          
          $pdf->Cell(10, 3, $dataUso, $bordeCelda, 0, 'L', $celdaVisible);



        //AQUI ESCRIBO EL CODIGO DEL INQUILINO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(168, 78);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCanon =  $resultado['Items'][0]['canon'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
        $pdf->Cell(10, 3, $dataCanon, $bordeCelda, 0, 'L', $celdaVisible);



        //AQUI ESCRIBO EL CODIGO DEL INQUILINO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(30, 97.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCodPropietario =  $resultado['Items'][0]['propietario'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
        $pdf->Cell(10, 3, $dataCodPropietario, $bordeCelda, 0, 'L', $celdaVisible);

        //AQUI ESCRIBO EL CODIGO DEL INQUILINO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(128, 97.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCodPropietariocedula =  $resultado['Items'][0]['cedulapropietario'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
        $pdf->Cell(10, 3, $dataCodPropietariocedula, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL CODIGO DEL INQUILINO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(165, 97.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCodPropietarioRif =  $resultado['Items'][0]['rifpropietario'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
         $pdf->Cell(10, 3, $dataCodPropietarioRif, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL CODIGO DEL INQUILINO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(30, 107);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCodPropietarioCorreo =  $resultado['Items'][0]['correopropietario'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
         $pdf->Cell(10, 3, $dataCodPropietarioCorreo, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL CODIGO DEL INQUILINO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(128, 106.8);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCodPropietarioCelular =  $resultado['Items'][0]['celularpropieatrio'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
         $pdf->Cell(10, 3, $dataCodPropietarioCelular, $bordeCelda, 0, 'L', $celdaVisible);

        //AQUI ESCRIBO EL CODIGO DEL INQUILINO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(102, 116);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCodpagador =  $resultado1['Items'][0]['codigop'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
         $pdf->Cell(10, 3, $dataCodpagador, $bordeCelda, 0, 'L', $celdaVisible);
        
       
       


    $pdf->Output();