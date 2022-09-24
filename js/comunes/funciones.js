function getParameterByName( name ) //courtesy Artem
{
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
  {
    if ((results[1].indexOf('?'))>0)
        return decodeURIComponent(results[1].substring(0,results[1].indexOf('?')).replace(/\+/g, " "));
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
  }
  
}

/* 
|--------------------------------------------------
| ESTO ES PARA HACER PAUSA EN FUNCIONES ASINCRONAS 
|--------------------------------------------------
*/
function delay(n){
  return new Promise(function(resolve){
      setTimeout(resolve,n*1000);
  });
}

/* 
|--------------------------------------------------
| ESTO ES PARA HACER PAUSA EN FUNCIONES SINCRONAS 
|--------------------------------------------------
*/
function syncDelay(milliseconds){
  var start = new Date().getTime();
  var end=0;
  while( (end-start) < milliseconds){
      end = new Date().getTime();
  }
 }


 /*
 |----------------------------------------------------
 | ESTO ES PARA COLOCAR LA ETIQUETA DEL TIPO PERSONA
 |----------------------------------------------------
 */
 function tipoPersona(valor){

  let resultado = "";

  if(valor == "1"){
    resultado = "Natural";
  } else if (valor == "2"){
    resultado = "Juridico";
  }

  return resultado;

 }

 function statusAvisoCobro(valor){

  let resultado = "";

  if(valor == "1"){
    resultado = "Enviado";
  } else if (valor == "2"){
    resultado = "Pendiente";
  }

  return resultado;

 }


 function unidades(valor){

  let resultado = "";

  if(valor == null){
    resultado = "SIN UNIDAD";
  } else if (valor == "0"){
    resultado = "SIN UNIDAD";
  }

  return resultado;

 }

 function documento(valor){

  let resultado = "";

  if(valor == "regmen_docu"){
    resultado = "Registro mercantil";
  } 

  if(valor == "cedu_docu"){
    resultado = "Cédula";
  } 

  if(valor == "ced_docu"){
    resultado = "Cédula";
  } 
  

  if(valor == "rif_docu"){
    resultado = "Rif";
  }

  if(valor == "autopro_docu"){
    resultado = "Autorización del Propietario";
  }

  if(valor == "refper_docu"){
    resultado = "Referencias Personales";
  }

  if(valor == "refper_docu1"){
    resultado = "Referencias Personales";
  }

  if(valor == "reffam_docu"){
    resultado = "Referencias Familiares";
  }

  if(valor == "reffam_docu1"){
    resultado = "Referencias Familiares";
  }

  if(valor == "ref_docu1"){
    resultado = "Referencias Personales";
  }

  if(valor == "ponot_docu"){
    resultado = "Poder notariado";
  }

  if(valor == "regnot_docu"){
    resultado = "Registros Notariado";
  }

  if(valor == "fica_docu"){
    resultado = "Ficha Catastral";
  }

  if(valor == "propi_docu"){
    resultado = "Documento de Propiedad";
  }

  if(valor == "derfren_docu"){
    resultado = "Planilla Derecho de Frente";
  }

  if(valor == "serv_docu"){
    resultado = "Servicios";
  }

  if(valor == "serv_docu"){
    resultado = "Servicios";
  }

  if(valor == "refban_docu"){
    resultado = "Referencias Bancarias";
  }

  if(valor == "refcom_docu"){
    resultado = "Referencias Comerciales";
  }

  if(valor == "refarre_docu"){
    resultado = "Referencia del Arrendandor Actual";
  }

  if(valor == "conarre_docu"){
    resultado = "Contrato de Arrendamiento";
  }

  if(valor == "actcons_docu"){
    resultado = "Acta Constitutiva";
  }

  if(valor == "actultasam_docu"){
    resultado = "Acta de última Asamblea";
  }


  return resultado;

 }
 






 /*
 |---------------------------------------------------------
 | ESTO ES PARA COLOCAR LA ETIQUETA EL SATUS DEL INMUEBLE
 |--------------------------------------------------------
 */
 function statusinmuebles(valor){

  let resultado = "";

  if(valor == "1"){
    resultado = "Disponible";
  } else if (valor == "2"){
    resultado = "Alquilados";
  } else if (valor == 0){ 
    resulatdo = "Desactivado"
  }
  return resultado;

 }


 function fechaNormal(valor){
//20220823

  var resultado = "";
  var dd = valor.toString().substr(6,2)
  var mm = valor.toString().substr(4,2)
  var yyyy = valor.toString().substr(0,4)
  
  resultado = dd + '/' + mm + '/' + yyyy;

  return resultado;


  
 }

 /*
|--------------------------------------------------------------------------
| CLASE DE FUNCIONES GENERALES
|--------------------------------------------------------------------------
| Date: Sabado 25 de Julio 2020
| Dev: Jean Peraza
|--------------------------------------------------------------------------
*/

 /*
 |-----------------------------------------------------
 | ASI SE USA
 |-----------------------------------------------------

  fecha('20200101','YYYYMMDD','DDMMYYYY'); -> RESULTADO = 01012020
  fecha('20200101','YYYYMMDD','DD/MM/YYYY'); -> RESULTADO = 01/01/2020
  fecha('2020/01/01','YYYY/MM/DD','DD/MM/YYYY'); -> RESULTADO = 01/01/2020

 */


 function fecha($fecha, $format_in = 'YYYYMMDD', $format_out = 'DDMMYYYY')
 {

     /*
     |---------------------------------------------------
     | FORMATOS ACEPTADOS
     |---------------------------------------------------
     | 'YYYYMMDD' = AÑO - MES - DIA
     | 'MMDDYYYY' = MES - DIA - AÑO
     | 'DDMMYYYY' = DIA - MES - AÑO
     |---------------------------------------------------
     |  01234567
     | 'YYYYMMDD' = AÑO - MES - DIA
     |---------------------------------------------------

         $dia = substr($fecha, 6, 2);
         $mes = substr($fecha, 4, 2);
         $ano = substr($fecha, 0, 4);

     |----------------------------------------------------
     |  01234567
     | 'MMDDYYYY' = MES - DIA - AÑO
     |----------------------------------------------------

         $mes = substr($fecha, 0, 2);
         $dia = substr($fecha, 2, 2);
         $ano = substr($fecha, 4, 4);

     |----------------------------------------------------
     |  01234567
     | 'DDMMYYYY' = DIA - MES - AÑO
     |----------------------------------------------------

         $dia = substr($fecha, 0, 2);
         $mes = substr($fecha, 2, 2);
         $ano = substr($fecha, 4, 4);

     */

     /*
     |--------------------------------------------------
     | AQUI ELIMINO CARACTERES NO DESEADOS EN LA FECHA
     |--------------------------------------------------
     */

     if ($fecha.indexOf('/') > 0) {
         $fecha = $fecha.replace('/', '');
     }

     if ($fecha.indexOf('-') > 0) {
         $fecha = $fecha.replace('-', '');
     }

     /*
     |--------------------------------------------------------
     | AQUI DESCOMPONGO LA FECHA SEGUN EL FORMATO DE ENTRADA
     |--------------------------------------------------------
     */
     if ($format_in == 'YYYYMMDD' || $format_in == 'YYYY/MM/DD' || $format_in == 'YYYY-MM-DD') {

         $dia = $fecha.toString().substr(6,2);
         $mes = $fecha.toString().substr(4,2);
         $ano = $fecha.toString().substr(0,4);

     } else if ($format_in == 'MMDDYYYY' || $format_in == 'MM/DD/YYYY' || $format_in == 'MM-DD-YYYY') {

         $dia = $fecha.toString().substr(2,2);
         $mes = $fecha.toString().substr(0,2);
         $ano = $fecha.toString().substr(4,4);

     } else if ($format_in == 'DDMMYYYY' || $format_in == 'DD/MM/YYYY' || $format_in == 'DD-MM-YYYY') {

         $dia = $fecha.toString().substr(0,2);
         $mes = $fecha.toString().substr(2,2);
         $ano = $fecha.toString().substr(4,4);
     }

     /*
     |--------------------------------------------------------
     | AQUI ARMO LA FECHA SEGUN EL FORMATO DE SALIDA
     |--------------------------------------------------------
     */
     if ($format_out == 'YYYYMMDD') {

         $fecha = $ano + $mes + $dia;

     } else if ($format_out == 'MMDDYYYY') {

         $fecha = $mes + $dia + $ano;

     } else if ($format_out == 'DDMMYYYY') {

         $fecha = $dia + $mes + $ano;

     } else if ($format_out == 'YYYY/MM/DD') {

         $fecha = $ano + '/' + $mes + '/' +  $dia;

     } else if ($format_out == 'MM/DD/YYYY') {

         $fecha = $mes + '/' +  $dia + '/' + $ano;

     } else if ($format_out == 'DD/MM/YYYY') {

         $fecha = $dia + '/' + $mes + '/' + $ano;
         
     }

     /*
     |--------------------------------------------------------
     | AQUI RETORNO EL RESULTADO
     |--------------------------------------------------------
     */
     return $fecha;
 }
