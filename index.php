<?php

/* en la pagina index.php:en donde mostraremos  la salida de la vista al usuario 
y tambian a traves de él enviaremos las distintas acciones que el usuario envie al controlador */

/* require() establece que el codigo del archivo invocado es rerquerido, es decir obligatorio para el funcionammiento del programa.
por ello, si el archivo especificado en la finción require() no se encuentra saltara un error "PHP fatal errror" y el programa PHp de detendra. */


/*require_once() función es la misma forma que su respectivo, salvo que ,al utilzar la version _once, se impide la carga de un mismo archivo más de una vez */


require_once "controladores/plantilla.controlador.php";
require_once "controladores/formularios.comtrolado.php";
require_once "modelos/formulario.modelo.php";

$plantilla = new controladorPlantilla();
$plantilla -> ctrtraeplantilla();