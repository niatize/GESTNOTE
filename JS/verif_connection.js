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