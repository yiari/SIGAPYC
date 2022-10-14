<?
  include_once '../../app/modelos/conexcion.php';
  include_once '../../app/comunes/funciones.php';

  /*-------------------------------------*/

  require_once('../../vendor/autoload.php');
  date_default_timezone_set('America/Caracas') ;
  class reportepdf extends fpdf
  {
     var $fecha="";
     var $codigo="";
     var $desde="";
     var $hasta="";
     var $tipo="";
     var $cliente="";
    function reportepdf()
	{
	   $this->fpdf("P","mm","Letter");
	   $this->fecha=date("d/m/Y");
	}
    function header()
	{
    	$this->Image("img/logo.jpg",10,0,20,20,"JPG");
 	   // $this->desde=$_POST['fec_desd'];
	   // $this->hasta=$_POST['fec_hast'];
	    //$this->tipo=$_POST['cod_tipo'];
	    //$this->agencia=$_POST['cod_agen'];
	   // $this->cliente=$_POST['rem_envi'];
		$this->ln();
		$this->ln();		
		$this->ln();	$this->ln();	$this->ln();	$this->ln();	$this->ln();

    	$this->setFont("Arial","B",14);
    	$this->Cell(0,5," Inquilinos ",0,0,"C");
		$this->ln();
    	/*$this->setFont("Arial","I",10);
		$this->Cell(0,5,"Desde: ".$this->desde." hasta:".$this->hasta,0,0,"C");
		$this->ln();*/
		$objbd=new clsdato();
		/*if ($this->cliente!="*")
		{	
			if ($this->cliente!="00")
			{	
				$sql1="select *  from cliente  where cod_clie='".$this->cliente."'";
				$result=$objbd->select($sql1);
				$fila=$objbd->siguiente($result);
				$cliente=$fila['nom_clie'];
				$this->Cell(0,5,"Cliente: ".$cliente ,0,0,"C");
			}
			else
			{	
				$this->Cell(0,5,"Cliente Eventual" ,0,0,"C");
			}
			$this->ln();
		}
		if ($this->tipo!="*")
		{	
			$sql1="select *  from tipo_envio where cod_tipo='".$this->tipo."'";
			$result=$objbd->select($sql1);
			$fila=$objbd->siguiente($result);
			$tipo=$fila['nom_tipo'];
			$this->Cell(0,5,"Tipo: ".$tipo,0,1,"C");
		}
		if ($this->agencia!="*")
		{	
			$sql1="select *  from agencia where cod_agen='".$this->agencia."'";
			$result=$objbd->select($sql1);
			$fila=$objbd->siguiente($result);
			$agencia=$fila['nom_agen'];
			$this->Cell(0,5,"Agencia: ".$agencia,0,1,"C");
		}
		$this->ln();
		$this->setFont("Arial","BU",12);
    	$this->Cell(10,5,"Nro.",0,0,"L");
    	$this->Cell(30,5,"Comprobante",0,0,"L");
		$this->Cell(22,5,"Fecha",0,0,"L");
		$this->Cell(18,5,"Tipo",0,0,"L");
		$this->Cell(75,5,"Remitente",0,0,"L");
		$this->Cell(22,5,"Peso",0,0,"R");
		$this->Cell(22,5,"Monto",0,0,"R");*/
			$this->ln();	$this->ln();	$this->ln();	$this->ln();	$this->ln();

	}
	function footer()
	{
	     $this->setY(-15);
		 $this->setFont("Arial","I",8);
		$this->cell(0,4,"Fecha: $this->fecha",0,0,"L");
   		$this->cell(0,4,"Pagina:".$this->PageNo()."/{nb}",0,0,"R");
		$this->ln();
	}
}// Clase

	$obj=new reportepdf();
	$obj->AliasnbPages();
	$obj->addPage();
	$objbd=new clsdato();
    $id_inqu=$_GET['id'];
    $tipo=$_GET['tipo'];
  /* 
  //  $bhasta=$objbd->fecha($obj->hasta);
  //  $bdesde=$objbd->fecha($obj->desde);
    if ($tipo="Persona")
	{
		$sql="SELECT *, concat(nom_inqu,' ',ape_inqu) as nombre, iq.id_inqu as id , concat(nom_prop,' ',ape_prop) as nombrep FROM  inquilino iq LEFT JOIN contrato c on iq.id_inqu=c.cod_inqu     left join inmuebles i on i.id_inmu=c.cod_inmu LEFT JOIN propietario p on i.id_prop = p.id_prop  left join tipo_inmueble ti on ti.id_tipo=i.tip_inmu where iq.id_inqu='$id_inqu' ORDER BY cod_cont desc";
		//$sql="SELECT *, concat(nom_inqu,' ',ape_inqu) as nombre, p.id_inqu as id FROM `inquietario` p left join inmuebles i on i.id_inqu=p.`id_inqu` where p.id_inqu='$id_inqu'";
	}
    else
	{
		$sql="SELECT *, nom_inqj as nombre, iq.id as id , concat(nom_prop,' ',ape_prop) as nombrep FROM  inquilino iq LEFT JOIN contrato c on iq.id_inqu=c.cod_inqu     left join inmuebles i on i.id_inmu=c.cod_inmu LEFT JOIN propietario p on i.id_prop = p.id_prop  left join tipo_inmueble ti on ti.id_tipo=i.tip_inmu where iq.id_inqu='$id_inqu' ORDER BY cod_cont desc";
	}
	
	//echo $sql; 
	$total=array();
/*	$total['monto']=0;
	$total['numero']=0;
	$sql1="select *  from maestro";
	$result=$objbd->select($sql1);
	$fila=$objbd->siguiente($result);
	*/
	
	$objbd->abrir();
	$tb=$objbd->select($sql);
		//echo $sql;
		$i=1;
		$aux="";
		//	$obj->cell(0,5,utf8_decode( "Código:1"),0,1,"L");
			while ($row=$objbd->siguiente($tb))
		{
		//		$obj->cell(0,5,utf8_decode( "Código:2"),0,1,"L");
			if ($aux!=$row["id"])
			{
				$obj->cell(0,5,utf8_decode( "Código:".$row["cod_inqu"]),0,1,"L");
				$obj->cell(0,5,utf8_decode("Nombre:".$row["nombre"]),0,1,"L");
				$obj->cell(0,5,utf8_decode("Teléfono:".$row["loc_inqu"]),0,1,"L");
				$obj->cell(0,5,utf8_decode("Celular:".$row["cel_inqu"]),0,1,"L");
				$obj->cell(0,5,utf8_decode("Correo:".$row["cor_inqu"]),0,1,"L");
				$aux=$row["id"];
				$obj->ln();
				$obj->setFont("Arial","BU",12);
		    	$obj->Cell(30,5,utf8_decode("Código"),0,0,"L");
		    	$obj->Cell(20,5,"Letra/Nro",0,0,"L");
				$obj->Cell(80,5,utf8_decode("Dirección"),0,0,"L");
	//			$obj->Cell(18,5,"% Administración",0,0,"L");
				$obj->Cell(80,5,"Propietario",0,0,"L");
				$obj->ln();
			}

		$total['numero']++;
		/*$base=($row["mon_envi"]-$row["imp_envi"])/(1+$fila["iva"]);
		$iva=$base*$fila["iva"];
		$pago=$base*$fila["porcentaje"];*/
		$obj->setFont("Arial","",10);
		$obj->cell(30,5,utf8_decode($row["id_inmu"]),0,0,"L");
		$obj->cell(20,5,utf8_decode($row["let_inmu"]),0,0,"L");
		$obj->cell(80,5,utf8_decode($row["dir_inmu"]),0,0,"L");
		//$obj->cell(75,5,$row["por_admi"],0,0,"L");
		$obj->cell(80,5,utf8_decode($row["nombrep"]),0,0,"L");
		$obj->ln();
	}
//	$obj->cell(155,5,"Total: ".$total["numero"]." Registros",1,0,"R");
//	$obj->cell(44,5,number_format($total['monto'], 2, ",","."),1,0,"R");
	$objbd->cerrar();
	
	$obj->output();
  

?>