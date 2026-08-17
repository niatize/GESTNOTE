const div_1 = document.getElementById('div_1');
const div_2 = document.getElementById('div_2')
const div_3 = document.getElementById('div_3')
const form_1 = document.getElementById('suivant_1')
const form_2 = document.getElementById('suivant_2')
const retour_1 = document.getElementById('return_1')
const retour_2=  document.getElementById('return_2')


        // données du formulaire d'inscription

const nom_utilisateur = document.getElementById('nom_utilisateur')
const mot_de_passe = document.getElementById('mot_de_passe')
const password_verif = document.getElementById('password_verif')
const email_utilisateur = document.getElementById('email_utilisateur')
const numéro_de_telephone = document.getElementById('numéro_de_telephone')
const statut = document.getElementById('statut')
let nom = null
let password = null
let password_ver = null
let email = null
let numéro = null
let statu = null

form_1.addEventListener('click',(e)=>{
    e.preventDefault()
    nom = nom_utilisateur.value.trim() !== "";
    password = mot_de_passe.value.trim() !==""
    password_ver =password_verif.value.trim() !==""
    if(nom && password && password_ver){
        if(mot_de_passe.value === password_verif.value){
            div_1.style.display="none"
            div_2.style.display="flex"
            div_3.style.display="none"
        }else{
            alert("les deux mots de passes doivent être identiques")
        }
 }else{
    alert('éviter de mettre des espaces vides dans les champs')
 }
})
form_2.addEventListener('click',(e)=>{
    e.preventDefault()
    const nom_de_l_utilisateur = document.getElementById('nom_de_l_utilisateur')
    email = email_utilisateur.value.trim() !==""
    numéro = numéro_de_telephone.value.trim() !==""
    statu = statut.value.trim() !==""
        if(email && numéro && statu){
        const test = email_utilisateur.checkValidity()
        if(test === true){
    nom_de_l_utilisateur.textContent = `${nom_utilisateur.value}`
        div_1.style.display="none"
        div_2.style.display="none"
        div_3.style.display="flex"
        }else{
            alert("adresse invalide")
        }
    }else{
        alert("l'adresse mail doit être valid et tous les chams doivent être remplis sans avoir d'espaces vides")
    }
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
    logo_profile_input.value=""
})
const image_de_profile = document.getElementById('image_de_profile')
const profile_input = document.getElementById('profile_input')
const logo_profile = document.getElementById('logo_profile')
const logo_profile_input = document.getElementById('logo_profile_input')
function logo_enter(src){
    if(src){
        const url = URL.createObjectURL(src)
            logo_profile.src = url;
            profile_input.style.display="none"
            image_de_profile.style.display=""
    }
}
logo_profile_input.addEventListener('change',(e)=>{
    const logo = e.target.files[0]
    logo_enter(logo)
})

        // pour la gestio de la série et de la classe

    const select_div = document.getElementById('select_div')
    const accept = document.getElementById('accept')
    const serach_form = document.getElementById('serach_form')
    const classe = document.getElementById('classe')
    

    classe.addEventListener('click',(e)=>{
        classe.style.display="none"
        select_div.style.display="block"
    })
    accept.addEventListener('click',()=>{
        classe.style.display="block"
        select_div.style.display="none"
            const table=[]
    let generale_check = document.querySelectorAll('.generale_check')
    generale_check.forEach(checkbox => {
        if(checkbox.checked){
            table.push(checkbox.value)
        }
    });
            classe.value = table.join(",")
    })





    // Pour la recherche de mes classes

    const datalist = document.getElementById('sections_options')
    const input = document.getElementById('seach_button')
    const seach_submit = document.getElementById('seach_submit')
    let options = datalist.options
    seach_submit.addEventListener('click',(e)=>{
        e.preventDefault()
    let url = null
        for( let i = 0; i < options.length; i++){
            if(input.value === options[i].text || options[i].value === input.value){
                url = options[i].value
                break
            }
        }
        if(url !== null){
            window.location.href=`#${url}`
        }
    })


    const select_div_matiere = document.getElementById('select_div_matiere')
    const accept_matiere = document.getElementById('accept_matiere')
    const matiere = document.getElementById('matiere')
    

    matiere.addEventListener('click',(e)=>{
        matiere.style.display="none"
        select_div_matiere.style.display="block"
    })
    accept_matiere.addEventListener('click',()=>{
        matiere.style.display="block"
        select_div_matiere.style.display="none"
            const tables=[]
    let generale_checks = document.querySelectorAll('.matiere_check')
    generale_checks.forEach(checkbox => {
        if(checkbox.checked){
            tables.push(checkbox.value)
        }
    });
            matiere.value= tables.join(",")
    })


            // pour la selection des matières
    
    const datalist_matieres_options = document.getElementById('matieres_options')
    const input_matiere = document.getElementById('matiere')
    const search_button_matiere = document.getElementById('search_button_matiere')
    let option = datalist_matieres_options.options
    let search_submit_matiere = document.getElementById('search_submit_matiere')
        search_submit_matiere.addEventListener('click',(e)=>{
        e.preventDefault()
    let urls = null
        for( let i = 0; i < option.length; i++){
            if(input_matiere.value === option[i].text || option[i].value === input_matiere.value){
                urls = option[i].value
                break
            }
        }
        if(urls !== null){
            window.location.href=`#${urls}`
        }
    })