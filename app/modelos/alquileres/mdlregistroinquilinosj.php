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
class mdlregistroinquilinosj{

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
  $prmIdinquilino = 0;

  $fecha = str_replace($datos["fec_regi"],"-","");

  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registroinquilinos_j(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
          $stmt -> bindParam(1,  $datos["id"], PDO::PARAM_INT);
          $stmt -> bindParam(2,  $datos["cod_inqu"],PDO::PARAM_STR); 
          $stmt -> bindParam(3,  $datos["nom_inqj"],PDO::PARAM_STR); 
          $stmt -> bindParam(4,  $datos["rif_inqj"],PDO::PARAM_STR); 
          $stmt -> bindParam(5,  $datos["act_inqj"],PDO::PARAM_STR); 
          $stmt -> bindParam(6,  $datos["dir_inqj"],PDO::PARAM_STR); 
          $stmt -> bindParam(7,  $datos["tel_inqj"],PDO::PARAM_STR); 
          $stmt -> bindParam(8,  $datos["cor_inqj"],PDO::PARAM_STR); 
          $stmt -> bindParam(9,  $datos["cod_regi"],PDO::PARAM_STR); 
          $stmt -> bindParam(10, $datos["not_regi"],PDO::PARAM_STR); 
          $stmt -> bindParam(11, $datos["fec_regi"],PDO::PARAM_INT); 
          $stmt -> bindParam(12,$fecha,PDO::PARAM_INT);
          $stmt -> bindParam(12, $datos["num_regi"],PDO::PARAM_INT);
          $stmt -> bindParam(13, $datos["tom_regi"],PDO::PARAM_STR); 
          $stmt -> bindParam(14, $datos["fol_regi"],PDO::PARAM_STR); 
          $stmt -> bindParam(15, $datos["tip_inqu"],PDO::PARAM_STR); 
          $stmt -> bindParam(16,$datos["posee_pagadorj"],PDO::PARAM_INT);

          $stmt -> bindParam(17,$datos["nom_repr1"],PDO::PARAM_STR);
          $stmt -> bindParam(18,$datos["ape_repr1"],PDO::PARAM_STR);
          $stmt -> bindParam(19,$datos["nac_repr1"],PDO::PARAM_INT);
          $stmt -> bindParam(20,$datos["ci_repr1"],PDO::PARAM_STR);
          $stmt -> bindParam(21,$datos["rif_repr1"],PDO::PARAM_STR);
          $stmt -> bindParam(22,$datos["loc_repr1"],PDO::PARAM_STR);
          $stmt -> bindParam(23,$datos["cel_repr1"],PDO::PARAM_STR);
          $stmt -> bindParam(24,$datos["cor_repr1"],PDO::PARAM_STR);


          $stmt -> bindParam(25,$datos["nom_repr2"],PDO::PARAM_STR);
          $stmt -> bindParam(26,$datos["ape_repr2"],PDO::PARAM_STR);
          $stmt -> bindParam(27,$datos["nac_repr2"],PDO::PARAM_INT);
          $stmt -> bindParam(28,$datos["ci_repr2"],PDO::PARAM_STR);
          $stmt -> bindParam(29,$datos["rif_repr2"],PDO::PARAM_STR);
          $stmt -> bindParam(30,$datos["loc_repr2"],PDO::PARAM_STR);
          $stmt -> bindParam(31,$datos["cel_repr2"],PDO::PARAM_STR);
          $stmt -> bindParam(32,$datos["cor_repr2"],PDO::PARAM_STR);



          
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
                  $prmIdinquilino = $row[2]; //AQUI OBTENGO EL ID DEL PAGADOR
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

          $prmTipoPersonaTEMP = $datos["tip_inqu"];



          IF($prmTipoPersonaTEMP == 2){
            $subirArchivos->validarArchivos($archivos,$prmIdinquilino,$prmTipoPersonaTEMP,'2Q');
          } else {
            $subirArchivos->validarArchivos($archivos,$prmIdinquilino,$prmTipoPersonaTEMP,'2P');
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

          if( $prmIdinquilino > 0 ){

            $dataRegistro["Items"][] = ["ID_INQUILINO" => $prmIdinquilino];
          
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



  public function eliminarinquilinoj($tabla,$datos){

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
            $stmt = $dbConexion->conectar()->prepare("CALL usp_");
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


    public function consultarInquilinoJuridico($tabla,$items){

      If($items == null){
    
    
                    $dataRes = array(
                      'error' => '1',
                      'mensaje' =>  "Mensaje de Error: No hay registro para buscar."
                    );
              
    
      }else{
    
    
        try {
    
          $dbConexion = new conexcion();
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cagar_editar_inquilino_juridico(?)");
          $stmt -> bindParam(1,$items["id_inqu"], PDO::PARAM_INT);
         
  
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