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
class mdlregistrodocumento{



 public function seleccionarregistros($tabla,$idprop,$tipo){



        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documentos(?,?)");
          $stmt ->bindParam(1, $idprop, PDO::PARAM_INT);
          $stmt ->bindParam(2, $tipo, PDO::PARAM_INT);
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



      public function documetoInquilino($tabla,$idinqui,$tipo){



        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documentoinquilino(?,?)");
          $stmt ->bindParam(1, $idinqui, PDO::PARAM_INT);
          $stmt ->bindParam(2, $tipo, PDO::PARAM_INT);
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




      public function documetoBeneficiario($tabla,$prmid_bene,$tipo){



        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documentobeneficiario(?,?)");
          $stmt ->bindParam(1, $prmid_bene, PDO::PARAM_INT);
          $stmt ->bindParam(2, $tipo, PDO::PARAM_INT);
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




      public function documetoApoderado($prmid_apod,$prmtipo){



        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documentoapoderado(?,?)");
          $stmt ->bindParam(1, $prmid_apod, PDO::PARAM_INT);
          $stmt ->bindParam(2, $prmtipo, PDO::PARAM_INT);
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



      public function documetoPresentante($prmid_repre,$prmtipo){



        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documentorepresentante(?,?)");
          $stmt ->bindParam(1, $prmid_repre, PDO::PARAM_INT);
          $stmt ->bindParam(2, $prmtipo, PDO::PARAM_INT);
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
    



      public function documetoPagador($prmid_paga,$prmtipo){



        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documentopagador(?,?)");
          $stmt ->bindParam(1, $prmid_paga, PDO::PARAM_INT);
          $stmt ->bindParam(2, $prmtipo, PDO::PARAM_INT);
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
    


      public function documetoInmueble($prmid_inmu,$prmtipo){



        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documetoinmueble(?,?)");
          $stmt ->bindParam(1, $prmid_inmu, PDO::PARAM_INT);
          $stmt ->bindParam(2, $prmtipo, PDO::PARAM_INT);
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
    


      public function documetoUnidad($prmid_unid,$prmtipo){



        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_documentounidad(?,?)");
          $stmt ->bindParam(1, $prmid_unid, PDO::PARAM_INT);
          $stmt ->bindParam(2, $prmtipo, PDO::PARAM_INT);
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