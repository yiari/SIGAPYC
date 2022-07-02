var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
    overLay = document.getElementById('overLay'),
    popup = document.getElementById('popup'),
    btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function(){
    overLay.classList.add('active');
    popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(){
    overLay.classList.remove('active');
    popup.classList.remove('active');
});