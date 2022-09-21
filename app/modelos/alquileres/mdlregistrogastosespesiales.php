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
class mdlregistrogastosespesiales{

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
  $prmIdgastos = 0;



  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registrargastosespeciles(?,?,?,?,?,?,?,?,?)");

          $stmt -> bindParam(1, $datos["id_gesp"], PDO::PARAM_INT); //ESTE ES EL ID DEL gastos
          $stmt -> bindParam(2, $datos["id_inmu"], PDO::PARAM_INT); 		
          $stmt -> bindParam(3, $datos["id_unid"], PDO::PARAM_INT);
          $stmt -> bindParam(4, $datos["id_inqu"], PDO::PARAM_INT);
          $stmt -> bindParam(5, $datos["tipo_inqui"], PDO::PARAM_INT);
          $stmt -> bindParam(6, $datos["concepto"], PDO::PARAM_STR); 
          $stmt -> bindParam(7, $datos["monto"], PDO::PARAM_STR);
          $stmt -> bindParam(8, $datos["mes"], PDO::PARAM_INT);
          $stmt -> bindParam(9, $datos["id_usuario"], PDO::PARAM_INT);		

          
                  
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
                  $prmIdgastos = $row[2]; //AQUI OBTENGO EL ID DEL PROPIETARIO
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


          if( $prmIdgastos > 0 ){

            $dataRegistro["Items"][] = ["ID_GASTOS" => $prmIdgastos];
          
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
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_consulta_gastosespeciales()");
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
              
              $stmt = $dbConexion->conectar()->prepare("CALL usp_consulta_gastosespeciales()");
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

                $stmt = $dbConexion->conectar()->prepare("CALL usp_consultarInmueble(?)");
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
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_consultarInmueble(?)" );
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



  public function seleccionarconsultagastos($prmid_inmu,$prmid_unid,$prmid_innq,$prmtipo_inqui){


  
      try {
  
        $dbConexion = new conexcion();
        $valor = 0;
        
        $stmt = $dbConexion->conectar()->prepare("CALL usp_gastosespecioales_por_inmueble(?,?,?,?)");
        $stmt ->bindParam(1, $prmid_inmu, PDO::PARAM_INT);
        $stmt ->bindParam(2, $prmid_unid, PDO::PARAM_INT);
        $stmt ->bindParam(3, $prmid_innq, PDO::PARAM_INT);
        $stmt ->bindParam(4, $prmtipo_inqui, PDO::PARAM_INT);
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
  
  
   




  public function eliminargastos($tabla,$datos){

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
            $stmt = $dbConexion->conectar()->prepare("CALL usp_eliminargastosespeciales(?)");
            $stmt -> bindParam(1, $datos["id_gesp"], PDO::PARAM_INT);
            
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



}/*fin*/