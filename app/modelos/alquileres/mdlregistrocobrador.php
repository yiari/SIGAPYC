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
class mdlregiscobrador{

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
  $prmIdBeneficiario = 0;


  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registrocobrador(?,?,?,?,?,?,?,?,?,?,?,?)");

          $stmt -> bindParam(1, $datos["id_bene"], PDO::PARAM_INT); //ESTE ES EL ID DEL Cobrador
          $stmt -> bindParam(2, $datos["cod_cobra"], PDO::PARAM_STR);
          $stmt -> bindParam(3, $datos["mon_cobra"], PDO::PARAM_STR);            
          $stmt -> bindParam(4, $datos["ape_cobra"], PDO::PARAM_STR);          
          $stmt -> bindParam(5, $datos["nac_cobra"], PDO::PARAM_INT);   
          $stmt -> bindParam(6, $datos["ci_cobra"], PDO::PARAM_STR);       
          $stmt -> bindParam(7, $datos["rif_cobra"], PDO::PARAM_STR);                    
          $stmt -> bindParam(8, $datos["loc_cobra"], PDO::PARAM_STR);     
          $stmt -> bindParam(9, $datos["cel_cobra"], PDO::PARAM_STR);          
          $stmt -> bindParam(10, $datos["cor_cobra"], PDO::PARAM_STR);       
          $stmt -> bindParam(11, $datos["dir_cobra"], PDO::PARAM_STR);   
          $stmt -> bindParam(12, $datos["tipo_persona"], PDO::PARAM_INT);       
         

                  
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
                  $prmIdBeneficiario = $row[2]; //AQUI OBTENGO EL ID DEL PROPIETARIO
                }

                /*-----------------------------------------------*/

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

          $prmTipoPersonaTEMP = $datos["tipo_persona"];



          IF($prmTipoPersonaTEMP == 1){
            $subirArchivos->validarArchivos($archivos,$prmIdBeneficiario,$prmTipoPersonaTEMP,'1IB');
          } else {
            $subirArchivos->validarArchivos($archivos,$prmIdBeneficiario,$prmTipoPersonaTEMP,'2P');
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


          if( $prmIdBeneficiario > 0 ){

            $dataRegistro["Items"][] = ["ID_COBRADOR" => $prmIdBeneficiario];
          
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



  public function eliminarpropietario($tabla,$datos){

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
  
  
  
    
        try {
    
           /* 
            |----------------------------------------------------------------------------------
            | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
            |----------------------------------------------------------------------------------
            */
            $stmt = $dbConexion->conectar()->prepare("CALL usp_eliminarpropietarios(?)");
            $stmt -> bindParam(1, $datos["id_prop"], PDO::PARAM_INT);
            
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
                  $prmMensaje =  $row[1]; //COLUMNA DEL MENSAJE
                }
              }
          
  
            } ;
  
            /*
            |--------------------------------------------------------------------
            | AQUI CARGO LOS VALORES PARA EL MENSAJE QUE SE MOSTRARA AL USUARIO
            |--------------------------------------------------------------------
            */
            $dataRes = array(
              'error' => $prmError,
              'mensaje' =>  $prmMensaje
            );
  
            echo json_encode($dataRes);
  
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


 public function seleccionarregistros($tabla,$idprop){

  If($idprop == null || $idprop == 0){

        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarcobrador()");
          //$stmt ->bindParam(1, $valor, PDO::PARAM_INT);
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
              
              $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarcobrador()");
              //$stmt ->bindParam(1, $idprop, PDO::PARAM_INT);
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



     public function seleccionasignar($tabla,$iten,$valor){

      If($iten == null && $valor == null){


            try {

              $dbConexion = new conexcion();  

                $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarunidades");
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
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarunidades" );
        
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
