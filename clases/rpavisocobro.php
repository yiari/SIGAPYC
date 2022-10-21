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
            $prmFunciones = new funciones();
           
            $fila=$this->consultarAvisoCobro($cod_cont);
            

    
          $cod_cont=$fila[0]['cod_cont'];
          $cod_aviso=$fila[0]['cod_aviso'];
          $nombre_inquilino=$fila[0]['nombre'];


          $codigo_inmueble=$fila[0]['inmueble'];
          $direccion_inmueble=$fila[0]['dir_inmu'];

          $codigo_unidad=$fila[0]['unidad'];
          $direccion_unidad=$fila[0]['dir_unidad'];

          $monto_escrito=strtoupper($prmFunciones->montoEscrito($fila[0]['total'],"dolares", "y", "centimos"));
          $total=$fila[0]['total'];
          $mes=$fila[0]['nombre_mes'];
          $cod_contrato=$fila[0]['cod_cont'];
       //   echo $nom_inqu;
         
    
          $txt="                                                                                 No. de aviso de cobro:  ".$cod_aviso."
          
              
          
          
          
              Estimado Sr(a). ".$nombre_inquilino."

          Reciba un cordial saludo, el presente tiene la finalidad de notificarle que su mensualidad correspondiente al alquiler de la unidad ".$codigo_inmueble." ubicada en ".$direccion_inmueble." está a punto de vencer, hasta el momento tiene una deuda acumulada de ".$monto_escrito." ($".$total.") correspondiente al mes (es) ".$mes.", recuerde que debe cancelar en los próximos 5 días según contrato ".$cod_contrato.", para evitar morosidades.
          
          Por favor comuníquese con nuestras oficinas e informe su forma de pago.
          
        
          Se despide atentamente.


          
                                                             _____________________________                    
          
          
                                                                    MANUEL MORENO"; 
         
    
            
           
    
            return $txt;
        }




    }
?>