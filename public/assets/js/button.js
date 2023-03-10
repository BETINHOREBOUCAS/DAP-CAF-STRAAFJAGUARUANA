var buttonLogof = document.getElementById('logof');
var buttonGerenciar = document.getElementById('gerenciar');

buttonLogof.addEventListener('click', ()=> {
    window.location.href = buttonLogof.getAttribute('url');
});

buttonGerenciar.addEventListener('click', ()=> {
    window.location.href = buttonGerenciar.getAttribute('url');
})