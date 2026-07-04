        /// fonction qui déclanche le menu burger

const burger = document.getElementById("menu_burger");
burger.addEventListener('click',(e)=>{
    e.preventDefault();
    const first = document.getElementById('first');
    const second = document.getElementById('second');
    const tird = document.getElementById('tird');

        //// début de la création du boutton de ferméture du menu burger
    first.classList.toggle('first_animation');
    second.classList.toggle('second_animation');
    tird.classList.toggle('tird_animation');
        // fin de la ferméture

        // Pour faire apparêtre la nav_links
    let nav_links = document.getElementById('nav_links');
    nav_links.classList.toggle('loock')
})


const démo = document.getElementById("démo")
const connexion = document.getElementById("connexion")


//l  Lien vers la page de démonstration
démo.addEventListener('click',()=>{
    window.location.href='démo.html';
})

//  Lien vers la connexion


connexion.addEventListener('click',()=>{
    window.location.href='connexion.html'
})