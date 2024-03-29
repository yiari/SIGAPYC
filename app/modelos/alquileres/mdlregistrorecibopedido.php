<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/

include_once '../../../app/modelos/conexcion.php';

include_once '../../../app/controladores/comunes/ctrsubirarchivos.php';

/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/
class mdlregistrorecibopedido{

  


 public function seleccionarregistros($tabla,$iten,$valor){

    If($iten == null && $valor == null){

        try {
    
          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_consulta_recibo_pedido()" );
          //$stmt ->bindParam(1, $datos["id_inmu"], PDO::PARAM_INT);
       
    
          $stmt->execute();
          $dataRegistro["Items"][] = $stmt->fetchAll();
    
          $dataRes = array(
            'error' => '0',
            'mensaje' =>  'El registro se obtuvo con exito.'
          );
          
          
          echo json_encode(array_merge($dataRegistro,$dataRes));
    
          } catch (\Throwable $th) {
          
              //$pdo->rollBack() ;
              //echo "Mensaje de Error: " . $th->getMessage();
              $dataRes = array(
                'error' => '1',
                'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
              );
        
              echo json_encode($dataRes);
      
          }
    
       }

      
  }




  public function consultarinquilino($tabla,$items){

    If($items == null){
  
  
                  $dataRes = array(
                    'error' => '1',
                    'mensaje' =>  "Mensaje de Error: No hay registro para buscar."
                  );
            
  
    }else{
  
  
      try {
  
        $dbConexion = new conexcion();
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_consultaclienteinquilino(?,?)");
        $stmt -> bindParam(1,$items["id_inqu"], PDO::PARAM_INT);
        $stmt -> bindParam(2,$items["tipo_inqu"], PDO::PARAM_INT);

        $stmt->execute();
        $dataRegistro["Items"][] = $stmt->fetch();
  
        $dataRes = array(
          'error' => '0',
          'mensaje' =>  'El registro se obtuvo.'
        );
        
        
        echo json_encode(array_merge($dataRegistro,$dataRes));
  
        } catch (\Throwable $th) {
        
            //$pdo->rollBack() ;
            //echo "Mensaje de Error: " . $th->getMessage();
            $dataRes = array(
              'error' => '1',
              'mensaje' =>  "Mensaje de Error: " . $th->getMessage()
            );
      
            echo json_encode($dataRes);
    
        }
  
  
  
  
    }
  }



