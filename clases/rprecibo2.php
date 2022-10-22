<?php



class rpavisocobro
    {



        public function consultarRecibo($valor){

      
                $dbConexion = new conexcion();
                
                $stmt = $dbConexion->conectar()->prepare("CALL usp_verrecibopedido(?)");
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
            $prmFunciones = new funciones();
           
            $fila=$this->consultarRecibo($cod_cont);

            
            
 
         
          $cod_recibo=$fila[0]['cod_recibo'];
          $nombre_inquilino=$fila[0]['inquilino'];
          $monto_escrito=strtoupper($prmFunciones->montoEscrito($fila[0]['Bs'],"Bolivarez", "y", "centimos"));
          $monto_escrito2=strtoupper($prmFunciones->montoEscrito($fila[0]['monto_recibo'],"dolares", "y", "centimos"));
          $monto_Bs=$fila[0]['Bs'];
          $monto_dolres=$fila[0]['monto_recibo'];
          $cod_inmueble=$fila[0]['inmueble'];
          $direccion_inmueble=$fila[0]['direccion'];
          $mes=$fila[0]['nombre_mes'];
       //   echo $nom_inqu;
         
    
          $txt= 

          
          
          "
                                                                RECIBO Nº ".$cod_recibo."
                                                        RIF: J-00113810-2  NIT: 0030662075
            
          
          Hemos recibido de: ".$nombre_inquilino.", la 
          Cantidad de: ".$monto_escrito. ". ( BS. ".$monto_Bs.") Que
          equivalen a  ".$monto_escrito2. ".($ ".$monto_dolres." ) calculados a la tasa
          de cambio del BCV del día, por concepto de pago de Alquiler del
          inmueble ".$cod_inmueble." ubicado en
          ".$direccion_inmueble."  La correspondiente
          al mes (s) ".$mes.". Recibo que expide en el Municipio Libertador,
          Caracas.



                                       _____________________________
          
                                              MANUEL MORENO 

          




                                                                 RECIBO Nº ".$cod_recibo."
                                                        RIF: J-00113810-2  NIT: 0030662075

          
          Hemos recibido de: ".$nombre_inquilino.", la 
          Cantidad de: ".$monto_escrito. ". ( BS. ".$monto_Bs.") Que
          equivalen a  ".$monto_escrito2. ".($ ".$monto_dolres." ) calculados a la tasa
          de cambio del BCV del día, por concepto de pago de Alquiler del
          inmueble ".$cod_inmueble." ubicado en
          ".$direccion_inmueble."  La correspondiente
          al mes (s) ".$mes.". Recibo que expide en el Municipio Libertador,
          Caracas.
          


           
                                         _____________________________ 
          
                                               MANUEL MORENO " ;
         
    
    
            return $txt;
        }




    }
?>