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
class mdlregiscontrato{

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
  $prmIdcontrato = 0;

  $fechadesde = str_replace($datos["fec_desd"],"-","");
  $fechahasta = str_replace($datos["fec_hast"],"-","");
  $fechaapatir = str_replace($datos["pas_cont"],"-","");
  $fechacontrato = str_replace($datos["fec_cont"],"-","");

  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_contrato(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

          $stmt -> bindParam(1, $datos["id"], PDO::PARAM_INT); //ESTE ES EL ID DEL Cobrador
          $stmt -> bindParam(2, $datos["cod_cont"], PDO::PARAM_STR);		 
          $stmt -> bindParam(3, $datos["id_inqu "], PDO::PARAM_INT); 		
          $stmt -> bindParam(4, $datos["id_inmu "], PDO::PARAM_INT); 		
          $stmt -> bindParam(5, $datos["id_unid "], PDO::PARAM_INT); 		
          $stmt -> bindParam(6, $datos["id_prop "], PDO::PARAM_INT); 		
          $stmt -> bindParam(7, $datos["repre_administradora"], PDO::PARAM_STR); 
          $stmt -> bindParam(8, $datos["can_cont"], PDO::PARAM_INT); 		
          $stmt -> bindParam(9,  $fechadesde,PDO::PARAM_INT); 		
          $stmt -> bindParam(10, $fechahasta,PDO::PARAM_INT);		
          $stmt -> bindParam(11, $datos["per_pror"], PDO::PARAM_STR); 		
          $stmt -> bindParam(12, $datos["dia_pago"], PDO::PARAM_INT); 		
          $stmt -> bindParam(13, $fechaapatir,PDO::PARAM_INT); 		
          $stmt -> bindParam(14, $datos["ins_cont"], PDO::PARAM_INT); 		
          $stmt -> bindParam(15, $fechacontrato,PDO::PARAM_INT);		
          $stmt -> bindParam(16, $datos["adm_inmu"], PDO::PARAM_INT); 		
          $stmt -> bindParam(17, $datos["pap_inmu"], PDO::PARAM_INT); 		
          $stmt -> bindParam(18, $datos["iva_inmu"], PDO::PARAM_INT); 		
          $stmt -> bindParam(19, $datos["imp_inmu"], PDO::PARAM_INT); 		
          $stmt -> bindParam(20, $datos["dep_cont"], PDO::PARAM_INT); 		
          $stmt -> bindParam(21, $datos["com_cont"], PDO::PARAM_INT); 		
          $stmt -> bindParam(22, $datos["hab_cont"], PDO::PARAM_STR); 		
          $stmt -> bindParam(23, $datos["for_cont"], PDO::PARAM_STR); 		
          $stmt -> bindParam(24, $datos["por_rete"], PDO::PARAM_INT); 		
          $stmt -> bindParam(25, $datos["ret_cont"], PDO::PARAM_INT); 		
          $stmt -> bindParam(26, $datos["doc_cont"], PDO::PARAM_STR); 				
          $stmt -> bindParam(27, $datos["id_usuario"], PDO::PARAM_INT);  
          
          

                  
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
                  $prmIdcontrato = $row[2]; //AQUI OBTENGO EL ID DEL PROPIETARIO
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
         /*
          $subirArchivos = new ctrsubirarchivos();

          $prmTipoPersonaTEMP = $datos["tipo_persona"];



          IF($prmTipoPersonaTEMP == 1){
            $subirArchivos->validarArchivos($archivos,$prmIdcontrato,$prmTipoPersonaTEMP,'1IB');
          } else {
            $subirArchivos->validarArchivos($archivos,$prmIdcontrato,$prmTipoPersonaTEMP,'2P');
          }
          */



          /*
          |--------------------------------------------------------------------
          | AQUI CARGO LOS VALORES PARA EL MENSAJE QUE SE MOSTRARA AL USUARIO
          |--------------------------------------------------------------------
          */
          $dataRes = array(
            'error' => $prmError,
            'mensaje' =>  $prmMensaje
          );


          if( $prmIdcontrato > 0 ){

            $dataRegistro["Items"][] = ["ID_CONTRATO" => $prmIdcontrato];
          
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


 public function seleccionarregistros($tabla,$iten,$valor){

  //If($idprop == null || $idprop == 0)
  If($iten == null && $valor == null){

        try {

          $dbConexion = new conexcion();
          $valor = 0;
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registrocontrato()");
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
              
              $stmt = $dbConexion->conectar()->prepare("CALL usp_registrocontrato()");
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



     public function seleccionasignar($tabla,$codigo){

      If($codigo == null && $codigo == null){


            try {

              $dbConexion = new conexcion();  

                $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_asignacion_cobrador(?)");
                $stmt -> bindParam(1,$codigo,PDO::PARAM_STR);
              
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
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_asignacion_cobrador(?)" );
          $stmt -> bindParam(1,$codigo,PDO::PARAM_STR);
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




      }
  }



  public function seleccionasignarinquilino($tabla,$codigo){

    If($codigo == null && $codigo == null){


          try {

            $dbConexion = new conexcion();  

              $stmt = $dbConexion->conectar()->prepare("CALL usp_contrato_inquilino(?)");
              $stmt -> bindParam(1,$codigo,PDO::PARAM_STR);
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
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_contrato_inquilino(?)" );
      
        $stmt -> bindParam(1,$codigo,PDO::PARAM_STR);
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




    }
}



}/*fin*/