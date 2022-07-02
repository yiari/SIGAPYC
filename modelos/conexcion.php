<?php


class conexcion{

 static public function conectar(){

     #PDO ("nombre del servidor; nombre de la base datos" , "usuario", "contraseña")

     $limk = new PDO("mysql:host=localhost;dbname=yomulite_alquileres","root","");

     $limk -> exec("set names utf8");

     return $limk;


 }



}