const couleur=localStorage.getItem("couleur")
if(couleur==="white"){
    document.body.classList.add('clair')
}else if(couleur==="black"){
     document.body.classList.add('sombre')
}
