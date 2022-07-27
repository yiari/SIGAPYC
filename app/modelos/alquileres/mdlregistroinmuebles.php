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
class mdlregistroinmueble{

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
  $prmIdinmueble = 0;



  
      try {
  
         /* 
          |----------------------------------------------------------------------------------
          | AQUI PREPARO LO QUE SERA LA LLAMADA AL PROCEDIMIENTO QUE REALIZARA LA OPERACION
          |----------------------------------------------------------------------------------
          */
          $stmt = $dbConexion->conectar()->prepare("CALL usp_registroinmueble(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
          $stmt -> bindParam(1, $datos["id_inmu"],PDO::PARAM_INT); //id del imnumeble
          $stmt -> bindParam(2, $datos["id_prop"],PDO::PARAM_INT); //id propietraio
          $stmt -> bindParam(3, $datos["cod_inmu"],PDO::PARAM_STR); // codigo del inmueble
          $stmt -> bindParam(4, $datos["tip_inmu"],PDO::PARAM_INT); // tipo de inmuebles
          $stmt -> bindParam(5, $datos["act_inmu"],PDO::PARAM_STR); //actividad del inmueble
          $stmt -> bindParam(6, $datos["ant_inmu"],PDO::PARAM_STR); //antiguedad del inmueble 
          $stmt -> bindParam(7, $datos["cod_esta"],PDO::PARAM_INT); // estado
          $stmt -> bindParam(8, $datos["cod_muni"],PDO::PARAM_INT); // municipio
          $stmt -> bindParam(9, $datos["cod_parr"],PDO::PARAM_INT); // parroquia
          $stmt -> bindParam(10,$datos["dir_inmu"],PDO::PARAM_STR); // direccion 
          $stmt -> bindParam(11,$datos["pun_inmu"],PDO::PARAM_STR); // punto de referencia
          $stmt -> bindParam(12,$datos["equ_inmu"],PDO::PARAM_STR); // equipado
          $stmt -> bindParam(13,$datos["mtr_inmu"],PDO::PARAM_INT); // metros del inmueble
          $stmt -> bindParam(14,$datos["mtr_cons"],PDO::PARAM_INT); // metros de construccion
          $stmt -> bindParam(15,$datos["hab_inmu"],PDO::PARAM_INT); // cantidad de habitacion
          $stmt -> bindParam(16,$datos["ban_inmu"],PDO::PARAM_INT); // cantidad e baño
          $stmt -> bindParam(17,$datos["est_inmu"],PDO::PARAM_INT); // cantidad de puesto de estacionamiento
          $stmt -> bindParam(18,$datos["ser_inmu"],PDO::PARAM_STR); // metros de la area de servicio
          $stmt -> bindParam(19,$datos["lim_nort"],PDO::PARAM_STR); // limites norte
          $stmt -> bindParam(20,$datos["lim_sur"],PDO::PARAM_STR); // limites sur
          $stmt -> bindParam(21,$datos["lim_este"],PDO::PARAM_STR); // limites este
          $stmt -> bindParam(22,$datos["lim_oest"],PDO::PARAM_STR); // limites oeste
          $stmt -> bindParam(23,$datos["nom_regi"],PDO::PARAM_STR); // nombre3 del registro
          $stmt -> bindParam(24,$datos["fec_regi"],PDO::PARAM_INT); // fecha del registro
          $stmt -> bindParam(25,$datos["tom_regi"],PDO::PARAM_STR); // tomo del registro
          $stmt -> bindParam(26,$datos["fol_regi"],PDO::PARAM_STR); // foli del registro
          $stmt -> bindParam(27,$datos["asi_regi"],PDO::PARAM_STR); // asiento del registro
          $stmt -> bindParam(28,$datos["fic_cata"],PDO::PARAM_STR); // Numero del ficha castratal
          $stmt -> bindParam(29,$datos["num_regi"],PDO::PARAM_STR); // Numero del codigo del registro
          $stmt -> bindParam(30,$datos["tipo_persona"],PDO::PARAM_INT); // Numero del ficha castratal

          //$stmt -> bindParam(19,$datos["sta_inmu"],PDO::PARAM_INT); // estado del inmueble 1-Disponible 0-desactivado 2-Alquilado 
       


          
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
                  $prmIdinmueble = $row[2]; //AQUI OBTENGO EL ID DEL PAGADOR
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

          $prmTipoPersonaTEMP = $datos["tipo_persona"];



          IF($prmTipoPersonaTEMP == 1){
            $subirArchivos->validarArchivos($archivos,$prmIdinmueble,$prmTipoPersonaTEMP,'1i');
          } else {
            $subirArchivos->validarArchivos($archivos,$prmIdinmueble,$prmTipoPersonaTEMP,'2P');
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

          if( $prmIdinmueble > 0 ){

            $dataRegistro["Items"][] = ["ID_INMUEBLE" => $prmIdinmueble];
          
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



  public function eliminarinquilino($tabla,$datos){

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


 public function seleccionarregistros($tabla,$iten,$valor){

      If($iten == null && $valor == null){


            try {

              $dbConexion = new conexcion();  

                $stmt = $dbConexion->conectar()->prepare("CALL usp_cargainquilinos()");
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
          
          $stmt = $dbConexion->conectar()->prepare("CALL usp_cargainquilinos()" );
        
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