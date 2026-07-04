
const color = localStorage.getItem('couleur')
        //// pour mes thèmes


const theme_clair = document.getElementById('theme_clair')
const light_mode = document.getElementById('light_mode')
const theme_sombre = document.getElementById('theme_sombre')
const night_mode = document.getElementById('night_mode')
theme_clair.classList.toggle('hidden')
if(document.body.style.backgroundColor==="#1311119f"){
    theme_sombre.classList.add('hidden')
}
theme_clair.classList.toggle='loock'



if(color==="black"){
    night_mode.style.display="none"
}else{
    light_mode.style.display="none"
}



        // pour quitter du theme clair au theme sombre


theme_sombre.addEventListener('click',(e)=>{
    e.preventDefault;
    theme_clair.style.display="block";
    theme_sombre.style.display='none';
    localStorage.setItem("couleur","black")
    document.body.classList.add('sombre')
})

        // pour quitter du thème sombre au theme clair
theme_clair.addEventListener('click',(e)=>{
    theme_sombre.style.display="block";
    theme_clair.style.display="none";
    localStorage.setItem("couleur","white")
    document.body.classList.add('clair')
})
/// pour le thème de la page principale
light_mode.style.position="absolute"
night_mode.style.position="absolute"
night_mode.style.right="10px"
light_mode.style.right="10px"


night_mode.addEventListener('click',()=>{
    light_mode.style.display="block"
    night_mode.style.display="none"
    localStorage.setItem("couleur","black")
    // location.reload(true)
    document.querySelector("html").classList.toggle("sombre")
    night_mode.classList.add(' sombre')
})


light_mode.addEventListener('click',()=>{
    night_mode.style.display="block"
    light_mode.style.display="none"
    localStorage.setItem("couleur","white")
    // location.reload(true)
    document.querySelector("html").classList.toggle("sombre");
    document.body.classList.add('clair')

})