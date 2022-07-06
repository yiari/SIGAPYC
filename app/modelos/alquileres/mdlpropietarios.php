<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once 'app/modelos/conexcion.php';

class mdlpropietarios {

   public function mdlselccionarPropietraios($tabla,$iten,$valor){

  
    If($iten == null && $valor == null){


      try {

    
          $stmt = conexcion::conectar()->prepare("SELECT * FROM $tabla");
          $stmt->execute();
          $dataRegistro["Items"][] = $stmt->fetchAll();

          $dataRes = array(
            'error' => '0',
            'mensaje' =>  'El registro se realizo con exito.'
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

    }else{


    try {

    
        $stmt = conexcion::conectar()->prepare("SELECT * FROM $tabla WHERE $iten = :$iten");
      
        $stmt ->bindParam(":".$iten, $valor, PDO::PARAM_STR);
        $stmt->execute();
        $dataRegistro["Items"][] = $stmt->fetch();

        $dataRes = array(
          'error' => '0',
          'mensaje' =>  'El registro se realizo con exito.'
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
}

