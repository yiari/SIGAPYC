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

public function registrar($tabla,$datos){


      try {

        $dbConexion = new conexcion();
      
        //$stmt = $dbConexion->conectar()->prepare("INSERT INTO $tabla (nombre,apellido,usuario,password,email)  VALUES (:nombre,:apellido,:usuario,:password,:email)");
        //IN `idusuario` INT(11), IN `prmnombre` VARCHAR(255), IN `prmapellido` VARCHAR(255), IN `prmusuario` VARCHAR(255), IN `prmemail` VARCHAR(255),  IN `prmpassword` VARCHAR(255)

        $stmt = $dbConexion->conectar()->prepare("CALL usp_registrousuarios(?,?,?,?,?,?)");

          $stmt -> bindParam(1, $datos["idusuario"], PDO::PARAM_INT);
          $stmt -> bindParam(2, $datos["nombre"], PDO::PARAM_STR);
          $stmt -> bindParam(3, $datos["apellido"], PDO::PARAM_STR);
          $stmt -> bindParam(4, $datos["usuario"], PDO::PARAM_STR);
          $stmt -> bindParam(5, $datos["email"], PDO::PARAM_STR);
          $stmt -> bindParam(6, $datos["password"], PDO::PARAM_STR);
                    
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

 public function seleccionarregistros($tabla,$iten,$valor){

      If($iten == null && $valor == null){


            try {

              $dbConexion = new conexcion();  

                $stmt = $dbConexion->conectar()->prepare("SELECT id, nombre,apellido,usuario,password,email,DATE_FORMAT( fecha_creacion, '%d/%m/%Y') AS fecha_creacion FROM $tabla");
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

          $dbConexion = new conexcion();
          
          $stmt = $dbConexion->conectar()->prepare("SELECT id, nombre,apellido,usuario,password,email,DATE_FORMAT( fecha_creacion, '%d/%m/%Y') AS fecha_creacion FROM $tabla WHERE $iten = :$iten");
        
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




  