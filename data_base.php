<?php
        /// pour se connecter a une base de donées

        // le nom de l'hôte 
$host = 'localhost';
        //la base de donnée a l'aquelle on sa se connecter
$dbname = 'GestNote';
        //le nim utilisateur
$username = 'niatize';
        //son mot de passe
$password = 'niatizekempajoyce2008';

try {   //instruction d'envoie de la connexion a la base de donnée
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        //pour la gestion des erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>