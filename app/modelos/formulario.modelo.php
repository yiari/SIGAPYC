<?php

require_once "conexcion.php";

class modeloFormularios{

static public function mblregistros($tabla,$datos){


      #statement: declaracion

      /*prepare() prepara una sentencia SQl para ser ejecutada por el metodo PDOStatement::execute() o signo de interrogacion (?) 
      por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL 
      eliminando la necesidad de entecomilla manualmente los parametros.*/
      
      $stmt = conexcion::conectar()->prepare("INSERT INTO $tabla (nombre,apellido,usuario,password,email) 
                                              VALUES (:nombre,:apellido,:usuario,:password,:email)");

      #bindParam() vincula una variable de php a un parametro de sustitucion con nombre  o de signo de interrogacion correspondiente de la sentencia  SQL que usada para preparar la sentecia

      $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
      $stmt -> bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
      $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
      $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
      $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

    if ($stmt->execute()){

      return "ok";

    }else{

      print_r(conexcion::conectar()->errorInfo());
    }

    //$stmt->close();
  
  }

    static public function mdlselccionarRegistros($tabla,$iten,$valor){

      If($iten == null && $valor == null){

        $stmt = conexcion::conectar()->prepare("SELECT *,DATE_FORMAT( fecha_creacion, '%d/%m/%Y') AS fecha_creacion FROM $tabla");
        $stmt->execute();
        return $stmt -> fetchAll();

      }else{


        $stmt = conexcion::conectar()->prepare("SELECT *,DATE_FORMAT( fecha_creacion, '%d/%m/%Y') AS fecha_creacion FROM $tabla WHERE $iten = :$iten");
        
        $stmt ->bindParam(":".$iten, $valor, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt -> fetch();


      }
  }



  static public function mdlselccionarPropietraios($tabla,$iten,$valor){

    If($iten == null && $valor == null){

      $stmt = conexcion::conectar()->prepare("SELECT * FROM $tabla");
      $stmt->execute();
      return $stmt -> fetchAll();

    }else{


      $stmt = conexcion::conectar()->prepare("SELECT * FROM $tabla WHERE $iten = :$iten");
      
      $stmt ->bindParam(":".$iten, $valor, PDO::PARAM_STR);
      
      $stmt->execute();
      return $stmt -> fetch();


    }
}




}




  