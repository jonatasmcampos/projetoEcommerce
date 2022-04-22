var btnMenu = document.getElementById('btn-menu')
var siedbarNomes = document.getElementById('siedbar-nomes')

btnMenu.addEventListener("click", function(){
    siedbarNomes.classList.toggle('voltar')
})