<?php

class rptcontrato
    {


/*
        function consultar_todo($cod_cont)
        {  
            $this->obj->abrir();
           $sql="SELECT  iq.*, c.*, i.*, p.* FROM contrato c left join inmuebles i on i.id_inmu=c.cod_inmu LEFT JOIN propietario p on i.id_prop = p.id_prop LEFT JOIN inquilino iq on iq.id_inqu=c.cod_inqu left join tipo_inmueble ti on ti.id_tipo=i.tip_inmu where cod_cont='".$cod_cont."' ORDER BY cod_cont desc"; //act_cont!=0
          // echo $sql;
           $tb=$this->obj->select($sql);
           $archivo=array();
           $archivo=$this->obj->todos($tb);
            $this->obj->cerrar();




           return $archivo;
        } //  fin del buscar
*/

        public function consultarContrato($valor){

      
                $dbConexion = new conexcion();
                
                $stmt = $dbConexion->conectar()->prepare("CALL usp_rptcontrato(?)");
                $stmt ->bindParam(1, $valor, PDO::PARAM_STR);
                $stmt->execute();
            
                $dataRegistro[] = $stmt->fetch();
      /*
                $dataRes = array(
                  'error' => '0',
                  'mensaje' =>  'El registro se realizo con exito.'
                );
        */        
                
                //return json_encode(array_merge($dataRegistro,$dataRes));
                //return array_merge($dataRegistro,$dataRes);
                return $dataRegistro;
        }



        function texto($cod_cont)
        {
            $fila=$this->consultarContrato($cod_cont);
            //$fila=$this->consultar_todo($cod_cont);
         /*echo" <pre>";
          print_r($fila);
          echo "</pre>";*/
          $nom_repre_legal=$fila[0]['representante_legal'];
          $prmrepre_rif=$fila[0]['representante_rif'];
          $prmrepre_cedula=$fila[0]['representante_cedula'];

          $nom_inqu=$fila[0]['nom_inqui'];
          //$ape_inqu=$fila[0]['ape_inqu'];
          $ci_inqu=$fila[0]['ci_inqui'];
          $rif_inqui=$fila[0]['rif_inqui'];
          //$nombre_representante=$fila[0]['nombre_representante'];
        //  echo $fila[0]['nom_prop'];
          $típ_inqu="";
          $nom_prop=$fila[0]['nom_prop'];
          $ape_prop="";//$fila[0]['ape_prop'];
          $ci_prop=$fila[0]['ci_prop'];
          $rif_prop=$fila[0]['rif_prop'];
          $representante_propietario=$fila[0]['representante_propietario'];
          $representante_cedula=$fila[0]['cedula_representante']; 
          $representante_rif=$fila[0]['rif_representante'];

          $tip_inmu=$fila[0]['tipo_inmueble'];
          $let_inmu="";//$fila[0]['let_inmu'];
          $dir_inmu=$fila[0]['dir_inmu'];
          $mtr_inmu=$fila[0]['mtr_inmu'];
          $uso_inmu=$fila[0]['uso'];
          $lim_nort=$fila[0]['lim_nort'];
          $lim_sur=$fila[0]['lim_sur'];
          $lim_este=$fila[0]['lim_este'];
          $lim_oest=$fila[0]['lim_oest'];
          $med_letr="";

          $let_inmu=$fila[0]['letra'];
          $dur_cont="";//$fila[0]['dur_cont'];
          $fec_desd=$fila[0]['fec_desd'];
          $fec_hast=$fila[0]['fec_hast'];
          $can_cont=$fila[0]['can_cont'];

         
         // $dataMontoLetra = $fila[0](strtoupper($prmFunciones->montoEscrito(['can_cont'],"dolares", "y", "centimos")));

          $par_cont=$fila[0]['par_cont'];
          $uso_inmu=$fila[0]['uso'];
          $tip_inqu = "";
          $nom_muni=$fila[0]['municipio'];
          $nom_parr=$fila[0]['parroquia'];
          $nom_esta=$fila[0]['estado'];
          //extract($fila);
          $condicion="";
          $firma="";
       //   echo $nom_inqu;
          $condicion1="inscrita por ante el Registro Mercantil Quinto de la Circunscripción Judicial del Distrito Capital y Estado Miranda, el día 23 de Marzo de 2007, bajo el N° 36, Tomo 1535-A y registrado en el Registro de Información Fiscal (RIF) bajo el N° J-293995272, representada en este acto por las ciudadanas NAYARY MONCADA QUITIAN y LUZ DARY QUITIAN MAYOR, venezolanas, mayores de edad, de este domicilio, titular de las Cédulas de Identidad N°s. V-14.045.976 y V-24.530.193, inscritas en el Registro de Información Fiscal (RIF) N°s. V-14045976-0 y V-24530193-2 respectivamente, en su carácter de Directoras, debidamente autorizadas por el Acta Constitutiva Estatutos, ";
    
           $txt="Entre, ADMINISTRADORA YURUARY, C.A, sociedad mercantil de este domicilio, inscrita en el Registro Mercantil Segundo de la Circunscripción Judicial del Distrito Federal y Estado Miranda, el día 9 de Agosto de 1977, bajo el N° 67, Tomo: 97-A, inscrita en el Registro de Información Fiscal (RIF) N° J-00113810-2, representada por su Director ".$nom_repre_legal.", mayor de edad, de este domicilio, Venezolano, titular de la Cédula de Identidad ".$prmrepre_cedula.", inscrito en el Registro de Información Fiscal (RIF) N° ".$prmrepre_rif." y quién a los solos y únicos efectos de este documento se denominará LA ARRENDADORA, por una parte y por la otra,  la empresa mercantil y de este domicilio ".$nom_prop." , debidamente inscrita por ante el Registro Mercantil   del , en fecha , bajo el N° , Tomo , inscrita en el Registro de Información Fiscal (RIF)  N° ".$rif_prop.",  representada en este acto por sus Directores ".$representante_propietario." , mayor de edad, de este mismo domicilio, Venezolanos, titulares de las Cédulas de Identidad N°s." .$representante_cedula.", inscritos en el Registro de Información Fiscal (RIF) N°s. ".$representante_rif." , respectivamente, quién a los solos y únicos efectos de este documento se denominará LA ARRENDATARIA, declaramos: PRIMERA: LA ARRENDADORA, procediendo en nombre y en cuenta de ".$nom_inqu.", según  Mandato  N° P-07-1924 de fecha , cede en arrendamiento a LA ARRENDATARIA, quien así lo acepta, un inmueble constituido por el  ".$tip_inmu." ".$uso_inmu.", ubicado  en ".$dir_inmu.", Parroquia ".$nom_parr.", Municipio ".$nom_muni." del  ".$nom_esta.", en esta Ciudad de Caracas. Uso: LA ARRENDATARIA destinará el inmueble arrendado, única y exclusivamente a los fines de  Comercio,  no  pudiendo  cambiar  su  destino  a menos que medie autorización escrita de parte de LA ARRENDADORA. SEGUNDA:  La duración  de  este  Contrato  es  de  un  (1)  año  fijo, prorrogable automática y sucesivamente por períodos de un (1) año, convenido desde ahora y hasta tanto una parte de aviso a la otra por escrito, antes del vencimiento del término fijo o cualquiera de su(s) prorroga(s), si las hubiere, de su voluntad de dar por terminado este contrato. Siendo en todo caso la prorroga legal contenida en la Ley de Regulación de Arrendamiento Inmobiliario para el Uso Comercial, obligatoria para LA ARRENDADORA y potestativa para LA ARRENDATARIA. Durante el lapso de prorroga legal, la relación arrendaticia se considerará a tiempo determinado y permanecerán vigentes las mismas condiciones y estipulaciones convenidas por las partes en este contrato. TERCERA: Este Contrato es a tiempo determinado y entrará en vigencia el día: 01 de septiembre de 2022 hasta el día: 31 de agosto de 2023, ambas fechas inclusive. CUARTA: Ambas partes de mutuo y amistoso acuerdo y en base a lo establecido en el Convenio Cambiario Nº 1, Gaceta Oficial de la República Bolivariana de Venezuela, Nº 6.405 Extraordinario del día 7 de septiembre  de  2018,  la  cual prescribe en su artículo 8, lo siguiente: De acuerdo con lo dispuesto en el artículo 128 del Decreto con Rango, Valor y Fuerza de ley del  Banco  Central  de  Venezuela,  el  pago  de  las  obligaciones  pactadas en moneda extranjera, será efectuado en  atención   a  lo  siguiente: a) Cuando la obligación haya sido pactada en moneda extranjera por las partes contratantes como moneda de cuenta, el pago podrá efectuarse en dicha moneda o en bolívares, al tipo de cambio vigente para la fecha del pago. b) Cuando de la voluntad  de  las  partes  contratantes se evidencie que el pago de la obligación ha de realizarse en moneda extranjera, así se efectuará, aun cuando se haya pactado en vigencia de restricciones  cambiarias,  de  acuerdo  con  la  cláusula  antes  mencionada  y a la Gaceta  Oficial  de la República Bolivariana de Venezuela Nº 6.405  Extraordinario, del día 7 de septiembre de 2018, LA ARRENDADORA y LA ARRENDATARIA convienen que el canon de  arrendamiento ha sido convenido de manera exclusiva y excluyente de la siguiente manera; Desde ".$fec_desd." hasta el ".$fec_hast.", en la cantidad de DOSCIENTOS DÓLARES AMERICANOS  ($ ".$can_cont.")  más el IVA y a partir del 01 de marzo de 2023 hasta el 31 de agosto de 2023, el canon de arrendamiento será de DOSCIENTOS CINCUENTA DÓLARES AMERICANOS  ($ 250,00) más IVA y luego se ajustará el canon de arrendamiento por convenio entre las partes, que LA ARRENDATARIA pagará por mensualidades vencidas, dentro de los primeros cinco  (5)  días  de  cada  mes,  en  el  domicilio  de  LA ARRENDADORA. La falta oportuna de pago de dos (2) mensualidades consecutivas, dará derecho a LA ARRENDADORA, Administradora Yuruary, C.A. o a quien sus  derechos represente, a demandar sin necesidad de autorización alguna ante los tribunales competentes y en cumplimiento  a  la  normativa  vigente  para  el  uso  comercial,  el desalojo, con la consecuente entrega del inmueble arrendado, siendo por la exclusiva cuenta de LA ARRENDATARIA, los gastos y honorarios profesionales que se ocasionaren por dicho concepto. QUINTA: Es condición expresa que LA ARRENDATARIA no podrá ceder o traspasar el presente contrato, ni sub-arrendar total  o  parcialmente  el inmueble objeto del mismo, sin el previo consentimiento escrito de LA ARRENDADORA. SEXTA: LA ARRENDATARIA declara expresamente recibir el inmueble objeto de este contrato, en perfecto estado de  aseo,  conservación  y  limpieza; así mismo  manifiesta que tanto la instalación eléctrica, grifos, puertas, cerraduras y demás accesorios del inmueble arrendado, se encuentran en perfecto estado de conservación y funcionamiento. En consecuencia, LA ARRENDATARIA deberá cuidar el bien objeto de este contrato con la diligencia de un buen padre de familia y devolverlo al finalizar el presente Contrato de Arrendamiento, en el mismo buen estado en que lo recibió. SEPTIMA: Cualquier mejora o bienhechuría que LA ARRENDATARIA hiciere al inmueble objeto de este contrato sin la previa autorización escrita de parte de LA ARRENDADORA, quedará en beneficio del inmueble, sin que LA ARRENDATARIA tenga nada que reclamar por dicho concepto a LA ARRENDADORA. OCTAVA: Dado el uso al cual se destinará el inmueble arrendado, será por cuenta de LA ARRENDATARIA todo lo concerniente a la permisología para que funcione en el inmueble objeto del contrato el destino del inmueble arrendado, así como la seguridad industrial, normas sanitarias y en general todas aquellas disposiciones legales que regulen la materia, siendo por  lo tanto responsable de su cumplimiento. En consecuencia, la negativa de las autoridades competentes respecto al otorgamiento de la Patente de Industria  y  Comercio  o  cualquier otro requisito requerido por la autoridades a los fines del establecimiento   o   destino   que  el  arrendatario  de  al Inmueble  arrendado,  no engendrará  responsabilidad  alguna  a  cargo de LA ARRENDADORA. NOVENA: LA ARRENDATARIA conviene y se compromete expresamente a: 1- No efectuar modificaciones a la estructura o disposición del inmueble objeto de este contrato; 2- Que sean por su sola cuenta todas las reparaciones  menores o locativas, según la costumbre y las que resulten mayores por descuido o negligencia suya o de las personas que estén bajo su dependencia;  LA  ARRENDATARIA  deberá notificar cualquier novedad dañosa dentro de los tres días naturales siguientes detección de la falla a LA ARRENDADORA; 3- Que sean por su sola cuenta el pago oportuno, del consumo  de luz, aseo domiciliario, agua y otros servicios públicos que ocupe, durante el tiempo de vigencia de este Contrato. DECIMA: LA ARRENDADORA no se hace responsable por los daños y perjuicios que pueda sufrir LA ARRENDATARIA, visitantes, familiares y terceros en general, debido a robos, saqueos, incendios, ruina o deterioro del inmueble objeto de este contrato. DECIMA PRIMERA: LA ARRENDADORA, se reserva el derecho a efectuar por sí o por medio de persona autorizada, inspecciones periódicas por lo menos cada tres (3) meses, en el inmueble objeto de este contrato, a los fines de constatar el estado en que se encuentra  y  LA  ARRENDATARIA, se obliga a prestarle toda la colaboración que requiera  para  efectuarla.  DECIMA  SEGUNDA:  Si  por   razón   de trabajos de urbanismo del Estado, queda afecto el inmueble objeto de este contrato, se considerará terminado el mismo, sin que LA ARRENDATARIA pueda reclamar ninguna indemnización por este concepto a LA ARRENDADORA. DECIMA TERCERA: Las partes expresamente señalan que cualquier notificación, aviso o comunicación relativa al presente contrato, necesariamente deberá ser hecha por escrito indicando como direcciones: para LA ARRENDADORA: Avenida Este 2,  Edificio Torre Canaima, Mezzaninas N°s 2 y 3, Los Caobos, Caracas, Municipio  Libertador  del  Distrito  Capital; Teléfono: (0212) 573.03.66, correo electrónico: gerencia@yuruaryonline.com, para LA ARRENDATARIA:  Av. Principal, Edf. Mirador, Piso PB, Of PB, Zona La Campiña, Caracas, Distrito Capital. Telefono: (0212) 731.29.62 - (0414) 125.78.23, correo electrónico: multirepuestos22@gmail.com. Tales notificaciones, se practicarán por simple carta, telegrama o por vía judicial o autentica en la persona del destinatario o en la persona mayor de edad que la reciba y en caso de no encontrarse en el inmueble persona alguna, se entenderá hecha por una copia de la misma que fije en su puerta,  la  Autoridad  respectiva.  A  los  efectos  del  recibo  de  las notificaciones, avisos  o  comunicaciones,  las  mismas  se  entenderán  recibidas  cuando  fueren  entregadas  en   las   direcciones  antes identificadas; lo anterior no excluye que LA ARRENDADORA pueda notificar a LA ARRENDATARIA por vía judicial o viceversa.  Ninguno de los medios de notificación   señalados   en   esta   cláusula,  tiene  preeminencia sobre los otros señalados y la elección de la vía para enviar la notificación, el aviso o comunicación, corresponderá al remitente. DECIMA CUARTA: Para todo lo no expresamente previsto en las Cláusulas de este Contrato, regirán las disposiciones   legales   aplicables   a   contratos   de   esta   naturaleza;  DECIMA QUINTA: La falta de cumplimiento de una cualquiera de las Cláusulas de este Contrato, será causa suficiente para que LA  ARRENDADORA  pueda   demandar   la Resolución, el Cumplimiento, el Desalojo o cualquier otra acción según el caso, para dar por terminado este contrato, siendo por cuenta de LA ARRENDATARIA,  todos   los   daños   y  perjuicios,  gastos,  costas  y honorarios que  se  causen  por  su  incumplimiento. DECIMA SEXTA: Las partes declaran de mutuo acuerdo, que el presente documento constituye el único medio regulador de la relación arrendaticia entre LA ARRENDADORA y LA ARRENDATARIA, dejando constancia de que si alguna de las partes deseare realizar alguna modificación en el texto de las cláusulas, solo serán válidas cuando se hagan por escrito y debidamente suscritas por ambas partes. DECIMA SEPTIMA: Ambas partes declaran expresamente someterse a la Ley de Regulación de Arrendamiento Inmobiliario para el Uso Comercial, Gaceta Oficial N° 40.418 del 23/05/2014. DECIMA OCTAVA: LA ARRENDATARIA para garantizar las  obligaciones que  por  este  contrato asume, entregará en calidad de depósito, la cantidad de CUATROCIENTOS DOLARES AMERICANOS ($ 400,oo), de la siguiente manera: DOSCIENTOS DOLARES AMERICANOS ($ 200,00), en el momento de la firma de este contrato y el saldo restante del depósito, es decir; la cantidad de DOSCIENTOS DOLARES AMERICANOS ($ 200,00), serán pagados en el mes de Octubre de 2022, cantidad ésta que será  reintegrada a LA ARRENDATARIA, al término de este   Contrato, una vez verificado el estado del inmueble arrendado.- DECIMA NOVENA:  Para  todos  los efectos del presente Contrato, las partes eligen como domicilio especial y exclusivo a la ciudad de Caracas, a la jurisdicción de cuyos tribunales declaran expresamente someterse. Se hacen dos (2) ejemplares a un mismo tenor y a un solo efecto y cada parte, recibe un ejemplar.-

          LA ARRENDADORA				  	  LA ARRENDATARIA
          ADMINISTRADORA YURUARY, C.A.	      MULTIREPUESTOS LA CAMPIÑA 1, C.A.



          FELIX JOSE VALDIVIEZO SALAZAR			        LUIS ALIRIO VASQUEZ QUINTERO
                        C.I. V-6.323.563				                        C.I. V-9.377.96";
    
            return $txt;
        }




    }
?>