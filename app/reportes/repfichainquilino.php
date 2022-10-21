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



try {

    $dbConexion = new conexcion();
    $valor = 0;
    
    $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documentoinquilino(?,?)" );
    $stmt ->bindParam(1, $idinqu_temp, PDO::PARAM_INT);
    $stmt ->bindParam(2, $codtip_temp, PDO::PARAM_INT);

  
    $stmt->execute();
    $dataRegistrodocumentos= $stmt->fetchall();
  
   /*
    $dataRes = array(
      'error' => '0',
      'mensaje' =>  'El registro se obtuvo con exito.'
    );
   */ 
    $resultado4 = $dataRegistrodocumentos; // array_merge($dataRegistroInmueble,$dataRes);
  
  
    } catch (\Throwable $th) {
    
        //$pdo->rollBack() ;
        //echo "Mensaje de Error: " . $th->getMessage();
        $dataRes = array(
          'error' => '1',
          'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
        );
  
        $resultado4 = $dataRes;
  
    }
  
  //if ($resultado3['error'] == 0){
  //echo "imprimimos el PDF";
  //echo $resultado2['items'][0]['id_prop'];
  //}
  


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
    $pdf->SetXY(100, 27);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
    //Atención!! el parámetro true rellena la celda con el color elegido
    $dataCodigo =  $resultado['Items'][0]['inquilino'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
    $pdf->Cell(10, 3, $dataCodigo, $bordeCelda, 0, 'L', $celdaVisible);



      //AQUI ESCRIBO EL NOMBRE DEL INQUILINO
      $pdf->SetFont('Times', 'B', 9);
      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
      $pdf->SetXY(100, 31.8);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
      //Atención!! el parámetro true rellena la celda con el color elegido
      $dataInquilino =  $resultado['Items'][0]['nombre'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
      $pdf->Cell(10, 3, $dataInquilino, $bordeCelda, 0, 'L', $celdaVisible); 

      
      //AQUI ESCRIBO 
      $pdf->SetFont('Times', 'B', 9);
      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
      $pdf->SetXY(100, 36);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
      //Atención!! el parámetro true rellena la celda con el color elegido
      $dataCedula =  $resultado['Items'][0]['cedula'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
      //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
      $pdf->Cell(10, 3, $dataCedula, $bordeCelda, 0, 'L', $celdaVisible); 


      //AQUI ESCRIBO 
      $pdf->SetFont('Times', 'B', 9);
      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
      $pdf->SetXY(100, 41);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
      //Atención!! el parámetro true rellena la celda con el color elegido
      $dataRif=  $resultado['Items'][0]['rif'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
      //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
      $pdf->Cell(10, 3, $dataRif, $bordeCelda, 0, 'L', $celdaVisible); 


      //AQUI ESCRIBO 
      $pdf->SetFont('Times', 'B', 9);
      $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
      $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
      $pdf->SetXY(100, 45);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
      //Atención!! el parámetro true rellena la celda con el color elegido
      $dataTelefono=  $resultado['Items'][0]['celular'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
      //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
      $pdf->Cell(10, 3, $dataTelefono, $bordeCelda, 0, 'L', $celdaVisible); 


       //AQUI ESCRIBO 
       $pdf->SetFont('Times', 'B', 9);
       $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
       $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
       $pdf->SetXY(100, 45);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
       //Atención!! el parámetro true rellena la celda con el color elegido
       $dataTelefono=  $resultado['Items'][0]['celular'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
       //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
       $pdf->Cell(10, 3, $dataTelefono, $bordeCelda, 0, 'L', $celdaVisible);

       //AQUI ESCRIBO 
       $pdf->SetFont('Times', 'B', 9);
       $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
       $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
       $pdf->SetXY(100, 50);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
       //Atención!! el parámetro true rellena la celda con el color elegido
       $dataTelefono=  $resultado['Items'][0]['correo'];  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
       //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
       $pdf->Cell(10, 3, $dataTelefono, $bordeCelda, 0, 'L', $celdaVisible);


        //AQUI ESCRIBO EL CODIGO DEL INQUILINO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(102, 59.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataContrato =  $resultado['Items'][0]['codigo'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
        $pdf->Cell(10, 3, $dataContrato, $bordeCelda, 0, 'L', $celdaVisible);


        //AQUI ESCRIBO CODOGO DEL INMUEBLE
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(45, 64.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
       
        if($resultado['Items'][0]['unidad'] != ''){
            $dataInmueble =  $resultado['Items'][0]['unidad']; 
        }else{
            $dataInmueble =  $resultado['Items'][0]['inmuebles']; 
        }
      
        
        $pdf->Cell(10, 3, $dataInmueble, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO LA DIRECCION DEL INMUEBLE
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(32,73.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
        
         if($resultado['Items'][0]['unidad'] != ''){
             $datadireccion =  $resultado['Items'][0]['direccion_unidad']; 
         }else{
             $datadireccion =  $resultado['Items'][0]['direccion_inmueble']; 
         }
       
         
         $pdf->Cell(10, 3, $datadireccion, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO LETRA DEL IMUEBLE
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(160,64.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
        
         if($resultado['Items'][0]['unidad'] != ''){
             $dataLetra =  $resultado['Items'][0]['letra_unidad']; 
         }else{
             $dataLetra =  $resultado['Items'][0]['letra_imueble']; 
         }
       
         
         $pdf->Cell(10, 3, $dataLetra, $bordeCelda, 0, 'L', $celdaVisible);


          //AQUI ESCRIBO ACTIVIDA / USO DEL INMUEBLE
          $pdf->SetFont('Times', 'B', 9);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(45,69);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
         
          if($resultado['Items'][0]['unidad'] != ''){
              $dataUso =  $resultado['Items'][0]['activis_unidad']; 
          }else{
              $dataUso =  $resultado['Items'][0]['activida_inmueble']; 
          }
        
          
          $pdf->Cell(10, 3, $dataUso, $bordeCelda, 0, 'L', $celdaVisible);



        //AQUI ESCRIBO EL CANON DEL INMUEBLE
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(160, 69);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCanon =  $resultado['Items'][0]['canon'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
        $pdf->Cell(10, 3, $dataCanon, $bordeCelda, 0, 'L', $celdaVisible);



        //AQUI ESCRIBO EL CODIGO PROPIETARIO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(90, 83.3);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCodPropietario =  $resultado['Items'][0]['propietario'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
        $pdf->Cell(10, 3, $dataCodPropietario, $bordeCelda, 0, 'L', $celdaVisible);

        //AQUI ESCRIBO EL CEDULA DEL PROPIETARIO
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(135, 88);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataCodPropietariocedula =  $resultado['Items'][0]['cedulapropietario'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
        $pdf->Cell(10, 3, $dataCodPropietariocedula, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL RIF DEL PROPIETARIO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(175, 88);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCodPropietarioRif =  $resultado['Items'][0]['rifpropietario'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
         $pdf->Cell(10, 3, $dataCodPropietarioRif, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL CORREO DEL PROPIETARIO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(30, 88);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCodPropietarioCorreo =  $resultado['Items'][0]['correopropietario'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
         $pdf->Cell(10, 3, $dataCodPropietarioCorreo, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO EL CELULAR DEL PROPIETARIO
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(30, 97.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCodPropietarioCelular =  $resultado['Items'][0]['celularpropieatrio'];  //$dataResPersonal['nombres'] . ' ' . $dataResPersonal['apellidos'];
         $pdf->Cell(10, 3, $dataCodPropietarioCelular, $bordeCelda, 0, 'L', $celdaVisible);



        //AQUI ESCRIBO PAGADOR DE INQUILINO 
        $pdf->SetFont('Times', 'B', 9);
        $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
        $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
        $pdf->SetXY(90,106.8);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
        //Atención!! el parámetro true rellena la celda con el color elegido
        $dataNombrePagador =  $resultado1['Items'][0]['codigo'];  
        $pdf->Cell(10, 3, $dataNombrePagador, $bordeCelda, 0, 'L', $celdaVisible);



         //AQUI ESCRIBO PAGADOR DE INQUILINO 
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(55,112);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataNombrePagador =  $resultado1['Items'][0]['nombre'];  
         $pdf->Cell(10, 3, $dataNombrePagador, $bordeCelda, 0, 'L', $celdaVisible);


         //AQUI ESCRIBO PAGADOR DE INQUILINO 
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(135,116.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataCedulaPagador =  $resultado1['Items'][0]['cedula'];  
         $pdf->Cell(10, 3, $dataCedulaPagador, $bordeCelda, 0, 'L', $celdaVisible);

         //AQUI ESCRIBO PAGADOR DE INQUILINO 
         $pdf->SetFont('Times', 'B', 9);
         $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
         $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
         $pdf->SetXY(175,116.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
         //Atención!! el parámetro true rellena la celda con el color elegido
         $dataRifPagador =  $resultado1['Items'][0]['rif'];  
         $pdf->Cell(10, 3, $dataRifPagador, $bordeCelda, 0, 'L', $celdaVisible);


          //AQUI ESCRIBO PAGADOR DE INQUILINO 
          $pdf->SetFont('Times', 'B', 9);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(30,116.5);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
          $dataCorreoPagador =  $resultado1['Items'][0]['correo'];  
          $pdf->Cell(10, 3, $dataCorreoPagador, $bordeCelda, 0, 'L', $celdaVisible);

          //AQUI ESCRIBO PAGADOR DE INQUILINO 
          $pdf->SetFont('Times', 'B', 9);
          $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
          $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
          $pdf->SetXY(30,121);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
          //Atención!! el parámetro true rellena la celda con el color elegido
          $dataTelefonoPagador =  $resultado1['Items'][0]['telefono'];  
          $pdf->Cell(10, 3, $dataTelefonoPagador, $bordeCelda, 0, 'L', $celdaVisible);



           //AQUI ESCRIBO PAGADOR DE INQUILINO 
           $pdf->SetFont('Times', 'B', 9);
           $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
           $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
           $pdf->SetXY(30,127);//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
           //Atención!! el parámetro true rellena la celda con el color elegido
           $dataTelefonoPagador =  $resultado1['Items'][0]['direccion'];  
           $pdf->Cell(10, 3, $dataTelefonoPagador, $bordeCelda, 0, 'L', $celdaVisible);




           $valor = [$resultado4];
                  $contadorFila = 0;
                  $PosY = 145;
                   foreach ($resultado4 as $valor) {

                   //AQUI ESCRIBO  LOS REPRESENTANTES O APODERADORS DE UN PROPIETARIO
                   
                   $pdf->SetFont('Times', 'B', 9);
                   $pdf->SetTextColor($fontColorContenido['r'], $fontColorContenido['g'], $fontColorContenido['b']);
                   $pdf->SetFillColor(2, 157, 116); //Fondo verde de celda
                   $pdf->SetXY(15,$PosY);;//AQUI SE AJUSTA LA POSICION DONDE SE DEBE COLOCAR EL TEXTO
                   //Atención!! el parámetro true rellena la celda con el color elegido
                   //$datapersona =  $resultado4['documento'] ;  //$dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'];
                   $datapersona = strtoupper($prmFunciones->documento($valor['documento']));
                   //$dataNombre = str_pad($dataResPersonal['nombrespastor'] . ' ' . $dataResPersonal['apellidospastor'], 50, '* ', STR_PAD_RIGHT);
                   $pdf->Cell(10, 3, $datapersona, $bordeCelda, 0, 'L', $celdaVisible);

                  
                  
                   $contadorFila++;
                   $PosY += 5;
                   }




        
        
       
       


    $pdf->Output();