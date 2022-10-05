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
class mdlregistromandatos{





 public function seleccionarregistros($prmidinmu,$prmidunid){

  //If($idprop == null || $idprop == 0)

            try {

              $dbConexion = new conexcion();
              
              $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_mandatos(?,?)");
              $stmt ->bindParam(1, $prmidinmu, PDO::PARAM_INT);
              $stmt ->bindParam(2, $prmidunid, PDO::PARAM_INT);
              $stmt->execute();
              $dataRegistro["Items"][] = $stmt->fetchall();

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




}/*fin*/