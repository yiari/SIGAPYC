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
class mdlregisbenficiario{

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
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registrobeneficiario(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

          $stmt -> bindParam(1, $datos["id_bene"], PDO::PARAM_INT); //ESTE ES EL ID DEL Beneficiario
          $stmt -> bindParam(2, $datos["id_prop"], PDO::PARAM_INT); //ESTE ES EL ID DEL PROPIETARIO
          $stmt -> bindParam(3, $datos["cod_bene"], PDO::PARAM_STR);
          $stmt -> bindParam(4, $datos["mon_bene"], PDO::PARAM_STR);            
          $stmt -> bindParam(5, $datos["ape_bene"], PDO::PARAM_STR);          
          $stmt -> bindParam(6, $datos["nac_bene"], PDO::PARAM_INT);   
          $stmt -> bindParam(7, $datos["cel_bene"], PDO::PARAM_STR);       
          $stmt -> bindParam(8, $datos["rif_bene"], PDO::PARAM_STR);                    
          $stmt -> bindParam(9, $datos["loc_bene"], PDO::PARAM_STR);     
          $stmt -> bindParam(10, $datos["cel_bene"], PDO::PARAM_STR);          
          $stmt -> bindParam(11, $datos["cor_bene"], PDO::PARAM_STR);       
          $stmt -> bindParam(12, $datos["id_estado"], PDO::PARAM_INT);         
          $stmt -> bindParam(13, $datos["id_municipio"], PDO::PARAM_INT);      
          $stmt -> bindParam(14, $datos["id_parroquia"], PDO::PARAM_INT); 
          $stmt -> bindParam(15, $datos["dir_bene"], PDO::PARAM_INT);
          $stmt -> bindParam(16, $datos["ofi_bene"], PDO::PARAM_INT);     
          $stmt -> bindParam(17, $datos["tipo_persona"], PDO::PARAM_STR);       
         
          
            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS BANCOS NACIONALES
            |-----------------------------------------------
            */

          $stmt -> bindParam(18, $datos["cuenta_id_nacional"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_PROPIETARIOS_NACIONAL
          $stmt -> bindParam(19, $datos["cuenta_id_banco"], PDO::PARAM_INT); //CAMPO OBLIGATORIO
          $stmt -> bindParam(20, $datos["num_cuenta_nacional"], PDO::PARAM_STR); //CAMPO OBLIGATORIO

          $stmt -> bindParam(21, $datos["pagomovil_cedula"], PDO::PARAM_INT);     
          $stmt -> bindParam(22, $datos["pagomovil_id_banco"], PDO::PARAM_INT);       
          $stmt -> bindParam(23, $datos["pagomovil_telefono"], PDO::PARAM_STR);


            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS BANCOS INTERNACIONALES
            |-----------------------------------------------
            */

            $stmt -> bindParam(24, $datos["cuenta_id_internacional"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_PROPIETARIOS_INTERNACIONAL
            
            $stmt -> bindParam(25, $datos["ban_extr"], PDO::PARAM_STR); 
            $stmt -> bindParam(26, $datos["age_extr"], PDO::PARAM_STR); 
            $stmt -> bindParam(27, $datos["dc_extr"], PDO::PARAM_STR);     
            $stmt -> bindParam(28, $datos["cue_extr"], PDO::PARAM_STR);       
            $stmt -> bindParam(29, $datos["iba_extr"], PDO::PARAM_STR);
            $stmt -> bindParam(30, $datos["bic_extr"], PDO::PARAM_STR);
  
  /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS paypal
            |-----------------------------------------------
            */

            $stmt -> bindParam(31, $datos["cuenta_id_paypal"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_PROPIETARIOS_INTERNACIONAL
            
            $stmt -> bindParam(32, $datos["cor_payp"], PDO::PARAM_STR); 
            $stmt -> bindParam(33, $datos["nom_payp"], PDO::PARAM_STR); 



                  
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

            $dataRegistro["Items"][] = ["ID_BENEFICIARIO" => $prmIdBeneficiario];
          
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

      If($iten == null && $valor == null){


            try {

              $dbConexion = new conexcion();  

                $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarbeneficiario");
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
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarbeneficiario");
        
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
