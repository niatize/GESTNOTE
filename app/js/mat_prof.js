let count = 2;
const tbody = document.getElementById('tbody')
        // creation de nouveille lignes de classe et de matière

    function create_classe(){
        tr= ` <tr>
                               <td> <label for="classe_${count}">Classe:</label><input type="search" name="classe_1" id="classe_${count}" required></td>
                               <td> <label for="matière_${count}">Matières:</label><input type="search" name="matiere_1" id="matière_${count}" required></td>
                            </tr>`
        tbody.insertAdjacentHTML('beforeend',tr)
        count++
    }