const form = document.getElementById('form');
fetch(suivis.php)
    .then(info_bd=>info_bd.json())
    .then(info_bd_table=>{
        alert(info_bd_table)
    })