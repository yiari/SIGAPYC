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
class mdlregistroapoderado{

public function registrar($tabla,$datos){

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
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registroapoderado(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
          $stmt -> bindParam(1,  $datos ["id_apod"],  PDO::PARAM_INT); //ESTE ES EL ID DEL APODRRADO
		      $stmt -> bindParam(2,  $datos ["id_prop"],  PDO::PARAM_INT); //ESTE ES EL ID DEL PROPIETARIO
          $stmt -> bindParam(3,  $datos ["cod_apod"], PDO::PARAM_STR);
          $stmt -> bindParam(4,  $datos ["nom_apod"], PDO::PARAM_STR);            
          $stmt -> bindParam(5,  $datos ["ape_apod"], PDO::PARAM_STR);          
          $stmt -> bindParam(6,  $datos ["nac_apod"], PDO::PARAM_INT);   
          $stmt -> bindParam(7,  $datos ["ci_apod"],  PDO::PARAM_STR);       
          $stmt -> bindParam(8,  $datos ["rif_apod"], PDO::PARAM_STR);                     
          $stmt -> bindParam(9,  $datos ["loc_apod"], PDO::PARAM_STR);     
          $stmt -> bindParam(10, $datos ["cel_apod"], PDO::PARAM_STR);          
          $stmt -> bindParam(11, $datos ["cor_apod"], PDO::PARAM_STR);       
          $stmt -> bindParam(12, $datos ["est_apod"], PDO::PARAM_INT);         
          $stmt -> bindParam(13, $datos ["mun_apod"], PDO::PARAM_INT);      
          $stmt -> bindParam(14, $datos ["par_apod"], PDO::PARAM_INT); 
          $stmt -> bindParam(15, $datos ["dir_apod"], PDO::PARAM_STR);
          $stmt -> bindParam(16, $datos ["ofi_apod"], PDO::PARAM_STR);     
          $stmt -> bindParam(17, $datos ["tip_apod"], PDO::PARAM_INT);       
          $stmt -> bindParam(18, $datos ["cod_pode"], PDO::PARAM_STR);
          $stmt -> bindParam(19, $datos ["not_pode"], PDO::PARAM_STR);
          $stmt -> bindParam(20, $datos ["fec_pode"], PDO::PARAM_INT);
          $stmt -> bindParam(21, $datos ["num_pode"], PDO::PARAM_STR);
          $stmt -> bindParam(22, $datos ["tom_pode"], PDO::PARAM_STR);
          $stmt -> bindParam(23, $datos ["fol_pode"], PDO::PARAM_STR);
              
            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS BANCOS NACIONALES
            |-----------------------------------------------
            */

          $stmt -> bindParam(24, $datos["cuenta_id_nacional"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_PROPIETARIOS_NACIONAL
          $stmt -> bindParam(25, $datos["cuenta_id_banco"], PDO::PARAM_INT); //CAMPO OBLIGATORIO
          $stmt -> bindParam(26, $datos["num_cuenta_nacional"], PDO::PARAM_STR); //CAMPO OBLIGATORIO

          $stmt -> bindParam(27, $datos["pagomovil_cedula"], PDO::PARAM_INT);     
          $stmt -> bindParam(28, $datos["pagomovil_id_banco"], PDO::PARAM_INT);       
          $stmt -> bindParam(29, $datos["pagomovil_telefono"], PDO::PARAM_STR);


            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS BANCOS INTERNACIONALES
            |-----------------------------------------------
            */

            $stmt -> bindParam(30, $datos["cuenta_id_internacional"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_PROPIETARIOS_NACIONAL
            
            $stmt -> bindParam(31, $datos["ban_extr"], PDO::PARAM_STR); 
            $stmt -> bindParam(32, $datos["age_extr"], PDO::PARAM_STR); 
            $stmt -> bindParam(33, $datos["dc_extr"], PDO::PARAM_STR);     
            $stmt -> bindParam(34, $datos["cue_extr"], PDO::PARAM_STR);       
            $stmt -> bindParam(35, $datos["iba_extr"], PDO::PARAM_STR);
            $stmt -> bindParam(36, $datos["bic_extr"], PDO::PARAM_STR);
  
                  
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

              $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarapoderado()");
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
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarapoderado()" );
      
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