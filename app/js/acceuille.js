const historique = document.getElementById('historique')
const controle = document.getElementById('controle')
const saisis = document.getElementById('saisis')
const calcul = document.getElementById('calcul')
const imprimer = document.getElementById('imprimer')
const resultat = document.getElementById('resultat')
historique.addEventListener('click',(e)=>{
    window.location.href="/app/historique.php"
})
controle.addEventListener('click',(e)=>{
    window.location.href="/app/confection.php"
})
saisis.addEventListener('click',(e)=>{
    window.location.href="/app/saisi.php"
})
calcul.addEventListener('click',(e)=>{
    window.location.href="/app/calcul.php"
})
imprimer.addEventListener('click',(e)=>{
    window.location.href="/app/inprimer.php"
})
resultat.addEventListener('click',(e)=>{
    window.location.href="/app/parent.php"
})