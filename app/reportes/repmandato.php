<?php
	//session_start();
	date_default_timezone_set('America/Caracas') ;
	require_once("../../fpdf/fpdf.php");
	
	$id_prop=$_GET['id_prop'];
	$tipo_prop=$_GET['tipo_prop'];
	
	$fecha=Date('Y-m-d');

	//$obj=new clsdato();
	//$obj->abrir();
	//echo $id_prop;
	require "../../app/modelos/conexcion.php";
	$dbConexion = new conexcion();

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->AliasnbPages();
	$pdf->SetAutoPageBreak(true, 20);
		$pdf->setFont("Arial","B",12);
		$y = $pdf->GetY();

		$sql = "";

		if ($tipo_prop == 1){
		
			$sql = "select * from propietario where id_prop='".$id_prop."'";
		
		} elseif ($tipo_prop == 2){
		
			$sql = "select * from propietario_juridico where id_propj ='".$id_prop."'";
		
		}

		//echo $sql;
	    $tb =  $dbConexion->conectar()->query($sql);
	    //$num = $tb->num_rows;
	    $fila=$tb->fetch();
			$y = $pdf->GetY();
			$pdf->cell(60,5,"Fecha: ".$fecha,0,1,"L");
			$pdf->ln();	
			$pdf->cell(200,5,utf8_decode(""),0,1,"L");
			$pdf->Multicell( 190,5, utf8_decode(" "),0,"L",0);		
			$pdf->cell( 190,5,".",0,1,"L");
			$pdf->cell(60,5,"",0,1,"L");		
			$pdf->ln();	
			$pdf->setFont("Arial","",12);
			$pdf->Multicell( 190,5,utf8_decode("Entre la compañía Anónima ADMINISTRADORA YURUARY C.A, de este domicilio a quien en adelante se denomina LA ADMINISTRADORA representada en este acto por FELIX VALDIVIEZO mayor de edad, venezolano, con Cedula de Identidad N°. V-6.323.563, por una parte, y por la otra ").utf8_decode($fila['nom_prop'])." C.I. ".utf8_decode($fila['ced_Prop']).utf8_decode(" , a quien en adelante se denominará(n) EL PROPIETARIO, se ha celebrado el contrato contenido en las Cláusulas siguientes ").".");		
			$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();			
			$pdf->Multicell( 190,5,utf8_decode("PRIMERA: EL PROPIETARIO encomienda a LA ADMINISTRADORA la administración del inmueble de su propiedad ").utf8_decode($fila['nom_inmu'])." , ubicado ".utf8_decode($fila['dir_inmu']));
			$pdf->ln();	$pdf->ln();	
			$pdf->Multicell( 190,5,utf8_decode("SEGUNDA: En ejecución de este contrato, LA ADMINISTRADORA queda facultada para celebrar en su propio nombre los contratos de arrendamiento del referido inmueble, incluso por tiempo mayor de un (1) año, y preparar la documentación que los acredite; resolver dichos contratos antes de su vencimiento, previo consentimiento del propietario, dado por escrito, cuando LA ADMINISTRADORA lo considere conveniente, conceder prorrogas, traspasar a o autorizar traspaso; cobrar en dinero efectivo o valores que lo represente judicialmente o extrajudicial los cánones de arrendamiento y todo cuanto se derive de los mismos contratos; representar a EL PROPIETARIO ante las autoridades administrativas (especialmente la Dirección de inquilinato del Ministerio de Fomento) o jurisdiccionales para todos los asuntos concernientes a los arrendamientos y al inmueble e intentar ante los Tribunales competentes cualquier acción que deduzca de los contratos de arrendamiento respectivos, promover y hacer evacuar notificaciones e inspecciones oculares; publicar avisos y propagandas para alquiler; contraer la ejecución de reparaciones y en general, realizar todos los actos que la ley y la costumbre le asignen a los administradores de inmuebles en la Zona Metropolitana de Caracas. 
TERCERA: LA ADMINISTRADORA entrega a EL PROPIETARIO, dentro de los primeros quince (15) días de cada mes el monto de los alquileres causados en el mes inmediato anterior, a excepción de aquellos que se estén gestionando por la vía Judicial, previas deducciones previstas de este Contrato. LA ADMINISTRADORA no garantiza aquellos alquileres, reparaciones o gastos que hayan sido reembolsados por el inquilino o su fiador, EL PROPIETARIO autoriza a LA ADMINISTRADORA a debitarle en su cuenta aquellos cánones de arrendamiento que se hubiesen adelantado y pudiere LA ADMINISTRADORA cobrar posteriormente.
CUARTA: LA ADMINISTRADORA, en ejecución de este contrato, acepta la cesión de los contratos de arrendamiento celebrados con anterioridad a la fecha del presente instrumento y a tal efecto EL PROPIETARIO le hace entrega en este acto de todos los documentos y recaudos relacionados con tales contratos. En tal virtud, LA ADMINISTRADORA queda encargada de preparar la nueva documentación que se requiere y notificar a los inquilinos, tanto de este convenio como de la cesión o traspaso aludido, aun por la vía Judicial, si fuere necesario.
QUINTA: LA ADMINISTRADORA, como contra-prestación para todas las gestiones que se obliga a realizar en virtud de este contrato, percibirá la retribución del (8.50 %) por ciento, del monto de los alquileres abonados en cada liquidación mensual. La retribución antes determinada se deducirá de la cantidad abonada para monto de la liquidación de acuerdo con lo previsto en la Cláusula Tercera.
SEXTA: LA ADMINISTRADORA, por medio de abogados realizará las gestiones o diligencias administrativas o judiciales que se relacionen o deriven de los negocios o actos de la administración que aquí le encomienda EL PROPIETARIO, siendo de la exclusiva cuenta de EL PROPIETARIO el pago de los gastos y honorarios que al gestionar ocasionen. 
SEPTIMA: Los gastos judiciales que se vea precisado erogar LA ADMINISTRADORA, en virtud de procedimientos judiciales, serán por cuenta del PROPIETARIO, siempre y cuando tales gastos no sea posible recuperarlos de los arrendatarios demandados.
OCTAVA: EL PROPIETARIO reconoce y acepta como propio cualquier compromiso de LA ADMINISTRADORA, dentro de las facultades derivadas del presente contrato, contraiga en su representación para con terceras personas. EL PROPIETARIO acepta expresamente las condiciones de contratación de LA ADMINISTRADORA, respecto a los contratos de arrendamiento.
Asimismo, EL PROPIETARIO se obliga a reintegrar de inmediato los alquileres, cobrados en exceso, según Resolución o Sentencia definitiva, emanada de los Organismos encargados de la regulación de inmuebles.
NOVENA: LA ADMINISTRADORA queda autorizada para hacer todas las gestiones necesarias ante las autoridades respectivas, a fin de obtener la regulación del inmueble dado en administración, de acuerdo con la ley, en la oportunidad correspondiente, siempre y cuando así se lo solicite EL PROPIETARIO, por escrito, siendo los gastos ocasionados por esta gestión por cuenta del propietario.
DECIMA: En caso de que no fuere posible contratar el arrendamiento del inmueble por el alquiler máximo fijado, de acuerdo con la regulación hecha por el Organismo competente, LA ADMINISTRADORA procurará contratar el canon de arrendamiento más próximo al legalmente fijado.
DECIMA PRIMERA: EL PROPIETARIO es responsable frente a LA ADMINISTRADORA y los arrendatarios por la devolución de aquellos depósitos que a título de garantía haya recibido de los arrendatarios del inmueble objeto del presente contrato que no hayan sido entregados a LA ADMINISTRADORA.
DECIMA SEGUNDA: Las obligaciones y responsabilidades que se hayan causado por incumplimiento de preceptos u obligaciones legales o por efecto de la documentación que se relacione con el inmueble dado en administración y los contratos de arrendamiento de las diferentes unidades que lo integran son de cuenta exclusiva de EL PROPIETARIO, no teniendo LA ADMINISTRADORA responsabilidad alguna por tal concepto.
DECIMA TERCERA: Serán por cuenta de EL PROPIETARIO, los gastos que ocasionen los trabajos por reparaciones mayores que sean necesarias para conservar el inmueble en estado de servir para los arrendamientos.
DECIMA CUARTA: Los trabajos de reparación y conservación a que se contrae la Cláusula que antecede, deberán ser previamente participados por escrito a EL PROPIETARIO, a los efectos de que este manifieste su conformidad (igualmente por escrito), en cuanto al monto o presupuesto de las obras a realizar. Cuando la respuesta de EL PROPIETARIO no sea dada a LA ADMINISTRADORA dentro de los siete (7) días siguientes, o cuando sea urgente la realización de tales trabajos a fin de evitar peligro de daños y perjuicios al inmueble o a la persona, LA ADMINISTRADORA se entiende autorizada para la realización de tales trabajos de reparaciones que sea necesario ejecutar en el inmueble objeto del presente contrato y ocasionados por el desgaste natural o por el uso del mismo. Las reparaciones del desgaste natural correrán por cuenta de el (los) arrendatario (s) en cuyo caso LA ADMINISTRADORA procurara hacer efectivo su cobro. En aquellos casos en los cuales tal cobro no pueda hacerse efectivo, el valor de estas reparaciones será por cuenta de EL PROPIETARIO. 
DECIMA QUINTA: El montante de los pagos que efectué LA ADMINISTRADORA por cuenta de EL PROPIETARIO, de conformidad con las Cláusulas de este contrato y los cuales se estimen comprendidos dentro de las funciones inherentes al carácter de Administrador, serán deducidos por LA ADMINISTRADORA de la correspondiente liquidación mensual de alquileres, en esa oportunidad deberá enviar a EL PROPIETARIO, copia de los comprobantes que acrediten y justifiquen las respectivas deducciones.
DECIMA SEXTA: En virtud del presente contrato, LA ADMINISTRADORA se compromete a costear o a cubrir por cuenta de EL PROPIETARIO: 1) El pago de todas las primas de seguro, derechos e impuestos que causen o puedan causarse sobre el inmueble, según las instrucciones que EL PROPIETARIO le imparta por escrito. LA ADMINISTRADORA pagará por cuenta de EL PROPIETARIO, y con cargo inmediato a su cuenta, el importe de los impuestos sobre inmuebles, que establece la respectiva Ordenanza. LA ADMINISTRADORA podrá retener de la liquidación mensual que pueda corresponder a EL PROPIETARIO, un estimado de la cantidad o impuestos que se causen a fin de facilitar el pago de los mismos; 2) Los gastos que le sean propios al inmueble causados por los servicios de la luz eléctrica, teléfono, derechos y excesos en el consumo de agua, con vista a las tarifas establecidas por las compañías de electricidad, teléfono e HIDROCAPITAL; 3) Los gastos provenientes de publicación de avisos y propagandas para alquiler; 4) Los gastos ocasionados por labores de vigilancia, cuido y tratamiento del inmueble a que este contrato se refiere, mientras permanezca total o parcialmente desocupado.
DECIMA SEPTIMA: El presente contrató tendrá una duración de UN (1) año contado(s) a partir de la firma del presente documento, y se considera prorrogado por períodos iguales bajo las mismas cláusulas y condiciones aquí establecidas si una de las partes no diere aviso a la otra por escrito con un (1) mes de anticipación por lo menos, manifestando su voluntad de no prorrogarlo, ya sea dentro del término inicial o de cualquiera de sus prórrogas. En todo caso, LA ADMINISTRADORA podrá hacer entrega de la administración a EL PROPIETARIO, en cualquier momento con el solo requisito de darle aviso por escrito con un (1) mes de anticipación por lo menos. El propietario, si revocare este contrato antes del plazo señalado deberá pagar a LA ADMINISTRADORA, como justa compensación por los daños sufridos, una cantidad igual a los emolumentos que hubiera percibido desde la fecha de la revocatoria hasta la fecha inicial del plazo, calculados sobre la base de la máxima rentabilidad de los bienes administrados. Mientras no hubiere hecho este pago o cualesquiera otros de los que resulte deudor para la época de la rescisión, LA ADMINISTRADORA podrá retener los bienes registrados y sus frutos, hasta cuando, con estos se hayan cancelado dichas deudas.
DECIMA OCTAVA: En todo lo no previsto expresamente en el presente contrato, regirán para las partes las disposiciones legales vigentes para la materia. Correspondiente liquidación mensual de alquileres, en esa oportunidad deberá enviar a EL PROPIETARIO, copia de los comprobantes que acrediten y justifiquen las respectivas deducciones.
DECIMA NOVENA: El presente contrato tendrá una duración de UN (1) año contado(s) a partir de la firma del presente documento, y se considera prorrogado por periodos iguales bajo las mismas cláusulas y condiciones aquí establecidas si una de las partes no diere aviso a la otra por escrito con un (1) mes de anticipación por lo menos, manifestando su voluntad de no prorrogarlo, ya sea dentro del término inicial o de cualquiera de sus prórrogas. En todo caso, LA ADMINISTRADORA podrá hacer entrega de la administración a EL PROPIETARIO, en cualquier momento con el solo requisito de darle aviso por escrito con un (1) mes de anticipación por lo menos. El propietario, si revocare este contrato antes del plazo señalado deberá pagar a LA ADMINISTRADORA, como justa compensación por los daños sufridos, una cantidad igual a los emolumentos que hubiera percibido desde la fecha de la revocatoria hasta la fecha inicial del plazo, calculados sobre la base de la máxima rentabilidad de los bienes administrados. Mientras no hubiere hecho este pago o cualesquiera otros de los resulte deudor para la época de la rescisión, LA ADMINISTRADORA podrá retener los bienes registrados y sus frutos, hasta cuando, con estos se hayan cancelado dichas deudas.
VIGESIMA: En todo lo no previsto expresamente en el presente contrato, regirán para las partes las disposiciones legales vigentes para la materia.
VIGESIMA PRIMERA: Para todos los efectos del presente contrato, de sus derivados y consecuencias, las partes eligen como domicilio especial a la ciudad de Caracas, y se someten a la jurisdicción de los Tribunales del Distrito Federal.
Hecho en tres (3) ejemplares de un mismo tenor y a un solo efecto.
"));		
			$pdf->ln();				
			$pdf->ln();	
			$pdf->ln();	
						$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();			
			$pdf->ln();				
			$pdf->ln();	
			$pdf->ln();	
						$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();			
			$pdf->ln();				
			$pdf->ln();	
			$pdf->ln();	
						$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();			
			$pdf->ln();				
			$pdf->ln();	
			$pdf->ln();	
						$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();				$pdf->ln();			
	
			$pdf->Multicell( 190,5,utf8_decode("Caracas, ".dia($fecha)." de ".mes($fecha)." de ".ano($fecha).".                                       

            INVERSIONES ALISASU 2, C.A.                                ADMINISTRADORA YURUARY, C.A. 		                  
  


   ______________________________                                  ______________________________   



   CONCEPCIÓN LOPEZ DE LORENZO                                               FELIX VALDIVIEZO                                                                                            
                                                                                                           
   ______________________________                                  ______________________________   
                    
                                                                                                   
  MERCEDES COROMOTO BALTASAR ZAMBRANO
                                                                                                 
                                                                                                
 ________________________________________


 ANA MARIA BALTAZAR DE BRAVO
                                                                                               

 ___________________________________    , "),0,"L",0);		
			$pdf->ln();
			$pdf->ln();
			$pdf->ln();
			$pdf->ln();			
		
   
	$pdf->Output();	
	

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