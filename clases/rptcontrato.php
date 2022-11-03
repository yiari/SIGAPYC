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
        //  echo $fila[0]['nom_prop'];
          $típ_inqu="";
          $nom_prop=$fila[0]['nom_prop'];
          $ape_prop="";//$fila[0]['ape_prop'];
          $ci_prop=$fila[0]['ci_prop'];
          $rif_prop=$fila[0]['rif_prop'];
          $tip_inmu="";//$fila[0]['nom_tipo'];
          $let_inmu="";//$fila[0]['let_inmu'];
          $dir_inmu=$fila[0]['dir_inmu'];
          $mtr_inmu=$fila[0]['mtr_inmu'];
          $uso_inmu="";//$fila[0]['uso_inmu'];
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
    
          $txt="Entre, ADMINISTRADORA YURUARY, C.A, sociedad mercantil de este domicilio, inscrita en el Registro Mercantil Segundo de la Circunscripción Judicial del Distrito Federal y Estado Miranda, el día 9 de Agosto de 1977, bajo el N° 67, Tomo: 97-A, inscrita en el Registro de Información Fiscal (RIF) N° J-00113810-2, representada por su Director: ".$nom_repre_legal.", venezolano, mayor de edad, de este domicilio, titular de la cédula de identidad N°  ".$prmrepre_cedula.", inscrito en el Registro de Información Fiscal (RIF) N° ".$prmrepre_rif." y quién a los solos y únicos efectos de este documento se denominará LA ARRENDADORA, por una parte y por la otra, ".$nom_inqu.", ".$tip_inqu."  titular de la cédula de identidad N° ".$ci_inqu."  de este domicilio, ".$condicion." quién a los solos y únicos efectos de este documento se denominará LA ARRENDATARIA, declaramos: PRIMERA: LA ARRENDADORA, procediendo en nombre y en cuenta de ".$nom_prop." ".$ape_prop.", titular de la cédula de identidad N° ".$ci_prop.", inscrita  en  el  Registro de Información Fiscal (RIF) N° ".$rif_prop.", cede  en arrendamiento a LA ARRENDATARIA, quien así lo acepta, un inmueble constituido por un ".$tip_inmu.", identificado con el N° ".$let_inmu." en ".$dir_inmu.", Jurisdicción del Municipio ".$nom_muni.", ".$nom_parr." del Estado ".$nom_esta.", tiene un área de ".$med_letr."  (".$mtr_inmu." M²). Los linderos son: NORTE: Con ".$lim_nort.". SUR: ".$lim_sur.". ESTE: ".$lim_este." y OESTE: ".$lim_oest." Uso: El inmueble arrendado será utilizado por LA ARRENDATARIA, exclusivamente para uso ".$uso_inmu.", no pudiendo darle uso distinto al establecido en este contrato, sin el consentimiento previo dado por escrito a LA ARRENDADORA. Queda terminantemente prohibido el uso de este inmueble para los siguientes fines: Depósito de materiales inflamables, pinturas y anexos y cualquier otro fin que LA ARRENDADORA considere riesgoso para la seguridad del inmueble. En consecuencia queda prohibido, salvo autorización de LA ARRENDADORA, el cambio en el uso original del inmueble arrendado. LA ARRENDATARIA,  deberá  obtener  a  su  nombre  la   Conformidad   de   Uso,  el permiso de Bomberos y cualquier otro tipo de permiso que requieran las autoridades, no haciéndose LA ARRENDADORA responsable por la obtención o no de lo antes indicado. SEGUNDA: La duración de este Contrato es de  1 año".$dur_cont." fijo, prorrogable automática y sucesivamente por períodos iguales, convenido desde ahora y hasta tanto una parte de aviso a la otra por escrito, antes del vencimiento del término fijo o cualquiera de su(s) prorroga(s), si las hubiere, de su  voluntad  de  dar  por terminado este contrato. Siendo en todo caso la prorroga legal contenida en la Ley de Regulación de Arrendamiento Inmobiliario para el Uso Comercial, obligatoria para LA ARRENDADORA y potestativa para LA ARRENDATARIA. Durante el lapso de prorroga legal, la relación arrendaticia se considerara a tiempo determinado y permanecerán vigentes las mismas condiciones y estipulaciones convenidas por las partes en este contrato. TERCERA: Este Contrato es a tiempo determinado y entrará en vigencia el día: ".$fec_desd." hasta el día: ".$fec_hast.". CUARTA: Ambas partes de mutuo y amistoso acuerdo y en base a lo establecido en el Convenio Cambiario Nº 1, Gaceta Oficial de la República Bolivariana de Venezuela, Nº 6.405 Extraordinario del día 7 de septiembre de 2018, la cual prescribe en su artículo 8, lo siguiente: “De acuerdo con lo dispuesto en el artículo 128 del Decreto con Rango, Valor y Fuerza de ley del  Banco  Central  de  Venezuela,  el  pago  de  las  obligaciones  pactadas en moneda  extranjera,  será  efectuado  en  atención a lo siguiente: a) Cuando la obligación haya sido pactada en moneda extranjera por las partes contratantes como moneda de cuenta, el pago podrá efectuarse en dicha moneda o en bolívares, al tipo de cambio vigente para la fecha del pago. b) Cuando de la voluntad  de  las  partes  contratantes se evidencie que el pago de la obligación ha de realizarse en moneda extranjera, así se efectuará, aún cuando se haya pactado en vigencia de restricciones  cambiarias,  de  acuerdo  con  la  cláusula  antes  mencionada  y a la Gaceta  Oficial  de la República Bolivariana de Venezuela Nº 6.405  Extraordinario, del día 7 de septiembre de 2018, LA ARRENDADORA y LA ARRENDATARIA convienen  que  el canon de  arrendamiento ha  sido convenido de manera exclusiva y excluyente,  en la cantidad de ($ ".$can_cont." ) más IVA y a partir del ".$par_cont.", el canon de arrendamiento se ajustará de común acuerdo entre las partes, que LA ARRENDATARIA pagará  por mensualidades vencidas, dentro de los primeros cinco (5) días de cada mes, en el domicilio de LA ARRENDADORA. La falta oportuna de pago de dos (2)  mensualidades  consecutivas,   dará  derecho  a  LA ARRENDADORA, Administradora Yuruary, C.A. o a quien sus  derechos represente, a demandar sin necesidad de autorización alguna ante los tribunales competentes y en cumplimiento a la normativa vigente para el uso comercial, el desalojo, con la consecuente entrega del inmueble arrendado, siendo por la exclusiva cuenta de LA ARRENDATARIA, los gastos y honorarios profesionales que se ocasionaren por dicho concepto.  QUINTA: Es condición expresa que LA ARRENDATARIA no podrá ceder o traspasar el presente contrato, ni sub-arrendar total o parcialmente el inmueble objeto del mismo, sin el previo consentimiento escrito de LA ARRENDADORA. SEXTA: LA ARRENDATARIA declara expresamente recibir el inmueble objeto de este contrato, en perfecto estado  de  aseo,  conservación  y  limpieza;  así  mismo  manifiesta  que tanto  la instalación eléctrica, grifos, puertas, cerraduras y demás accesorios del inmueble arrendado, se encuentran en perfecto estado de conservación y funcionamiento. En consecuencia LA ARRENDATARIA deberá cuidar el bien objeto de este contrato con la diligencia de un buen padre de familia y devolverlo al finalizar el presente Contrato de Arrendamiento, en el mismo buen estado en que lo recibió. SEPTIMA: Cualquier mejora o bienhechuría que LA ARRENDATARIA hiciere al inmueble objeto   de   este contrato sin la precontrato autorización escrita  de parte  de  LA ARRENDADORA,   quedará    en     beneficio     del     inmueble,     sin  que   LA ARRENDATARIA tenga nada que reclamar por dicho concepto a LA ARRENDADORA. OCTAVA: Dado el uso al cual se destinará el inmueble arrendado, será por cuenta de LA ARRENDATARIA todo lo concerniente a la permisología  para  que funcione  en el inmueble objeto del contrato el destino del inmueble arrendado, así como la seguridad industrial, normas sanitarias y en general todas aquellas disposiciones legales que regulen la materia, siendo por lo tanto responsable de su cumplimiento. En consecuencia, la negativa de las autoridades competentes respecto al  otorgamiento  de  la Patente de Industria y Comercio o cualquier otro requisito requerido por la autoridades a los fines del establecimiento o destino que LA ARRENDATARIA de al Inmueble arrendado, no engendrará responsabilidad alguna a cargo de LA ARRENDADORA. NOVENA: LA ARRENDATARIA conviene y se compromete expresamente a: 1- No efectuar modificaciones a la estructura o disposición del inmueble objeto de este contrato; 2- Que sean por su sola cuenta todas las reparaciones menores o locativas, según la costumbre y las que resulten mayores por descuido o negligencia suya o de las personas que estén bajo su dependencia;  LA  ARRENDATARIA  deberá notificar cualquier novedad dañosa dentro de los tres días naturales siguientes detección de la falla a LA ARRENDADORA; 3- Que sean por su sola cuenta el pago oportuno, del consumo de luz, aseo domiciliario, agua y otros servicios públicos que ocupe, durante el tiempo de vigencia de este Contrato. DECIMA: LA ARRENDADORA no se hace responsable  por  los  daños  y  perjuicios  que pueda sufrir LA ARRENDATARIA, visitantes, familiares y terceros en general, debido a robos, saqueos, incendios, ruina o deterioro del inmueble objeto de este contrato. DECIMA PRIMERA: LA ARRENDADORA, se reserva el derecho a efectuar por sí o por medio de persona autorizada, inspecciones periódicas por lo menos cada tres (3) meses, en el inmueble objeto de este contrato, a los fines de constatar el estado en que se encuentra y LA ARRENDATARIA, se obliga a prestarle toda la colaboración que requiera para efectuarla. DECIMA SEGUNDA: Si por razón de trabajos de urbanismo del Estado, queda afecto el inmueble objeto de este contrato, se considerará terminado el mismo, sin que LA ARRENDATARIA pueda reclamar ninguna indemnización por este concepto a LA ARRENDADORA. DECIMA TERCERA: Las partes expresamente señalan que cualquier notificación, aviso o comunicación relativa al presente contrato, necesariamente  deberá  ser  hecha  por  escrito indicando como direcciones: para LA ARRENDADORA: Avenida  Este  2,  Edificio Torre Canaima, Mezzanina, Los Caobos, Caracas, Municipio Libertador del Distrito Capital; Teléfono: (0212) 571.36.80, correo electrónico: felixvaldiviezo@hotmail.com, para LA ARRENDATARIA: en el inmueble arrendado. Teléfonos: (0212) 753.13.68 – 0412-541.90.68, correo electrónico: lqmurano33@gmail.com.  Tales notificaciones, se practicarán por simple carta, telegrama o por vía judicial o autentica en la persona del destinatario o en la persona mayor de edad que la reciba y en caso de no encontrarse en el inmueble persona alguna, se entenderá hecha  por  una  copia de la misma que fije en su puerta la Autoridad respectiva. A los efectos del recibo de las notificaciones, avisos o comunicaciones, las mismas se  entenderán  recibidas  cuando  fueren  entregadas  en   las   direcciones  antes identificadas; lo anterior no excluye que LA ARRENDADORA pueda notificar a LA ARRENDATARIA por vía judicial o viceversa. Ninguno de los medios de notificación señalados en esta cláusula, tiene preeminencia  sobre  los  otros  señalados  y  la  elección  de  la  vía para encontrator la notificación, el aviso o comunicación, corresponderá al remitente. DECIMA CUARTA: Para todo lo no expresamente previsto en las Cláusulas de este Contrato, regirán las disposiciones   legales   aplicables   a   contratos   de   esta   naturaleza;  DECIMA QUINTA: La falta de cumplimiento de una cualquiera de las Cláusulas de este Contrato, será causa suficiente para que LA ARRENDADORA pueda demandar la Resolución, el Cumplimiento, el Desalojo o cualquier otra acción según el caso, para dar por terminado este contrato, siendo por cuenta de LA ARRENDATARIA, todos  los  daños  y  perjuicios,  gastos,  costas  y honorarios que se causen por su incumplimiento. DECIMA SEXTA: Las partes declaran de mutuo acuerdo, que el presente documento constituye el único medio regulador de la relación arrendaticia entre LA ARRENDADORA y LA ARRENDATARIA, dejando constancia de que si alguna de las partes deseare realizar alguna modificación en el texto de las cláusulas, solo serán válidas cuando se hagan por escrito y debidamente suscritas por ambas partes. DECIMA SEPTIMA: Ambas partes declaran expresamente someterse a la Ley de Regulación de Arrendamiento Inmobiliario  para  el  Uso  Comercial,  Gaceta  Oficial  N°  40.418  del  23/05/2014. DECIMA OCTAVA: Para todos los efectos del presente Contrato, las partes  eligen   como   domicilio   especial   y   exclusivo  a  la  ciudad  de  Caracas,   a   la jurisdicción de cuyos tribunales declaran expresamente someterse. Se hacen dos (2) ejemplares a un mismo tenor y a un solo efecto y cada parte, recibe un ejemplar. En Caracas, a la fecha de su autenticación.-  ";
    
            $firma="LA ARRENDADORA                      LA ARRENDATARIA
        ADMINISTRADORA YURUARY, C.A                       ".$nom_inqu."";
    
            return $txt;
        }




    }
?>