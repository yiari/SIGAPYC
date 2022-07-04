<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/conexcion.php';

/*
|---------------------------------------------------------------
| LAS CLASES SE DEBEN LLAMAR EXACTAMENTE IGUAL QUE SU ARCHIVO
|---------------------------------------------------------------
*/
class mdlregistrousuarios{

static public function registrar($tabla,$datos){


      try {

      
        $stmt = conexcion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,usuario,password,email) 
        VALUES (:nombre,:apellido,:usuario,:password,:email)");

          $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
          $stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
          $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
          $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
          $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
          
          $stmt->execute();

          $dataRes = array(
            'error' => '0',
            'mensaje' =>  'El registro se realizo con exito.'
          );
    
          echo json_encode($dataRes);

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

    static public function seleccionarregistros($tabla,$iten,$valor){

      If($iten == null && $valor == null){


            try {

          
                $stmt = conexcion::conectar()->prepare("SELECT id, nombre,apellido,usuario,password,email,DATE_FORMAT( fecha_creacion, '%d/%m/%Y') AS fecha_creacion FROM $tabla");
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

          
          $stmt = conexcion::conectar()->prepare("SELECT id, nombre,apellido,usuario,password,email,DATE_FORMAT( fecha_creacion, '%d/%m/%Y') AS fecha_creacion FROM $tabla WHERE $iten = :$iten");
        
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



  static public function seleccionarpropietarios($tabla,$iten,$valor){

    If($iten == null && $valor == null){

      $stmt = conexcion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt -> fetchAll();

    }else{


      $stmt = conexcion::conectar()->prepare("SELECT * FROM $tabla WHERE $iten = :$iten");
      
      $stmt ->bindParam(":".$iten, $valor, PDO::PARAM_STR);
      
      $stmt->execute();
      return $stmt -> fetch();


    }
}




}




  