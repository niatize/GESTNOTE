const div_1 = document.getElementById('div_1');
const div_2 = document.getElementById('div_2')
const div_3 = document.getElementById('div_3')
const form_1 = document.getElementById('form_1')
const form_2 = document.getElementById('form_2')
const form_3 = document.getElementById('form_3')
const retour_1 = document.getElementById('return_1')
const retour_2=  document.getElementById('return_2')




form_1.addEventListener('submit',(e)=>{
    e.preventDefault()
    div_1.style.display="none"
    div_2.style.display="flex"
    div_3.style.display="none"
})
form_2.addEventListener('submit',(e)=>{
    e.preventDefault()
    div_1.style.display="none"
    div_2.style.display="none"
    div_3.style.display="flex"
})
form_3.addEventListener('submit',(e)=>{
    e.preventDefault()
    window.location.href="etablissement.html"
})
retour_1.addEventListener('click',()=>{
    div_1.style.display="flex"
    div_2.style.display="none"
    div_3.style.display="none"
})
retour_2.addEventListener('click',()=>{
    div_1.style.display="none"
    div_2.style.display="flex"
    div_3.style.display="none"
})