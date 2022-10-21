<?php 

class funciones
{


    public function __construct()
    {
        /*
        |-------------------------------------------------
        | ESTO ES UN CONSTRUCTOR CUANDO SE CREA LA CLASE 
        |-------------------------------------------------
        */ 
    }


    public function montoEscrito($valor,$desc_moneda = "bolivares", $sep = "y", $desc_decimal = "centimos") {
        $arr = explode(".", $valor);
        $entero = $arr[0];
        if (isset($arr[1])) {
            $decimos = strlen($arr[1]) == 1 ? $arr[1] . '0' : $arr[1];
        }
   
        $fmt = new \NumberFormatter('es', \NumberFormatter::SPELLOUT);
        if (is_array($arr)) {
            $num_word = ($arr[0]>=1000000) ? "{$fmt->format($entero)} de $desc_moneda" : "{$fmt->format($entero)} $desc_moneda";
            if (isset($decimos) && $decimos > 0) {
                $num_word .= " $sep  {$fmt->format($decimos)} $desc_decimal";
            }
        }
        return $num_word;
   }


   public function documento($valor){

     $resultado = $valor;
  
    if($valor == "regmen_docu"){
        $resultado = "Registro mercantil";
    } 
  
    if($valor == "cedu_docu"){
      $resultado = "Cédula";
    } 
  
    if($valor == "ced_docu"){
      $resultado = "Cédula";
    } 
    
  
    if($valor == "rif_docu"){
      $resultado = "Rif";
    }
  
    if($valor == "autopro_docu"){
      $resultado = "Autorización del Propietario";
    }
  
    if($valor == "refper_docu"){
      $resultado = "Referencias Personales";
    }
  
    if($valor == "refper_docu1"){
      $resultado = "Referencias Personales";
    }
  
    if($valor == "reffam_docu"){
      $resultado = "Referencias Familiares";
    }
  
    if($valor == "reffam_docu1"){
      $resultado = "Referencias Familiares";
    }
  
    if($valor == "ref_docu1"){
      $resultado = "Referencias Personales";
    }
  
    if($valor == "ponot_docu"){
      $resultado = "Poder notariado";
    }
  
    if($valor == "regnot_docu"){
      $resultado = "Registros Notariado";
    }
  
    if($valor == "fica_docu"){
      $resultado = "Ficha Catastral";
    }
  
    if($valor == "propi_docu"){
      $resultado = "Documento de Propiedad";
    }
  
    if($valor == "derfren_docu"){
      $resultado = "Planilla Derecho de Frente";
    }
  
    if($valor == "serv_docu"){
      $resultado = "Servicios";
    }
  
    if($valor == "serv_docu"){
      $resultado = "Servicios";
    }
  
    if($valor == "refban_docu"){
      $resultado = "Referencias Bancarias";
    }
  
    if($valor == "refcom_docu"){
      $resultado = "Referencias Comerciales";
    }
  
    if($valor == "refarre_docu"){
      $resultado = "Referencia del Arrendandor Actual";
    }
  
    if($valor == "conarre_docu"){
      $resultado = "Contrato de Arrendamiento";
    }
  
    if($valor == "actcons_docu"){
      $resultado = "Acta Constitutiva";
    }
  
    if($valor == "actultasam_docu"){
      $resultado = "Acta de última Asamblea";
    }
  
  
    return $resultado;
  
   }


}







?>