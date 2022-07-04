<?php


class conexcion{

 static public function conectar_old(){

     #PDO ("nombre del servidor; nombre de la base datos" , "usuario", "contraseña")

     $limk = new PDO("mysql:host=192.168.11.100;dbname=yomulite_alquileres","root","");

     $limk -> exec("set names utf8");

     return $limk;

 }


 public function conectar() {
    $servername = "192.168.11.100";
    $dbname = "yomulite_alquileres";
    $username = "root";
    $password = "";
   
    try {

        $link = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . '', $username, $password);
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $link -> exec("set names utf8");

        return $link;
           
    } catch(PDOException $e) {
        echo 'Error de Base de datos: ' . $e->getMessage();
        die;
    }
}

}