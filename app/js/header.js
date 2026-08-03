        //  Gestion de la couleur de toute les pages
const couleur = localStorage.getItem("color")
const moon = document.getElementById('moon')
const sun = document.getElementById('sun')
if(couleur==="white"){
    sun.style.display="none"
    moon.style.display="block"
}else{
    sun.style.display="block"
    moon.style.display="none"
}

sun.addEventListener('click',(e)=>{
    sun.style.display="none"
    moon.style.display="block"
    localStorage.setItem('color',"white")
})
moon.addEventListener('click',(e)=>{
    sun.style.display="block"
    moon.style.display="none"
    localStorage.setItem('color',"black")
})
const theme = document.querySelectorAll('.thème')
theme.forEach(theme => {
    theme.addEventListener('click',()=>
        document.body.classList.toggle("black")
    )
});


        // pour afficher le profile et le thème de l'utilisateur

const user_profile = document.getElementById('user_profile')
const content_1 = document.getElementById('content_1')
const content_2 = document.getElementById('content_2')

user_profile.addEventListener('click',(e)=>{
    content_1.style.display="none"
    content_2.style.display="block"
    if(e.target && e.target !== auther){
        auther.classList.remove('flex')
        burger_1.classList.remove('burger_1')
        burger_2.classList.remove('burger_2')
        burger_3.classList.remove('burger_3')
    }
})
user_profile.addEventListener('click',()=>{

})
// boutton de retour pour sortir de la page principale
const back = document.getElementById('back')
back.addEventListener('click',()=>{
    content_1.style.display="block"
    content_2.style.display="none"
})


        // boutton de fermeture du menue burger
const burger_1 = document.getElementById('burger_1')
const burger_2 = document.getElementById('burger_2')
const burger_3 = document.getElementById('burger_3')
const nav_bar = document.getElementById('nav_bar')
const menue_burger = document.getElementById('menue_burger')
const auther = document.getElementById('auther')
menue_burger.addEventListener('click',(e)=>{
    burger_1.classList.toggle('burger_1')
    burger_2.classList.toggle('burger_2')
    burger_3.classList.toggle('burger_3')
    setTimeout(() => {
        auther.classList.toggle('flex')
    }, 100);
})
const nav = document.getElementById('nav')
const ul = document.getElementById('ul')
const li = document.getElementById('li')
const body = document.body
body.addEventListener('click',(e)=>{
if(auther.classList.contains('flex') && e.target!==auther && e.target!==nav && e.target!==ul && e.target!==li && e.target!==menue_burger){
        auther.classList.remove('flex')
        burger_1.classList.remove('burger_1')
        burger_2.classList.remove('burger_2')
        burger_3.classList.remove('burger_3')
        e.stopPropagation
}
})