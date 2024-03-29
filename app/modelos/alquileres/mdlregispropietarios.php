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
class mdlregispropietarios{

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
  $prmIdPropietario = 0;


  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registropropietarios(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
          $stmt -> bindParam(1, $datos["id_prop"], PDO::PARAM_INT); //ESTE ES EL ID DEL PROPIETARIO
          $stmt -> bindParam(2, $datos["cod_prop"], PDO::PARAM_STR);
          $stmt -> bindParam(3, $datos["mon_prop"], PDO::PARAM_STR);            
          $stmt -> bindParam(4, $datos["ape_prop"], PDO::PARAM_STR);          
          $stmt -> bindParam(5, $datos["id_nacionalidad"], PDO::PARAM_INT);   
          $stmt -> bindParam(6, $datos["cedula_prop"], PDO::PARAM_STR); 
          $stmt -> bindParam(7, $datos["id_rif"], PDO::PARAM_INT);       
          $stmt -> bindParam(8, $datos["rif_prop"], PDO::PARAM_STR);                   
          $stmt -> bindParam(9, $datos["telefono_prop"], PDO::PARAM_STR);     
          $stmt -> bindParam(10, $datos["cel_prop"], PDO::PARAM_STR);          
          $stmt -> bindParam(11, $datos["correo_prop"], PDO::PARAM_STR);       
          $stmt -> bindParam(12, $datos["id_estado"], PDO::PARAM_INT);         
          $stmt -> bindParam(13, $datos["id_municipio"], PDO::PARAM_INT);      
          $stmt -> bindParam(14, $datos["id_parroquia"], PDO::PARAM_INT); 
          $stmt -> bindParam(15, $datos["dir_prop"], PDO::PARAM_STR);
          $stmt -> bindParam(16, $datos["ofi_prop"], PDO::PARAM_STR);     
          $stmt -> bindParam(17, $datos["tipo_persona"], PDO::PARAM_INT);       
          $stmt -> bindParam(18, $datos["rep_prop"], PDO::PARAM_STR);
          
            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS BANCOS NACIONALES
            |-----------------------------------------------
            */

          $stmt -> bindParam(19, $datos["cuenta_id_nacional"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_PROPIETARIOS_NACIONAL
          $stmt -> bindParam(20, $datos["cuenta_id_banco"], PDO::PARAM_INT); //CAMPO OBLIGATORIO
          $stmt -> bindParam(21, $datos["num_cuenta_nacional"], PDO::PARAM_STR); //CAMPO OBLIGATORIO

          $stmt -> bindParam(22, $datos["pagomovil_cedula"], PDO::PARAM_INT);     
          $stmt -> bindParam(23, $datos["pagomovil_id_banco"], PDO::PARAM_INT);       
          $stmt -> bindParam(24, $datos["pagomovil_telefono"], PDO::PARAM_STR);


            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS BANCOS INTERNACIONALES
            |-----------------------------------------------
            */

            $stmt -> bindParam(25, $datos["cuenta_id_internacional"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_PROPIETARIOS_NACIONAL
            $stmt -> bindParam(26, $datos["ban_extr"], PDO::PARAM_STR); 
            $stmt -> bindParam(27, $datos["age_extr"], PDO::PARAM_STR); 
            $stmt -> bindParam(28, $datos["dc_extr"], PDO::PARAM_STR);     
            $stmt -> bindParam(29, $datos["cue_extr"], PDO::PARAM_STR);       
            $stmt -> bindParam(30, $datos["iba_extr"], PDO::PARAM_STR);
            $stmt -> bindParam(31, $datos["bic_extr"], PDO::PARAM_STR);
  
            /*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS paypal
            |-----------------------------------------------
            */

            $stmt -> bindParam(32, $datos["cuenta_id_paypal"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA CUENTAS_PROPIETARIOS_INTERNACIONAL
            $stmt -> bindParam(33, $datos["cor_payp"], PDO::PARAM_STR); 
            $stmt -> bindParam(34, $datos["nom_payp"], PDO::PARAM_STR); 

/*
            |-----------------------------------------------
            | AQUI VAN LOS DATOS DE LOS ZELLE
            |-----------------------------------------------
            */

            $stmt -> bindParam(35, $datos["cuenta_id_zelle"], PDO::PARAM_INT); //ESTE ES EL ID DEL REGISTRO EN LA TABLA ZELLE_BENEFICIARIOJ
            $stmt -> bindParam(36, $datos["tel_zelle"], PDO::PARAM_STR); 
            $stmt -> bindParam(37, $datos["cor_zelle"], PDO::PARAM_STR); 
            $stmt -> bindParam(38, $datos["nom_zelle"], PDO::PARAM_STR);

                  
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
                  $prmIdPropietario = $row[2]; //AQUI OBTENGO EL ID DEL PROPIETARIO
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
            $subirArchivos->validarArchivos($archivos,$prmIdPropietario,$prmTipoPersonaTEMP,'1P');
          } else {
            $subirArchivos->validarArchivos($archivos,$prmIdPropietario,$prmTipoPersonaTEMP,'2P');
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


          if( $prmIdPropietario > 0 ){

            $dataRegistro["Items"][] = ["ID_PROPIETARIO" => $prmIdPropietario];
          
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

              $datosBusqueda = array(
                'id_prop' => '0',
                'codigo_prop' =>  '',
                'tipo_prop' => '0'
              );


                $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarpropietario(?,?,?)");
                $stmt -> bindParam(1,$datosBusqueda["id_prop"], PDO::PARAM_INT);
                $stmt -> bindParam(2,$datosBusqueda["codigo_prop"], PDO::PARAM_STR);
                $stmt -> bindParam(3,$datosBusqueda["tipo_prop"], PDO::PARAM_INT);

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

      }else{


        try {

          $dbConexion = new conexcion();
          
          $datosBusqueda = array(
            'id_prop' => '0',
            'codigo_prop' =>  '',
            'tipo_prop' => '0'
          );


            $stmt = $dbConexion->conectar()->prepare("CALL usp_cargarpropietario(?,?,?)");
            $stmt -> bindParam(1,$datosBusqueda["id_prop"], PDO::PARAM_INT);
            $stmt -> bindParam(2,$datosBusqueda["codigo_prop"], PDO::PARAM_STR);
            $stmt -> bindParam(3,$datosBusqueda["tipo_prop"], PDO::PARAM_INT);

          //$stmt ->bindParam(":".$iten, $valor, PDO::PARAM_STR);
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













