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
class mdlregistropagador{

public function registrar($tabla,$datos,$archivos){

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
  $prmIdpagador = 0;



  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registropagador(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
          $stmt -> bindParam(1,  $datos ["id_paga"],  PDO::PARAM_INT); //ESTE ES EL ID DEL pagador
		      $stmt -> bindParam(2,  $datos ["id_inqu"],  PDO::PARAM_INT); //ESTE ES EL ID DEL inquilino
          $stmt -> bindParam(3,  $datos ["cod_paga"], PDO::PARAM_STR);
          $stmt -> bindParam(4,  $datos ["nom_paga"], PDO::PARAM_STR);            
          $stmt -> bindParam(5,  $datos ["ape_paga"], PDO::PARAM_STR);          
          $stmt -> bindParam(6,  $datos ["nac_paga"], PDO::PARAM_INT);   
          $stmt -> bindParam(7,  $datos ["ci_paga"],  PDO::PARAM_STR);       
          $stmt -> bindParam(8,  $datos ["rif_paga"], PDO::PARAM_STR);                     
          $stmt -> bindParam(9,  $datos ["loc_paga"], PDO::PARAM_STR);     
          $stmt -> bindParam(10, $datos ["cel_paga"], PDO::PARAM_STR);          
          $stmt -> bindParam(11, $datos ["cor_paga"], PDO::PARAM_STR);       
          $stmt -> bindParam(12, $datos ["est_paga"], PDO::PARAM_INT);         
          $stmt -> bindParam(13, $datos ["mun_paga"], PDO::PARAM_INT);      
          $stmt -> bindParam(14, $datos ["par_paga"], PDO::PARAM_INT); 
          $stmt -> bindParam(15, $datos ["dir_paga"], PDO::PARAM_STR);
          $stmt -> bindParam(16, $datos ["ofi_paga"], PDO::PARAM_STR);     
          $stmt -> bindParam(17, $datos ["tip_paga"], PDO::PARAM_INT);


                  
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
                  $prmIdpagador = $row[2]; //AQUI OBTENGO EL ID DEL PAGADOR
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

          $subirArchivos = new ctrsubirarchivos();

          $prmTipoPersonaTEMP = $datos["tip_paga"];



          IF($prmTipoPersonaTEMP == 1){
            $subirArchivos->validarArchivos($archivos,$prmIdpagador,$prmTipoPersonaTEMP,'1QP');
          } else {
            $subirArchivos->validarArchivos($archivos,$prmIdpagador,$prmTipoPersonaTEMP,'2P');
          }
          

          /*
          |--------------------------------------------------------------------
          | AQUI CARGO LOS VALORES PARA EL MENSAJE QUE SE MOSTRARA AL USUARIO
          |--------------------------------------------------------------------
          */
          $dataRes = array(
            'error' => $prmError,
            'mensaje' =>  $prmMensaje
          );


          if( $prmIdpagador > 0 ){

            $dataRegistro["Items"][] = ["ID_PAGADOR" => $prmIdpagador];
          
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

  


  public function seleccionarregistros($tabla,$id_inqu,$tipo){

    If($id_inqu == null || $id_inqu == 0){
  
      try {
  
        $dbConexion = new conexcion();
        $valor = 0;
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarpagador(?,?)");
        $stmt ->bindParam(1, $valor, PDO::PARAM_INT);
        $stmt ->bindParam(2, $valor, PDO::PARAM_INT);
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
  
    } else {
  
  
          try {
  
            $dbConexion = new conexcion();
            
            $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarpagador(?)");
          ;
            $stmt->execute();
            $dataRegistro["Items"][] = $stmt->fetchAll();
            $stmt ->bindParam(1, $id_inqu, PDO::PARAM_INT);
            $stmt ->bindParam(2, $tip_paga, PDO::PARAM_INT);
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

}