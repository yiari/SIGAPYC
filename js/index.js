$(document).ready(function(){
    $.ajax({
      type: 'POST',
      url: './php/carg_estados.php',
    })
    .done(function(lis_estados){
      $('#lista_estados').html(lis_estados)
    })
    .fail(function(){
      alert('Hubo un errror al cargar la lista de los estados')
    })
  
    $('#lista_estados').on('change', function(){
      var id = $('#lista_estados').val()
      $.ajax({
        type: 'POST',
        url: 'carg_municipios.php',
        data: {'id': id}
      })
      .done(function(lista_estados){
        $('municipio').html(lista_estados)
      })
      .fail(function(){
        alert('Hubo un errror al cargar los municipios')
      })
    })
  
    $('#enviar').on('click', function(){
      var resultado = 'estado: ' + $('#estado option:selected').text() +
      ' Video elegido: ' + $('#videos option:selected').text()
  
      $('#resultado1').html(resultado)
    })
  
  })