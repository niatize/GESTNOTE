
    let connexion_form = document.getElementById("connexion_form");
    let submit=document.getElementById('sub')
    let rotate=document.getElementById('rotate')

    // instruction pout allez a la page après inscription
connexion_form.addEventListener('submit',(e)=>{
    e.preventDefault()
    submit.classList.toggle(`sub_color`)
    rotate.classList.toggle('rotation')
const email = document.getElementById('email').value
localStorage.setItem("email",email)
    setTimeout(() => {
        window.location.href="verification_connexion.html"
    }, 500);
})
let a = document.getElementById('a')
a.addEventListener('click',(e)=>{
    e.preventDefault()
    window.location.href="inscription.html"
})