const back = document.getElementById('back')
back.addEventListener('click',(e)=>{
    e.preventDefault()
    window.location.href="connexion.php"
})
const form = document.getElementById('form')
form.addEventListener('submit',(e)=>{
    e.preventDefault()
    form.action = "app/acceuil_app.php"
    form.method="post"
    form.submit()
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