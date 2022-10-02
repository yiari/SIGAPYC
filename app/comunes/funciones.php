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


}







?>