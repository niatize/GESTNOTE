const path = require('path');
const path = require('path');
// On donne le chemin absolu direct sur ton système
require('dotenv').config({ path: '/home/ni-pro/Documents/Mon projet/GESTNOTE/.env' });

const mysql = require('mysql2');const path = require('path');
// On donne le chemin absolu direct sur ton système
require('dotenv').config({ path: '/home/ni-pro/Documents/Mon projet/GESTNOTE/.env' });

const mysql = require('mysql2');const mysql = require('mysql2');

// ÉTAPE DE SÉCURITÉ : On vérifie si Node voit le fichier .env
if (!process.env.DB_USER) {
  console.log("❌ Erreur : Le fichier .env n'est pas détecté par le code.");
} else {
  console.log(`🔍 Tentative de connexion avec l'utilisateur : ${process.env.DB_USER}`);
}

const connection = mysql.createConnection({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASS,
  database: process.env.DB_NAME
});

connection.connect((err) => {
  if (err) {
    console.error('Erreur de connexion sécurisée : ', err.message);
    return;
  }
  console.log('🎉 Connexion sécurisée réussie ! Ton Node et ton MySQL sont liés.');
  connection.end();
});