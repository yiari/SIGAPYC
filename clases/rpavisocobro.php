<?php

class rpavisocobro
    {




        public function consultarAvisoCobro($valor){

      
                $dbConexion = new conexcion();
                
                $stmt = $dbConexion->conectar()->prepare("CALL usp_veravisocobro(?)");
                $stmt ->bindParam(1, $valor, PDO::PARAM_INT);
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
            $fila=$this->consultarAvisoCobro($cod_cont);
            //$fila=$this->consultar_todo($cod_cont);
         /*echo" <pre>";
          print_r($fila);
          echo "</pre>";*/

    
          $cod_cont=$fila[0]['cod_cont'];
          $cod_aviso=$fila[0]['cod_aviso'];
         
         

         
          $condicion="";
       //   echo $nom_inqu;
          $condicion1="inscrita por ante el Registro Mercantil Quinto de la Circunscripción Judicial del Distrito Capital y Estado Miranda, el día 23 de Marzo de 2007, bajo el N° 36, Tomo 1535-A y registrado en el Registro de Información Fiscal (RIF) bajo el N° J-293995272, representada en este acto por las ciudadanas NAYARY MONCADA QUITIAN y LUZ DARY QUITIAN MAYOR, venezolanas, mayores de edad, de este domicilio, titular de las Cédulas de Identidad N°s. V-14.045.976 y V-24.530.193, inscritas en el Registro de Información Fiscal (RIF) N°s. V-14045976-0 y V-24530193-2 respectivamente, en su carácter de Directoras, debidamente autorizadas por el Acta Constitutiva Estatutos, ";
    
          $txt=" hola este una priva ".$cod_aviso."";
    
            $firma="LA ARRENDADORA                      LA ARRENDATARIA
        ADMINISTRADORA YURUARY, C.A                              ".$cod_cont."
    ";
    
            return $txt;
        }




    }
?>