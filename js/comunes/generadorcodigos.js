function codigoPropietario(nombre){

    let text = nombre;

   // console.log("Nombre enviado:" + text);
   // console.log("1era Letra Nombre:" + text.charAt(0));

    let result = 'P-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(1, 4)  + '-' +  nombre;

    return result;

}


/*
|-------------------------------------------------
| ESTO ES PARA DETERMINAR EL VALOR DE LA LETRA 
| SEGUN SU POSICION EN EL ABECEDARIO
|-------------------------------------------------
*/
function valorLetra(Letra){

    var resultado = "";
    var letras = ['A','B','C','D','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    var contador = 1;

    letras.forEach(

        function(valor){

     //       console.log("Letra Recibida:" + Letra.toUpperCase());
      //      console.log("Letra del Arreglo:" + valor.toString());

            if(Letra.toUpperCase() == valor.toString()){

                var dato = valor.toString();
                resultado = completarconcero(contador,2);

            }

            contador++;
        }
    )

    return resultado;


}




/*
|-------------------------------------------------  
| ESTA FUNCION COMPLETA CON CERO A LA IZQUIERDA
|-------------------------------------------------
|
| - Numero = Es el Numero que recibe la instruccion
| - Longitud = Es la cantidad de caracteres para al resultado
|
| Ejemplo
|
| completarconcero(1,5) = ESto regresara 00001
|
| completarconcero(45,3) = ESto regresara 045
|
| completarconcero('A',3) = ESto regresara 00A
|--------------------------------------------------
*/

function completarconcero(numero, longitud) {
  
   var numberStr = numero.toString();

  return numberStr.padStart(longitud, "0");

}


/*
|--------------------------------------------
| ESTA INSTRUCCION ES SOLO PARA PRUEBAS
|--------------------------------------------
*/
$(document).ready(function() {


    var nombrePropietario = "Jean Peraza";

    document.getElementById("resultado").innerHTML =  codigoPropietario(nombrePropietario);
   



});