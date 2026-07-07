const couleur=localStorage.getItem("couleur")
if(couleur==="black"){
    document.body.classList.add('clair')
}else if(couleur==="white"){
     document.body.classList.add('sombre')
}
