let count = 2;
const tbody = document.getElementById('tbody');
const select_div_matiere = document.getElementById('select_div_matiere');
let chec = null
// Fonction de création de nouvelles lignes (sans générer d'ID doublons)
function create_classe() {
    const tr = `<tr>
                   <td><label for="classe_${count}" style=" color:black;">Classe:</label> <input type="search" name="classe[]" list="classes_list" placeholder="Entrer la classe" required id="classe_${count}"></td>
                   <td><label for="matiere_${count}" style=" color:black;">Matières:</label> <input type="search" name="matiere[]" class="matiere" placeholder="Entrer les matières" required id="matiere_${count}"></td>
                </tr>`;
    tbody.insertAdjacentHTML('beforeend', tr);
    count++;
}


// Délégation d'événement sur le tbody
tbody.addEventListener('click', (e) => {
    // Vérifie si l'élément cliqué possède le nom "matiere" ou la classe "matiere"
    if (e.target && e.target.matches('input[name="matiere[]"]')) {
        // Affiche la div de sélection des matières
            select_div_matiere.classList.toggle('block');
            chec = e.target

    }
});
            // script qui gère l'insertion des matières
        const search_button_matiere = document.getElementById('search_button_matiere')
        const search_submit_matiere = document.getElementById('search_submit_matiere')
        const accept_matiere = document.getElementById('accept_matiere')
        const datalist = document.getElementById('matieres_options')
        options = datalist.options
            // gestion de la datalist
        search_submit_matiere.addEventListener('click',(e)=>{
            e.preventDefault()
            for(let i=0;i<options.length;i++){
                if(search_button_matiere.value === options[i].text || search_button_matiere.value === options[i].value){
                    let url = null
                    url = `#${search_button_matiere.value}`
                    window.location.href= url 
                }
            }
        })  
         const matiere = document.querySelectorAll('.matiere')
            // script qui vas mettre les données dans les inputs de la matière
        accept_matiere.addEventListener('click',()=>{
        const matiere_check = document.querySelectorAll('.matiere_check:checked')
                let table = []  
                matiere_check.forEach(matiere_check => {
                    if(matiere_check.checked){
                        table.push(matiere_check.value)
                        matiere_check.checked = false
                    }
                        chec.value = table.join(', ')
                 });
                select_div_matiere.classList.remove('block')
        })

                 //gestion de l'envoie de la finalisation de l'inscription du professeur
        
        const enregistrer = document.getElementById('enregistrer')
        enregistrer.addEventListener('click',(e)=>{
            const inputs = document.querySelectorAll('input[id^="classe_"]')
            const tab =[]
            for(let input of inputs){
                let value = input.value.trim()
                if(value !== ""){
                    if(tab.includes(value)){
                        e.preventDefault()
                        alert(`la classe ${value} ne doit pas être double`)
                        return
                    }
                tab.push(value)
                
                }
            }
        })