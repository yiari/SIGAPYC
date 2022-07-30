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

/* ESTO ES PARA FUNCIONES ASINCRONAS */
function delay(n){
  return new Promise(function(resolve){
      setTimeout(resolve,n*1000);
  });
}

function syncDelay(milliseconds){
  var start = new Date().getTime();
  var end=0;
  while( (end-start) < milliseconds){
      end = new Date().getTime();
  }
 }