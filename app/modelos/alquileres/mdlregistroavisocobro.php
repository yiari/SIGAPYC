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
class mdlregistroavisocobro{



 public function seleccionarregistros($tabla,$datosBusqueda){

            try{

              $dbConexion = new conexcion();  

              /*$datosBusqueda = array(
                'id_prop' => '0',
                'codigo_prop' =>  '',
                'tipo_prop' => '0'
              );*/


                $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_aviso_cobro(?,?)");
                $stmt -> bindParam(1,$datosBusqueda["nom_inqu"], PDO::PARAM_STR);
                $stmt -> bindParam(2,$datosBusqueda["estatus"], PDO::PARAM_INT);
                //$stmt -> bindParam(2,$datosBusqueda["codigo_prop"], PDO::PARAM_STR);
                //$stmt -> bindParam(3,$datosBusqueda["tipo_prop"], PDO::PARAM_INT);

                $stmt->execute();
                $dataRegistro["Items"][] = $stmt->fetchAll();
      
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




  public function consultarpropietario($tabla,$items){

    If($items == null){
  
  
                  $dataRes = array(
                    'error' => '1',
                    'mensaje' =>  "Mensaje de Error: No hay registro para buscar."
                  );
            
  
    }else{
  
  
      try {
  
        $dbConexion = new conexcion();
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarpropietario(?,?,?)");
        $stmt -> bindParam(1,$items["id_prop"], PDO::PARAM_INT);
        $stmt -> bindParam(2,$items["codigo_prop"], PDO::PARAM_STR);
        $stmt -> bindParam(3,$items["tipo_prop"], PDO::PARAM_INT);

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





}
