<?php


class conexcion{

 static public function conectar(){

     #PDO ("nombre del servidor; nombre de la base datos" , "usuario", "contraseña")

     $limk = new PDO("mysql:host=192.168.11.100;dbname=yomulite_alquileres","root","");

     $limk -> exec("set names utf8");

     return $limk;


 }



}