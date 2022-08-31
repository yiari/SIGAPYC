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
class mdlregisbenficiarioj{

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
  $prmIdBeneficiarioj = 0;


  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registrobeneficiario_j(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

          $stmt -> bindParam(1, $datos["id"], PDO::PARAM_INT); //ESTE ES EL ID DEL Beneficiario Jurídico
          $stmt -> bindParam(2, $datos["id_prop"], PDO::PARAM_INT); //ESTE ES EL ID DEL PROPIETARIO
          $stmt -> bindParam(3, $datos ["tipo_propietarioj"],  PDO::PARAM_INT); //ESTE ES EL TIPO 
          $stmt -> bindParam(4, $datos["cod_bene"], PDO::PARAM_STR);
          $stmt -> bindParam(5, $datos["mon_benej"], PDO::PARAM_STR);                  
          $stmt -> bindParam(6, $datos["rif_benej"], PDO::PARAM_STR);
          $stmt -> bindParam(7, $datos["cor_benej"], PDO::PARAM_STR);
          $stmt -> bindParam(8, $datos["cel_benej"], PDO::PARAM_STR);
          $stmt -> bindParam(9, $datos["act_benej"], PDO::PARAM_STR);                          
          $stmt -> bindParam(10, $datos["dir_benej"], PDO::PARAM_STR);   
          $stmt -> bindParam(11, $datos["tipo_persona"], PDO::PARAM_STR);       
         
          
            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS BANCOS NACIONALES
            |-----------------------------------------------
            */

          $stmt -> bindParam(12, $datos["cuenta_id_nacionalj"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_BENEFICIARIO_NACIONAL
          $stmt -> bindParam(13, $datos["id_bancoj"], PDO::PARAM_INT); //CAMPO OBLIGATORIO
          $stmt -> bindParam(14, $datos["num_cuenta_nacionalj"], PDO::PARAM_STR); //CAMPO OBLIGATORIO


          /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS PAGOS MOVIL
            |-----------------------------------------------
            */
          $stmt -> bindParam(15, $datos["pagomovil_cedulaj"], PDO::PARAM_INT);     
          $stmt -> bindParam(16, $datos["pagomovil_id_bancoj"], PDO::PARAM_INT);       
          $stmt -> bindParam(17, $datos["pagomovil_telefonoj"], PDO::PARAM_STR);


            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS BANCOS INTERNACIONALES
            |-----------------------------------------------
            */

            $stmt -> bindParam(18, $datos["cuenta_id_internacionalj"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_BENEFICIARIO_INTERNACIONAL
            
            $stmt -> bindParam(19, $datos["ban_extrj"], PDO::PARAM_STR); 
            $stmt -> bindParam(20, $datos["age_extrj"], PDO::PARAM_STR); 
            $stmt -> bindParam(21, $datos["dc_extrj"],  PDO::PARAM_STR);     
            $stmt -> bindParam(22, $datos["cue_extrj"], PDO::PARAM_STR);       
            $stmt -> bindParam(23, $datos["iba_extrj"], PDO::PARAM_STR);
            $stmt -> bindParam(24, $datos["bic_extrj"], PDO::PARAM_STR);
  
            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS paypal
            |-----------------------------------------------
            */

            $stmt -> bindParam(25, $datos["cuenta_id_paypalj"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA PAYPAL_BENEFICIARIOJ
            $stmt -> bindParam(26, $datos["cor_paypJ"], PDO::PARAM_STR); 
            $stmt -> bindParam(27, $datos["nom_paypJ"], PDO::PARAM_STR); 


            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS ZELLE
            |-----------------------------------------------
            */

            $stmt -> bindParam(28, $datos["cuenta_id_zelle"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA PAYPAL_BENEFICIARIOJ
            $stmt -> bindParam(29, $datos["tel_zellej"], PDO::PARAM_STR); 
            $stmt -> bindParam(30, $datos["cor_zellej"], PDO::PARAM_STR); 
            $stmt -> bindParam(31, $datos["nom_zellej"], PDO::PARAM_STR);



                  
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
                  $prmIdBeneficiarioj = $row[2]; //AQUI OBTENGO EL ID DEL PROPIETARIO
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



          IF($prmTipoPersonaTEMP == 2){
            $subirArchivos->validarArchivos($archivos,$prmIdBeneficiarioj,$prmTipoPersonaTEMP,'2IB');
          } else {
            $subirArchivos->validarArchivos($archivos,$prmIdBeneficiarioj,$prmTipoPersonaTEMP,'2P');
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


          if( $prmIdBeneficiarioj > 0 ){

            $dataRegistro["Items"][] = ["ID_BENEFICIARIOJ" => $prmIdBeneficiarioj];
          
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



  public function consultabeneficiariojuridico($tabla,$items){

    If($items == null){
  
  
                  $dataRes = array(
                    'error' => '1',
                    'mensaje' =>  "Mensaje de Error: No hay registro para buscar."
                  );
            
  
    }else{
  
  
      try {
  
        $dbConexion = new conexcion();
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_cargar_editar_beneficiario_juridico(?)");
        $stmt -> bindParam(1,$items["id_bene"], PDO::PARAM_INT);
       

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


 

  



}