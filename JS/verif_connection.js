const back = document.getElementById('back')
back.addEventListener('click',(e)=>{
    e.preventDefault()
    window.location.href="connexion.html"
})
const form = document.getElementById('form')
form.addEventListener('submit',(e)=>{
    e.preventDefault()
    window.location.href="acceuil_app.html"
})
let adress=localStorage.getItem("email")
const tab = Array.from(adress)
for(let i=3;i<=tab.length-5;i++){
    tab[i]="*";
}
adress=""
for(i=0;i<=tab.length-1;i++){
adress += tab[i]
}
const adresse = document.getElementById('adresse')
adresse.textContent = adress