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
class mdlregistrorepresentante{

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
  $prmIdrepresentante = 0;



  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registrarrepresentante(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
          $stmt -> bindParam(1,  $datos ["id_repr"],  PDO::PARAM_INT); //ESTE ES EL ID DEL APODRRADO
		       $stmt -> bindParam(2,  $datos ["id_prop"],  PDO::PARAM_INT); //ESTE ES EL ID DEL PROPIETARIO
          $stmt -> bindParam(3,  $datos ["cod_repr"], PDO::PARAM_STR);
          $stmt -> bindParam(4,  $datos ["nom_repr"], PDO::PARAM_STR);            
          $stmt -> bindParam(5,  $datos ["ape_repr"], PDO::PARAM_STR);          
          $stmt -> bindParam(6,  $datos ["nac_repr"], PDO::PARAM_INT);   
          $stmt -> bindParam(7,  $datos ["ci_repr "], PDO::PARAM_STR);       
          $stmt -> bindParam(8,  $datos ["rif_repr"], PDO::PARAM_STR);                     
          $stmt -> bindParam(9,  $datos ["loc_repr"], PDO::PARAM_STR);     
          $stmt -> bindParam(10, $datos ["cel_repr"], PDO::PARAM_STR);          
          $stmt -> bindParam(11, $datos ["cor_repr"], PDO::PARAM_STR);       
          $stmt -> bindParam(12, $datos ["est_repr"], PDO::PARAM_INT);         
          $stmt -> bindParam(13, $datos ["mun_repr"], PDO::PARAM_INT);      
          $stmt -> bindParam(14, $datos ["par_repr"], PDO::PARAM_INT); 
          $stmt -> bindParam(15, $datos ["dir_repr"], PDO::PARAM_STR);
          $stmt -> bindParam(16, $datos ["ofi_repr"], PDO::PARAM_STR);     
          $stmt -> bindParam(17, $datos ["tip_repr"], PDO::PARAM_INT);
          
          $stmt -> bindParam(18, $datos ["cod_regi"], PDO::PARAM_STR);
          $stmt -> bindParam(19, $datos ["not_regi"], PDO::PARAM_STR);
          $stmt -> bindParam(20, $datos ["fec_regi"], PDO::PARAM_INT);
          $stmt -> bindParam(21, $datos ["num_regi"], PDO::PARAM_STR);
          $stmt -> bindParam(22, $datos ["tom_regi"], PDO::PARAM_STR);
          $stmt -> bindParam(23, $datos ["fol_regi"], PDO::PARAM_STR);
              

           
  
                  
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
                  $prmIdrepresentante = $row[2]; //AQUI OBTENGO EL ID DEL PAGADOR
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

          $prmTipoPersonaTEMP = $datos["tip_repr"];



          IF($prmTipoPersonaTEMP == 2){
            $subirArchivos->validarArchivos($archivos,$prmIdrepresentante,$prmTipoPersonaTEMP,'2PR');
          } else {
            $subirArchivos->validarArchivos($archivos,$prmIdrepresentante,$prmTipoPersonaTEMP,'2P');
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

          if( $prmIdrepresentante > 0 ){

            $dataRegistro["Items"][] = ["ID_REPRESENTANTE" => $prmIdrepresentante];
          
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

  public function seleccionarregistros($tabla,$iten,$valor){

    If($iten == null && $valor == null){


          try {

            $dbConexion = new conexcion();  

              $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarrepresentante()");
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
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarrepresentante()" );
      
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