const écriture = document.getElementById('écriture');
const text = "Cliquer sur les réseaux sociaux si dessous pour nous contacter.";
const tab = [...text]
let i = 0;
function ecrire(){
    if(i >= tab.length){
        écriture.innerHTML = '';
        i = 0;
        setTimeout(ecrire,1000)
        return
    }
    if(i <= tab.length-1){
        let texte = tab[i];
        if(texte === ' '){
            écriture.textContent += ' '
        }else{
            écriture.textContent += texte 
        }
        setTimeout(ecrire,150)
        i++;
    }
}
ecrire()