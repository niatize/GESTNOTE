const form = document.querySelectorAll('form');
form.forEach(form => {
    form.addEventListener("submit",(e)=>{
        e.preventDefault()
    window.location.href = "connexion.php"  
    })  
});
var compteur = 2
const main = document.getElementById('main');
const etabbutton = document.getElementById('etabbutton')
etabbutton.addEventListener('click',(e)=>{
    e.preventDefault()
    if(e.target){
        main.innerHTML += `<div class="etablissement" id="etablissement_${compteur}">
            

            <div class="etablissement_logo"><img src="image/user-profile-circle-solid-svgrepo-com(3).png" alt=""></div>
            <div class="etablissement_desct"> </div>
            <div class="etablissement_logo">
             <form action="#" method="post" class="form">
             <button type="submit" name="etablissement_${compteur}" value="etablissement_${compteur}" class="ecole">
             Se connecter</button>
             </form></div>
        </div><br>`
        
    }
    compteur = compteur+1
})
