const tbody = document.getElementById('tbody')
function create_classe(){
    const tr=`<tr>
                <td><input type="text" name="nom[]" class="nom"></td>
                <td><input type="text" name="matricule[]" class="matricule"></td>
                <td><input type="date" name="date[]" class="date"></td>
                <td><input type="text" name="naissance[]" class="naissance"></td>
                <td><select name="sex[]" class="sex"><option value="MAXCULIN">Masculin</option><option value="FEMININ">Feminin</option></select></td>
                <td><select name="situalion[]" class="situation"><option value="Ancien">ancien</option><option value="Nouveau">Nouveau</option></select></td>
                <td><select name="redoublan[]" class="redoublan"><option value="Non">Non</option><option value="Oui">Oui</option></select></td>
            </tr>`;
            tbody.insertAdjacentHTML('beforeend',tr)
}