function codigoPropietario(nombre,callback){


    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoPropietario"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'P-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }


}



function codigoPropietarioj(nombre,callback){


    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoPropietario"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'P-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }


}



function codigoApoderado(nombre,callback){

    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoApoderado"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'A-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }



    /*
    if(nombre.length >0){

        let text = nombre;

        let result = 'A-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(1, 4)  + '-' +  nombre;

        return result;
    } else {
        return "";
    }
    */

}

function codigoRepresentante(nombre,callback){


    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoRepresentante"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'R-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }


/*

    if(nombre.length >0){

        let text = nombre;

        let result = 'R-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(1, 4)  + '-' +  nombre;

        return result;
    } else {
        return "";
    }

*/
}



function codigoBeneficiario(nombre,callback){


    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoBeneficiario"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'B-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }


/*

    if(nombre.length >0){

        let text = nombre;

        let result = 'R-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(1, 4)  + '-' +  nombre;

        return result;
    } else {
        return "";
    }

*/
}



function codigoBeneficiarioj(nombre,callback){


    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoBeneficiario"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'B-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }


/*

    if(nombre.length >0){

        let text = nombre;

        let result = 'R-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(1, 4)  + '-' +  nombre;

        return result;
    } else {
        return "";
    }

*/
}


function codigoInquilino(nombre,callback){



    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoInquilino"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'IN-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }

    /*
    if(nombre.length >0){

        let text = nombre;

        let result = 'IN-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(1, 4)  + '-' +  nombre;

        return result;
    } else {
        return "";
    }
    */

}

function codigoPagador(nombre,callback){


    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoPagador"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'PA-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }


    

    /*
    if(nombre.length >0){

        let text = nombre;

        let result = 'PA-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(1, 4)  + '-' +  nombre;

        return result;
    } else {
        return "";
    }
*/
}


function codigoCobrador(nombre,callback){


    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoCobrador"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'CO-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }


    

    /*
    if(nombre.length >0){

        let text = nombre;

        let result = 'PA-' +  valorLetra(text.charAt(0)) + '-' +  completarconcero(1, 4)  + '-' +  nombre;

        return result;
    } else {
        return "";
    }
*/

}

function codigoInmueble(tipo,letra,nombre,callback){


    let text="";
    let result="";

    if(tipo.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoInmueble"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = tipo;
                    result =  tipo + '-' +  completarconcero(json.valor, 4) + '-' + letra + '-' + nombre;

                     callback(result);

                }

            });

    }


}

function codigoUnidad(tipo,letra,nombre,callback){


    let text="";
    let result="";

    if(tipo.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoUnidad"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = tipo;
                    result =  tipo + '-' +  completarconcero(json.valor, 4) + '-' + letra + '-' + nombre;

                     callback(result);

                }

            });

    }


}


function codigoContrato(nombre,callback){


    let text="";
    let result="";

    if(nombre.length >0){

            $.ajax({
                url: "app/vistas/comunes/generarcodigos.php",
                method: 'POST',
                data: {opcion:"codigoContrato"},
                success: function (data,status,xhr) {
                    var json = data;
                    
                    /*
                    |-----------------------------------------------------------
                    | AQUI VERIFICO SI LA RESPUESTA ES JSON, SI NO ES JSON
                    | EL RESULTADO SE CONVIERTE A JSON
                    |-----------------------------------------------------------
                    */
            
                    var respuestaHeader = xhr.getResponseHeader("Content-Type");
                    var verificarHeader = respuestaHeader.search('text/html')
            
                    if(verificarHeader >= 0){
                        json = JSON.parse(json);
                    } 
            
                    /*---------------------------------------------------------*/
            
                    text = nombre;
                    result = 'COT-' + completarconcero(json.valor, 4)  + '-' +  nombre;

                     callback(result);

                }

            });

    }


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
/*
$(document).ready(function() {


    var nombrePropietario = "Jean Peraza";

    document.getElementById("resultado").innerHTML =  codigoPropietario(nombrePropietario);
   



});
*/