        // de déclare mes variables a utiliser
        const sub_2=document.getElementById('sub_2')

// je déclare mes div qui contient le quiz d'inscription
    let content_1=document.getElementById('contenue_1')
    let content_2=document.getElementById('content_2')
    
    
    /// je hidden tous mes contenues qui ne doivent pas être visible
    content_2.classList.add('none')
    // variables pour quitter de la page de connexion a la page d'école
    let connexion_form = document.getElementById("connexion_form");
    let submit=document.getElementById('sub')
    let rotate=document.getElementById('rotate')

    // instruction pout allez a la page après inscription
connexion_form.addEventListener('submit',(e)=>{
    e.preventDefault
    submit.classList.toggle(`sub_color`)
    rotate.classList.toggle('rotation')
    setTimeout(() => {
        window.location.href="filière.html"
    }, 1000);
})


            // clique sur crée un compte


    const no_account=document.getElementById('a');
    
no_account.addEventListener('click',(e)=>{
    e.preventDefault
    submit.classList.toggle(`sub_color`)
    rotate.classList.toggle('rotation')
    setTimeout(() => {
    submit.classList.add('not_sub_color')
    rotate.style.display='none'
        content_1.classList.add('none')
        content_2.classList.add('flex')
    }, 300);
})

back_1.addEventListener('click',(e)=>{
    content_2.classList.add('back_none')
    content_1.classList.add('flex')
    location.reload(false)
})