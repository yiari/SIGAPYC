<?php
 require_once("clsdatos.php");// incluimos la clase de datos (Modelo)
   class clscontrato
    {
        private $cod_cont;
        private $cod_inqu;
        private $cod_inmu;
        private $can_cont;
        private $fec_desd;
        private $fec_hast;
        private $per_pror;
        private $dia_pago;
        private $ins_cont;
        private $fec_cont;
        private $adm_inmu;
        private $pap_inmu;
        private $iva_inmu;
        private $imp_inmu;
        private $dep_cont;
        private $com_cont;
        private $hab_cont;
        private $for_cont;
        private $por_rete;
        private $ret_cont;
        private $pas_cont;


       public $obj;


       function __construct()
       {
        $this->obj= new clsdato();// instanciando la clase datos
       }// fin de blog

       function incluir()
       {
          $this->obj->abrir();
          $sql="INSERT INTO `contrato` (`cod_cont`, `cod_inqu`, `cod_inmu`, `can_cont`, `fec_desd`, `fec_hast`, `per_pror`, `dia_pago`, `pas_cont`, `ins_cont`, `fec_cont`, `adm_inmu`, `pap_inmu`, `iva_inmu`, `imp_inmu`, `dep_cont`, `com_cont`, `hab_cont`, `for_cont`, `por_rete`, `ret_cont`) VALUES ('".$this->cod_cont."','".$this->cod_inqu."','".$this->cod_inmu."','".$this->can_cont."','".$this->fec_desd."','".$this->fec_hast."','".$this->per_pror."','".$this->dia_pago."','".$this->pas_cont."','".$this->ins_cont."','".$this->fec_cont."','".$this->adm_inmu."','".$this->pap_inmu."','".$this->iva_inmu."','".$this->imp_inmu."','".$this->dep_cont."','".$this->com_cont."','".$this->hab_cont."','".$this->for_cont."','".$this->por_rete."','".$this->ret_cont."')";
        
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

       function modificar()
       {
          $this->obj->abrir();
          $sql='update contrato set cod_inqu="'.$this->cod_inqu.'", 
          cod_inmu="'.$this->cod_inmu.'", can_cont="'.$this->can_cont.'" where cod_cont="'.$this->cod_cont.'"';
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

       function activar()
       {
          $this->obj->abrir();
          $sql='update contrato set act_cont=1 where cod_cont="'.$this->cod_cont.'"';
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

       function desactivar()
       {
          $this->obj->abrir();
          $sql='update contrato set act_cont=0 where cod_cont="'.$this->cod_cont.'"';
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

       function eliminar()
       {
            $this->obj->abrir();
        $sql='delete from contrato where cod_cont="'.$this->cod_cont.'"';
           $exito=$this->obj->select($sql);
           $this->obj->cerrar();
          return $exito;
       }

     function buscar()
       {
        //echo "uno";
          $this->obj->abrir();
          $sql='select * from contrato where cod_cont="'.$this->cod_cont.'"';
         // echo $sql;
          $tb=$this->obj->select($sql);
          $exito=0;
          if ($fila=$this->obj->siguiente($tb))
          {
            $this->cod_cont=$fila['cod_cont'];
            $this->cod_inqu=utf8_encode($fila['cod_inqu']);
            $this->cod_inmu=utf8_encode($fila['cod_inmu']);
            $this->can_cont=$fila['can_cont'];
            $this->act_cont=$fila['act_cont'];            
            $exito=1;
          }
           $this->obj->cerrar();
          // echo "<br>exito".$exito;
          return $exito;
       } //  fin del buscar
//////////////////  consultar  ///////////////////////////

      function consultar()
       {  
           $this->obj->abrir();
          $sql="select *  from contrato   ORDER BY cod_cont desc"; //act_cont!=0
     // echo $sql;
          $tb=$this->obj->select($sql);
          $archivo=array();
          $archivo=$this->obj->todos($tb);
           $this->obj->cerrar();
          return $archivo;
       } //  fin del buscar



      function consultar_e($condicion='1=1')
       {  
          $this->obj->abrir();
          $sql="select *  from contrato where $condicion and act_cont!=0  ORDER BY fec_inic desc"; //act_cont!=0
     // echo $sql;
          $tb=$this->obj->select($sql);
          $archivo=array();
          $archivo=$this->obj->todos($tb);
           $this->obj->cerrar();
          return $archivo;
       } //  fin del buscar



      function consultar_n($condicion='1=1', $n)
       {  
           $this->obj->abrir();
         $sql="select *
                from contrato 
                where $condicion  and  act_cont!=0 
                ORDER BY cod_cont desc LIMIT $n;";
               // echo $sql;
          $tb=$this->obj->select($sql);
          $archivo=array();
         $archivo==$this->obj->todos($tb);
           $this->obj->cerrar();
          return $archivo;
       } //  fin del buscar


       function set($vobj,$var)
       {
          $this->$vobj=$var;
       }// fin del set


      function get($vobj)
       {
        //echo "a:".$vobj;
        //echo "b:".$this->$vobj;
          return $this->$vobj;
       } // fin del get 

    
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

    function texto($cod_cont)
    {
      $fila=$this->consultar_todo($cod_cont);
     /*echo" <pre>";
      print_r($fila);
      echo "</pre>";*/

      $nom_inqu=$fila[0]['nom_inqu'];
      $ape_inqu=$fila[0]['ape_inqu'];
      $ci_inqu=$fila[0]['ci_inqu'];
    //  echo $fila[0]['nom_prop'];
      $t??p_inqu="";
      $nom_prop=$fila[0]['nom_prop'];
      $ape_prop=$fila[0]['ape_prop'];
      $ci_prop=$fila[0]['ci_prop'];
      $rif_prop=$fila[0]['rif_prop'];
      $tip_inmu=$fila[0]['nom_tipo'];
      $let_inmu=$fila[0]['let_inmu'];
      $dir_inmu=$fila[0]['dir_inmu'];
      $mtr_inmu=$fila[0]['mtr_inmu'];
      $uso_inmu=$fila[0]['uso_inmu'];
      $lim_nort=$fila[0]['lim_nort'];
      $lim_sur=$fila[0]['lim_nort'];
      $lim_este=$fila[0]['lim_este'];
      $lim_oest=$fila[0]['lim_oest'];
      $med_letr="";
      $dur_cont=$fila[0]['dur_cont'];
      $fec_desd=$fila[0]['fec_desd'];
      $fec_hast=$fila[0]['fec_hast'];
      $can_cont=$fila[0]['can_cont'];
      $par_cont=$fila[0]['par_cont'];
      //extract($fila);
      $condicion="";
   //   echo $nom_inqu;
      $condicion1="inscrita por ante el Registro Mercantil Quinto de la Circunscripci??n Judicial del Distrito Capital y Estado Miranda, el d??a 23 de Marzo de 2007, bajo el N?? 36, Tomo 1535-A y registrado en el Registro de Informaci??n Fiscal (RIF) bajo el N?? J-293995272, representada en este acto por las ciudadanas NAYARY MONCADA QUITIAN y LUZ DARY QUITIAN MAYOR, venezolanas, mayores de edad, de este domicilio, titular de las C??dulas de Identidad N??s. V-14.045.976 y V-24.530.193, inscritas en el Registro de Informaci??n Fiscal (RIF) N??s. V-14045976-0 y V-24530193-2 respectivamente, en su car??cter de Directoras, debidamente autorizadas por el Acta Constitutiva Estatutos, ";

      $txt="Entre, ADMINISTRADORA YURUARY, C.A, sociedad mercantil de este domicilio, inscrita en el Registro Mercantil Segundo de la Circunscripci??n Judicial del Distrito Federal y Estado Miranda, el d??a 9 de Agosto de 1977, bajo el N?? 67, Tomo: 97-A, inscrita en el Registro de Informaci??n Fiscal (RIF) N?? J-00113810-2, representada por su Director: FELIX JOSE VALDIVIEZO SALAZAR, venezolano, mayor de edad, de este domicilio, titular de la c??dula de identidad N?? V-6.323.563, inscrito en el Registro de Informaci??n Fiscal (RIF) N?? V-06323563-2 y qui??n a los solos y ??nicos efectos de este documento se denominar?? LA ARRENDADORA, por una parte y por la otra,".$nom_inqu." ".$ape_inqu.", ".$tip_inqu."  titular de la c??dula de identidad N?? ".$ci_inqu."  de este domicilio, ".$condicion." qui??n a los solos y ??nicos efectos de este documento se denominar?? LA ARRENDATARIA, declaramos: PRIMERA: LA ARRENDADORA, procediendo en nombre y en cuenta de ".$nom_prop." ".$ape_prop.", titular de la c??dula de identidad N?? ".$ci_prop.", inscrita  en  el  Registro de Informaci??n Fiscal (RIF) N?? ".$rif_prop.", cede  en arrendamiento a LA ARRENDATARIA, quien as?? lo acepta, un inmueble constituido por un ".$tip_inmu.", identificado con el N?? ".$let_inmu." en ".$dir_inmu.", Jurisdicci??n del Municipio ".$nom_muni.", ".$nom_parr." del Estado ".$nom_esta.", tiene un ??rea de ".$med_letr."  (".$mtr_inmu." M??). Los linderos son: NORTE: Con ".$lim_nort.". SUR: ".$lim_sur.". ESTE: ".$lim_este." y OESTE: ".$lim_oest." Uso: El inmueble arrendado ser?? utilizado por LA ARRENDATARIA, exclusivamente para ".$uso_inmu.", no pudiendo darle uso distinto al establecido en este contrato, sin el consentimiento previo dado por escrito a LA ARRENDADORA. Queda terminantemente prohibido el uso de este inmueble para los siguientes fines: Dep??sito de materiales inflamables, pinturas y anexos y cualquier otro fin que LA ARRENDADORA considere riesgoso para la seguridad del inmueble. En consecuencia queda prohibido, salvo autorizaci??n de LA ARRENDADORA, el cambio en el uso original del inmueble arrendado. LA ARRENDATARIA,  deber??  obtener  a  su  nombre  la   Conformidad   de   Uso,  el permiso de Bomberos y cualquier otro tipo de permiso que requieran las autoridades, no haci??ndose LA ARRENDADORA responsable por la obtenci??n o no de lo antes indicado. SEGUNDA: La duraci??n de este Contrato es de ".$dur_cont." fijo, prorrogable autom??tica y sucesivamente por per??odos iguales, convenido desde ahora y hasta tanto una parte de aviso a la otra por escrito, antes del vencimiento del t??rmino fijo o cualquiera de su(s) prorroga(s), si las hubiere, de su  voluntad  de  dar  por terminado este contrato. Siendo en todo caso la prorroga legal contenida en la Ley de Regulaci??n de Arrendamiento Inmobiliario para el Uso Comercial, obligatoria para LA ARRENDADORA y potestativa para LA ARRENDATARIA. Durante el lapso de prorroga legal, la relaci??n arrendaticia se considerara a tiempo determinado y permanecer??n vigentes las mismas condiciones y estipulaciones convenidas por las partes en este contrato. TERCERA: Este Contrato es a tiempo determinado y entrar?? en vigencia el d??a: ".$fec_desd." hasta el d??a: ".$fec_hast.". CUARTA: Ambas partes de mutuo y amistoso acuerdo y en base a lo establecido en el Convenio Cambiario N?? 1, Gaceta Oficial de la Rep??blica Bolivariana de Venezuela, N?? 6.405 Extraordinario del d??a 7 de septiembre de 2018, la cual prescribe en su art??culo 8, lo siguiente: ???De acuerdo con lo dispuesto en el art??culo 128 del Decreto con Rango, Valor y Fuerza de ley del  Banco  Central  de  Venezuela,  el  pago  de  las  obligaciones  pactadas en moneda  extranjera,  ser??  efectuado  en  atenci??n a lo siguiente: a) Cuando la obligaci??n haya sido pactada en moneda extranjera por las partes contratantes como moneda de cuenta, el pago podr?? efectuarse en dicha moneda o en bol??vares, al tipo de cambio vigente para la fecha del pago. b) Cuando de la voluntad  de  las  partes  contratantes se evidencie que el pago de la obligaci??n ha de realizarse en moneda extranjera, as?? se efectuar??, a??n cuando se haya pactado en vigencia de restricciones  cambiarias,  de  acuerdo  con  la  cl??usula  antes  mencionada  y a la Gaceta  Oficial  de la Rep??blica Bolivariana de Venezuela N?? 6.405  Extraordinario, del d??a 7 de septiembre de 2018, LA ARRENDADORA y LA ARRENDATARIA convienen  que  el canon de  arrendamiento ha  sido convenido de manera exclusiva y excluyente,  en la cantidad de ".$can_cont."  m??s IVA y a partir del ".$par_cont.", el canon de arrendamiento se ajustar?? de com??n acuerdo entre las partes, que LA ARRENDATARIA pagar??  por mensualidades vencidas, dentro de los primeros cinco (5) d??as de cada mes, en el domicilio de LA ARRENDADORA. La falta oportuna de pago de dos (2)  mensualidades  consecutivas,   dar??  derecho  a  LA ARRENDADORA, Administradora Yuruary, C.A. o a quien sus  derechos represente, a demandar sin necesidad de autorizaci??n alguna ante los tribunales competentes y en cumplimiento a la normativa vigente para el uso comercial, el desalojo, con la consecuente entrega del inmueble arrendado, siendo por la exclusiva cuenta de LA ARRENDATARIA, los gastos y honorarios profesionales que se ocasionaren por dicho concepto.  QUINTA: Es condici??n expresa que LA ARRENDATARIA no podr?? ceder o traspasar el presente contrato, ni sub-arrendar total o parcialmente el inmueble objeto del mismo, sin el previo consentimiento escrito de LA ARRENDADORA. SEXTA: LA ARRENDATARIA declara expresamente recibir el inmueble objeto de este contrato, en perfecto estado  de  aseo,  conservaci??n  y  limpieza;  as??  mismo  manifiesta  que tanto  la instalaci??n el??ctrica, grifos, puertas, cerraduras y dem??s accesorios del inmueble arrendado, se encuentran en perfecto estado de conservaci??n y funcionamiento. En consecuencia LA ARRENDATARIA deber?? cuidar el bien objeto de este contrato con la diligencia de un buen padre de familia y devolverlo al finalizar el presente Contrato de Arrendamiento, en el mismo buen estado en que lo recibi??. SEPTIMA: Cualquier mejora o bienhechur??a que LA ARRENDATARIA hiciere al inmueble objeto   de   este contrato sin la precontrato autorizaci??n escrita  de parte  de  LA ARRENDADORA,   quedar??    en     beneficio     del     inmueble,     sin  que   LA ARRENDATARIA tenga nada que reclamar por dicho concepto a LA ARRENDADORA. OCTAVA: Dado el uso al cual se destinar?? el inmueble arrendado, ser?? por cuenta de LA ARRENDATARIA todo lo concerniente a la permisolog??a  para  que funcione  en el inmueble objeto del contrato el destino del inmueble arrendado, as?? como la seguridad industrial, normas sanitarias y en general todas aquellas disposiciones legales que regulen la materia, siendo por lo tanto responsable de su cumplimiento. En consecuencia, la negativa de las autoridades competentes respecto al  otorgamiento  de  la Patente de Industria y Comercio o cualquier otro requisito requerido por la autoridades a los fines del establecimiento o destino que LA ARRENDATARIA de al Inmueble arrendado, no engendrar?? responsabilidad alguna a cargo de LA ARRENDADORA. NOVENA: LA ARRENDATARIA conviene y se compromete expresamente a: 1- No efectuar modificaciones a la estructura o disposici??n del inmueble objeto de este contrato; 2- Que sean por su sola cuenta todas las reparaciones menores o locativas, seg??n la costumbre y las que resulten mayores por descuido o negligencia suya o de las personas que est??n bajo su dependencia;  LA  ARRENDATARIA  deber?? notificar cualquier novedad da??osa dentro de los tres d??as naturales siguientes detecci??n de la falla a LA ARRENDADORA; 3- Que sean por su sola cuenta el pago oportuno, del consumo de luz, aseo domiciliario, agua y otros servicios p??blicos que ocupe, durante el tiempo de vigencia de este Contrato. DECIMA: LA ARRENDADORA no se hace responsable  por  los  da??os  y  perjuicios  que pueda sufrir LA ARRENDATARIA, visitantes, familiares y terceros en general, debido a robos, saqueos, incendios, ruina o deterioro del inmueble objeto de este contrato. DECIMA PRIMERA: LA ARRENDADORA, se reserva el derecho a efectuar por s?? o por medio de persona autorizada, inspecciones peri??dicas por lo menos cada tres (3) meses, en el inmueble objeto de este contrato, a los fines de constatar el estado en que se encuentra y LA ARRENDATARIA, se obliga a prestarle toda la colaboraci??n que requiera para efectuarla. DECIMA SEGUNDA: Si por raz??n de trabajos de urbanismo del Estado, queda afecto el inmueble objeto de este contrato, se considerar?? terminado el mismo, sin que LA ARRENDATARIA pueda reclamar ninguna indemnizaci??n por este concepto a LA ARRENDADORA. DECIMA TERCERA: Las partes expresamente se??alan que cualquier notificaci??n, aviso o comunicaci??n relativa al presente contrato, necesariamente  deber??  ser  hecha  por  escrito indicando como direcciones: para LA ARRENDADORA: Avenida  Este  2,  Edificio Torre Canaima, Mezzanina, Los Caobos, Caracas, Municipio Libertador del Distrito Capital; Tel??fono: (0212) 571.36.80, correo electr??nico: felixvaldiviezo@hotmail.com, para LA ARRENDATARIA: en el inmueble arrendado. Tel??fonos: (0212) 753.13.68 ??? 0412-541.90.68, correo electr??nico: lqmurano33@gmail.com.  Tales notificaciones, se practicar??n por simple carta, telegrama o por v??a judicial o autentica en la persona del destinatario o en la persona mayor de edad que la reciba y en caso de no encontrarse en el inmueble persona alguna, se entender?? hecha  por  una  copia de la misma que fije en su puerta la Autoridad respectiva. A los efectos del recibo de las notificaciones, avisos o comunicaciones, las mismas se  entender??n  recibidas  cuando  fueren  entregadas  en   las   direcciones  antes identificadas; lo anterior no excluye que LA ARRENDADORA pueda notificar a LA ARRENDATARIA por v??a judicial o viceversa. Ninguno de los medios de notificaci??n se??alados en esta cl??usula, tiene preeminencia  sobre  los  otros  se??alados  y  la  elecci??n  de  la  v??a para encontrator la notificaci??n, el aviso o comunicaci??n, corresponder?? al remitente. DECIMA CUARTA: Para todo lo no expresamente previsto en las Cl??usulas de este Contrato, regir??n las disposiciones   legales   aplicables   a   contratos   de   esta   naturaleza;  DECIMA QUINTA: La falta de cumplimiento de una cualquiera de las Cl??usulas de este Contrato, ser?? causa suficiente para que LA ARRENDADORA pueda demandar la Resoluci??n, el Cumplimiento, el Desalojo o cualquier otra acci??n seg??n el caso, para dar por terminado este contrato, siendo por cuenta de LA ARRENDATARIA, todos  los  da??os  y  perjuicios,  gastos,  costas  y honorarios que se causen por su incumplimiento. DECIMA SEXTA: Las partes declaran de mutuo acuerdo, que el presente documento constituye el ??nico medio regulador de la relaci??n arrendaticia entre LA ARRENDADORA y LA ARRENDATARIA, dejando constancia de que si alguna de las partes deseare realizar alguna modificaci??n en el texto de las cl??usulas, solo ser??n v??lidas cuando se hagan por escrito y debidamente suscritas por ambas partes. DECIMA SEPTIMA: Ambas partes declaran expresamente someterse a la Ley de Regulaci??n de Arrendamiento Inmobiliario  para  el  Uso  Comercial,  Gaceta  Oficial  N??  40.418  del  23/05/2014. DECIMA OCTAVA: Para todos los efectos del presente Contrato, las partes  eligen   como   domicilio   especial   y   exclusivo  a  la  ciudad  de  Caracas,   a   la jurisdicci??n de cuyos tribunales declaran expresamente someterse. Se hacen dos (2) ejemplares a un mismo tenor y a un solo efecto y cada parte, recibe un ejemplar. En Caracas, a la fecha de su autenticaci??n.-  ";

        $firma="LA ARRENDADORA                      LA ARRENDATARIA
    ADMINISTRADORA YURUARY, C.A                              ".$nom_inqu."
";

        return $txt;
    }

        } // fin de la clase

?>