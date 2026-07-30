
const color = localStorage.getItem('color')
const sun = document.getElementById('sun')
const moon = document.getElementById('moon')
if(color==="white"){
    sun.style.display="none"
    moon.style.display="block"
}else{
    moon.style.display = "none"
    sun.style.display = "bock"
}

// auvegarde de mes svg
const svg_moon = document.getElementById('svg_moon')
const svg_sun = document.getElementById('svg_sun')

sun.addEventListener('click',()=>{
    moon.style.display="block"
    sun.style.display="none"
    localStorage.setItem('color',"white")
})
moon.addEventListener('click',()=>{
    moon.style.display="none"
    sun.style.display="block"
    localStorage.setItem("color","black")
})
const mode=document.querySelectorAll('.sun_moon')
mode.forEach(mode => {
    mode.addEventListener('click',()=> 
    document.body.classList.toggle('color')
    )
    
});

const mon_body = document.body
const menue_burger = document.getElementById('menue_burger')
const burger_1 = document.getElementById('burger_1')
const burger_2 = document.getElementById('burger_2')
const burger_3 = document.getElementById('burger_3')
const header_box_2 = document.getElementById('header_box_2')

const hidden_navbar = menue_burger.addEventListener('click',(e)=>{
                        e.stopPropagation()
                        burger_1.classList.toggle('first_animation')
                        burger_2.classList.toggle('second_animation')
                        burger_3.classList.toggle('tird_animation')
                        header_box_2.classList.toggle('afficher')
       
    })
const new_ = document.getElementById('new_')

 mon_body.addEventListener('click',(e)=>{
            e.stopPropagation()
            if((header_box_2.classList.contains('afficher')) && (e.target !== menue_burger)&&(e.target !== header_box_2)){
                header_box_2.classList.remove('afficher')
                burger_1.classList.remove('first_animation')
                burger_2.classList.remove('second_animation')
                burger_3.classList.remove('tird_animation')
                e.stopPropagation()
            }
        })
if(hidden_navbar === NaN){

    document.body.addEventListener('click',()=>
    header_box_2.style.display="none"
)
}