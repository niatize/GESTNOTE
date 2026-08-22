const show_classe = document.getElementById('show_class')
const hidden_classe = document.getElementById('hidden_class')
function hidden_class(){
    const classe = document.querySelectorAll('.class')
    const matiere = document.getElementById('matiere')
    classe.forEach(element => {
        element.style.width = "5%"
    });
    matiere.style.width = "95%"
    hidden_classe.style.display = "none"
    show_classe.style.display = "block"
}
function show_class() {
    const classe = document.querySelectorAll('.class')
    const matiere = document.getElementById('matiere')
    classe.forEach(element => {
        element.style.width = "20%"
    });
    matiere.style.width = "80%"
    hidden_classe.style.display = "block"
    show_classe.style.display = "none"
}