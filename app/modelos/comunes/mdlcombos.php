<?php

/*
|----------------------------------------
| INCLUYO LA CLASE CORRESPONDIENTE
|----------------------------------------
*/
include_once '../../../app/modelos/conexcion.php';

class mdlcombos{


    public function getestados(){
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
                $stmt = $dbConexion->conectar()->prepare("CALL usp_getestados()");
        
                /*
                |---------------------------------
                | AQUI SE EJECUTA LA OPERACION
                |---------------------------------
                */
                $stmt->execute();
      
                $dataRegistro["Items"][] = $stmt->fetchAll();
            
                $dataRes = array(
                  'error' => '0',
                  'mensaje' =>  'correcto'
                );
                          
                echo json_encode(array_merge($dataRegistro,$dataRes));
        
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



         public function getmunicipios($idestado){
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
                $stmt = $dbConexion->conectar()->prepare('CALL usp_getmunicipios(' .  $idestado . ')');
        
                /*
                |---------------------------------
                | AQUI SE EJECUTA LA OPERACION
                |---------------------------------
                */
                $stmt->execute();
      
                $dataRegistro["Items"][] = $stmt->fetchAll();
            
                $dataRes = array(
                  'error' => '0',
                  'mensaje' =>  'correcto'
                );
                          
                echo json_encode(array_merge($dataRegistro,$dataRes));
        
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



        public function getparroquias($idmunicipio){
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
                  $stmt = $dbConexion->conectar()->prepare('CALL usp_getparroquias(' .  $idmunicipio . ')');
          
                  /*
                  |---------------------------------
                  | AQUI SE EJECUTA LA OPERACION
                  |---------------------------------
                  */
                  $stmt->execute();
        
                  $dataRegistro["Items"][] = $stmt->fetchAll();
              
                  $dataRes = array(
                    'error' => '0',
                    'mensaje' =>  'correcto'
                  );
                            
                  echo json_encode(array_merge($dataRegistro,$dataRes));
          
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



          public function getbancos(){
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
                    $stmt = $dbConexion->conectar()->prepare("CALL usp_getbancos()");
            
                    /*
                    |---------------------------------
                    | AQUI SE EJECUTA LA OPERACION
                    |---------------------------------
                    */
                    $stmt->execute();
          
                    $dataRegistro["Items"][] = $stmt->fetchAll();
                
                    $dataRes = array(
                      'error' => '0',
                      'mensaje' =>  'correcto'
                    );
                              
                    echo json_encode(array_merge($dataRegistro,$dataRes));
            
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


            public function getrepresentante(){
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
                      $stmt = $dbConexion->conectar()->prepare("CALL usp_getrepresentante_legal()");
              
                      /*
                      |---------------------------------
                      | AQUI SE EJECUTA LA OPERACION
                      |---------------------------------
                      */
                      $stmt->execute();
            
                      $dataRegistro["Items"][] = $stmt->fetchAll();
                  
                      $dataRes = array(
                        'error' => '0',
                        'mensaje' =>  'correcto'
                      );
                                
                      echo json_encode(array_merge($dataRegistro,$dataRes));
              
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