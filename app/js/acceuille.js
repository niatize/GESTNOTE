const historique = document.getElementById('historique')
const controle = document.getElementById('controle')
const saisis = document.getElementById('saisis')
const calcul = document.getElementById('calcul')
const imprimer = document.getElementById('imprimer')
const resultat = document.getElementById('resultat')
historique.addEventListener('click',(e)=>{
    window.location.href="historique.php"
})
controle.addEventListener('click',(e)=>{
    window.location.href="inscription.php"
})
saisis.addEventListener('click',(e)=>{
    window.location.href="saisi.php"
})
calcul.addEventListener('click',(e)=>{
    window.location.href="suivis.php"
})
imprimer.addEventListener('click',(e)=>{
    window.location.href="inprimer.php"
})
resultat.addEventListener('click',(e)=>{
    window.location.href="parent.php"
})