  public function registroReciboPedido($datos){

    /* 
    |------------------------------------------------------------
    | AQUI DECLARO LA VARIABLE - INSTANCIA DEL METODO CONEXION
    |------------------------------------------------------------
    */
    $dbConexion = new conexcion();
    /* 
    |------------------------------------------------------------------------------------------------
    | AQUI DECLARO LA VARIABLES QUE CAPTURARAN EL RESULTADO DE LA OPERAION PARA INFORMAR AL USUARIO
    |------------------------------------------------------------------------------------------------
    */
    $prmError = 0;
    $prmMensaje = "";
    $prmIdrecibo = 0;
  
    //$fecha = str_replace("-","",$datos["fec_pode"]);
  
    
        try {
    
           /* 
            |----------------------------------------------------------------------------------
            | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
            |----------------------------------------------------------------------------------
            */

            $recibo = floatval($datos["monto_recibo"]);
            $pedido = floatval($datos["monto_pedido"]);
            $mensualidad = floatval($datos["mensualidad"]);
            $tasa = floatval($datos["tasa"]);

            $stmt = $dbConexion->conectar()->prepare("CALL usp_registro_recibopedido(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt -> bindParam(1,$datos ["id"],  PDO::PARAM_INT); //ESTE ES EL ID respuesta
            $stmt -> bindParam(2,$datos ["id_aviso"],PDO::PARAM_INT); //ESTE ES EL ID DEL avios de cobro
            $stmt -> bindParam(3,$datos ["cod_aviso"],  PDO::PARAM_STR); //
            $stmt -> bindParam(4,$datos ["cod_recibo"], PDO::PARAM_STR); // 
            $stmt -> bindParam(5,$datos ["cod_pedido"], PDO::PARAM_STR); //
            $stmt -> bindParam(6,$datos ["id_unid"], PDO::PARAM_INT); // 
            $stmt -> bindParam(7,$datos ["id_inqu"], PDO::PARAM_INT); // 
            $stmt -> bindParam(8,$datos ["id_inmu"], PDO::PARAM_INT); // 
            $stmt -> bindParam(9,$datos ["tipo_inqu"], PDO::PARAM_INT); //
            $stmt -> bindParam(10,$datos ["fecha"], PDO::PARAM_INT); // 
            $stmt -> bindParam(11,$datos ["mes"], PDO::PARAM_INT); // 
            $stmt -> bindParam(12, $mensualidad,PDO::PARAM_STR);
            $stmt -> bindParam(13, $recibo,PDO::PARAM_STR);
            $stmt -> bindParam(14, $pedido,PDO::PARAM_STR);
            $stmt -> bindParam(15, $tasa,PDO::PARAM_STR);
            $stmt -> bindParam(16,$datos["id_usuario"], PDO::PARAM_INT); 
         
          
				
            /*
            |---------------------------------
            | AQUI SE EJECUTA LA OPERACION
            |---------------------------------
            */
            $stmt->execute();
  
            /* 
            |----------------------------------
            | AQUI SE OBTIENE EL RESULTADO
            |----------------------------------
            */
            $resultado = $stmt->fetchAll();
  
            if (count($resultado) >0){
  
              foreach ($resultado as $key=> $row) {
                $prmError = $row[0]; //COLUMNA NUMERO DE ERROR ( EN CASO DE SUCEDER), DE LO CONTRARIO REGRESARA, CERO (0)
                
                if ($prmError == 1062 ){ //registro duplicado
                  $prmMensaje =  "Registro duplicado: " . $row[1]; //COLUMNA DEL MENSAJE
                } else {
                   /*
                  |-------------------------------------------------
                  | SI NO HUBO ERRORM OBTENGO EL ID DEL PROPIETARIO
                  |-------------------------------------------------
                  */
  
                  if($prmError == 0){
                    $prmIdrecibo = $row[2]; //AQUI OBTENGO EL ID DEL PAGADOR
                  }
                  $prmMensaje =  $row[1]; //COLUMNA DEL MENSAJE
                }
              }
          
  
            } ;
  
            /*
            |------------------------------
            | AQUI SUBO LOS ARCHIVOS
            |------------------------------
            */
            /*
            $subirArchivos = new ctrsubirarchivos();
  
            $prmTipoPersonaTEMP = $datos["tip_apod"];
  
  
  
            IF($prmTipoPersonaTEMP == 1){
              $subirArchivos->validarArchivos($archivos,$prmIdapoderado,$prmTipoPersonaTEMP,'1PA');
            } else {
              $subirArchivos->validarArchivos($archivos,$prmIdapoderado,$prmTipoPersonaTEMP,'2P');
            }*/
  
            /*
            |--------------------------------------------------------------------
            | AQUI CARGO LOS VALORES PARA EL MENSAJE QUE SE MOSTRARA AL USUARIO
            |--------------------------------------------------------------------
            */
            $dataRes = array(
              'error' => $prmError,
              'mensaje' =>  $prmMensaje
            );
  
            if( $prmIdrecibo > 0 ){
  
              $dataRegistro["Items"][] = ["ID_RECIBO" => $prmIdrecibo];
            
              echo json_encode(array_merge($dataRegistro,$dataRes));
  
            } else {
  
              echo json_encode($dataRes);
            
            }
  
      } catch (\Exception $e) {
      
  
          $codigoError = $e->getCode();
  
          if ($codigoError == 23000) { //ERROR DE REGISTRO DUPLICADO
            $dataRes = array(
              'error' => '1',
              'mensaje' =>  "El registro se encuentra duplicado " . $e->getMessage()
            );
          } else {
            $dataRes = array(
              'error' => '1',
              'mensaje' =>  "Mensaje de Error: " . $e->getMessage()
            );
  
          }
   
          echo json_encode($dataRes);
  
      }
    
    }
  





}
