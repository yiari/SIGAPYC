<?php

require('../../vendor/setasign/fpdf/fpdf.php');

class PDF extends FPDF
{
	// Cabecera de p�gina
	function Header()
	{
		// Logo
		$this->Image('../../img/logo.jpg',10,10,-200,);

	}

	// Pie de p�gina
	function Footer()
	{

		$texto ="Los pagos por transferencia bancaria deben ser reportados por la dirección email: gerencia@yuruaryonline.com. Le invitamos a comunicarse con nosotros por medio del teléfono +58 (212) 5730122 o vía WhatsApp al 4243395412";

		// Posici�n: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// N�mero de p�gina
		//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		//$this->Cell(0,10, $texto .'/{nb}',0,0,'C');
		$this->Multicell(0,5,utf8_decode($texto),0,'C');	
	}
}
	//session_start();
	date_default_timezone_set('America/Caracas') ;

	/*
	|----------------------------------------
	| INCLUYO LA CLASE CORRESPONDIENTE
	|----------------------------------------
	*/

	include_once '../../app/modelos/conexcion.php';
	include_once '../../app/comunes/funciones.php';

	/*-------------------------------------*/

	require_once('../../vendor/autoload.php');
	require_once("../../clases/rpavisocobro.php");


	

	//$id_aviso= 0;//$_GET['id_prop'];
	if(isset($_GET["idaviso"])) {
  
		$idaviso_temp = $_GET["idaviso"];
	}
	$idaviso_temp=$_GET['idaviso'];
	$txt="";
	$firma="";
	$fecha=Date('Y-m-d');

	ob_start();
	$pdf = new PDF();
	$obj = new rpavisocobro();
	//$obj->set("id_cont",$id_cont);
	$texto=$obj->texto($idaviso_temp);
	$pdf->AddPage();
	$pdf->AliasnbPages();
	$pdf->SetAutoPageBreak(true, 20);


		// Insert a logo in the top-left corner at 300 dpi
		//$pdf->Image('../../img/alquileres.jpg',10,10,-300);
		//$pdf->Image('../../img/logo.jpg',10,10,-200,);


		$pdf->setFont("Arial","B",12);
		$y = $pdf->GetY();
		//$sql = "select * from propietario where id_prop='".$id_prop."'";
		//echo $sql;
	    //$tb = $mysqli->query($sql);
	    //$num = $tb->num_rows;
	    //$fila=$tb->fetch_assoc();
			$y = $pdf->GetY();
			
			$pdf->Multicell( 190,6,utf8_decode("Caracas, ".dia($fecha)." de ".mes($fecha)." de ".ano($fecha)),0,"R",0);
			$pdf->ln();	
			$pdf->cell(200,5,utf8_decode(""),0,1,"L");
			$pdf->Multicell(190,5,utf8_decode(""));		
			//$pdf->cell( 190,5,".",0,1,"L");
				$pdf->cell(60,5,"",0,1,"L");		
			$pdf->ln();	
			$pdf->setFont("Arial","",12);
			$pdf->ln();	$pdf->ln();	$pdf->ln();
			$pdf->Multicell(190,5,utf8_decode($texto));	
	
	
	$pdf->Output();	
	//$fileName = 'contrato.pdf';
	//$pdf->Output('I', $fileName);// ->header('Content-Type', 'application/pdf');
	ob_end_flush(); 




	function mes($fecha)
  {
     if ($fecha!="")
	 {
	  $mes=substr($fecha,5,2)+1-1;
	  if ($mes==1)
		  $mest="Enero";
	  Elseif ($mes==2)
		  $mest="Febrero";
	  Elseif ($mes==3)
		  $mest="Marzo";
	  Elseif ($mes==4)
		  $mest="Abril";
	  Elseif ($mes==5)
		  $mest="Mayo";
	  Elseif ($mes==6)
		  $mest="Junio";
	  Elseif ($mes==7)
		  $mest="Julio";
	  Elseif ($mes==8)
		  $mest="Agosto";
	  Elseif ($mes==9)
		  $mest="Septiembre";
	  Elseif ($mes==10)
		  $mest="Octubre";
	  Elseif ($mes==11)
		  $mest="Noviembre";
	  Elseif ($mes==12)
		  $mest="Diciembre";
	 }
	 return $mest;
  }

    function dia($fecha)
  {
     if ($fecha!="")
	 {
	  $dia=substr($fecha,8,2);
	 }
	 return $dia;
  }
      function ano($fecha)
  {
     if ($fecha!="")
	 {
	  $ano=substr($fecha,0,4);

	 }
	 return $ano;
  }
?>