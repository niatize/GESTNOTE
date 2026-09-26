<?php    
// Initialisation préventive pour éradiquer les risques de variables indéfinies
$user_name = "";
$profil = "";
$matricule = "";

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.gc_maxlifetime', 3600);
    session_start();

    if (!isset($_SESSION["user_name"]) || !isset($_SESSION["profil"])) {
        header("Location: ../connexion.php");
        exit();
    }
    // Connexion à la base de données
    require_once "../data_base.php";

    if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"])) {
        $user_name = $_SESSION["user_name"];
        $profil = $_SESSION['profil'];
        $tab_name = explode(" ", $user_name);
        $user_name = $tab_name[0];

        // 1. Génération du matricule (placée ici pour être disponible au submit ET à l'affichage)
        $date = date("Y");
        $nombre = 0;
        $sql = $pdo->prepare("SELECT matricule FROM eleve");
        $sql->execute();
        $matricules_list = $sql->fetchAll(PDO::FETCH_NUM);

        if (empty($matricules_list)) {
            $matricule = $date . "-000" . ($nombre + 1);
        } else {
            $matricule = $date . "-000" . (count($matricules_list) + 1);
        }

        // 2. Traitement du formulaire à la soumission
        if (isset($_POST['send']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            if (
                !empty($_POST["nom"]) &&
                !empty($_POST["matricule"]) &&
                !empty($_POST["date"]) &&
                !empty($_POST["naissance"]) &&
                !empty($_POST["sex"]) &&
                !empty($_POST["situalion"]) &&
                !empty($_POST["redoublan"])&&
                !empty($_POST["classe"])
            ) {
                $nom = trim($_POST["nom"]);                
                $date_naissance = $_POST["date"];
                $naissance = trim($_POST["naissance"]);
                $sex = $_POST["sex"];
                $situalion = $_POST["situalion"];
                $redoublan = $_POST["redoublan"]; 
                $classe = $_POST["classe"];
                $matricule_post = $_POST["matricule"];

                // On exécute l'insertion UNIQUEMENT si les données sont valides
                $existe = false;
                $sql = $pdo->prepare("SELECT nom_complet FROM eleve");
                $sql->execute();
                $all_name = $sql->fetchAll(PDO::FETCH_ASSOC);
                for($i=0;$i<count($all_name);$i++){
                    if ($all_name[$i]['nom_complet'] === $nom) {
                        $existe = true;
                        break; // Le nom existe déjà, inutile de continuer la boucle
                    }
                }
                if(!$existe){

                    try {
                                $sql_insert = $pdo->prepare("INSERT INTO eleve(
                                    nom_complet,
                                    date_naissance,
                                    lieux_naissance,
                                    sexe,
                                    situation,
                                    redoublan,
                                    matricule,
                                    nom_classe
                                ) VALUES (
                                    :nom_complet,
                                    :date_naissance,
                                    :lieux_naissance,
                                    :sexe,
                                    :situation,
                                    :redoublan,
                                    :matricule,
                                    :nom_classe
                                )");

                                $sql_insert->execute([
                                    "nom_complet"    => $nom,
                                    "date_naissance" => $date_naissance,
                                    "lieux_naissance"=> $naissance,
                                    "sexe"           => $sex,
                                    "situation"      => $situalion,
                                    "redoublan"      => $redoublan,
                                    "matricule"      => $matricule_post,
                                    "nom_classe"=>$classe      
                                ]);

                                // Redirection ou rechargement pour éviter le double envoi
                                echo '<script> alert("enregistrement de '.$nom.' réussis")</script>';
                               
                    } catch (PDOException $e) {
                        die("ERROR : " . $e->getMessage());
                    }
                }else{
                    echo '<script> alert("'.$nom.' est déjà inscrit\n veuillez passer au suivant")</script>';
                }
            } else {
                echo "<script>alert('Veuillez remplir tous les champs !');</script>";
            }
        }
    }
}   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription d'élève dans la base de données</title>
    <link rel="stylesheet" href="css/all_style.css">
    <link rel="stylesheet" href="css/acceuil.css">
    <link rel="stylesheet" href="css/all_style_responsive.css">
    <link rel="stylesheet" href="css/inscription_eleve.css">
    <script src="js/header.js" defer></script>
    <script src="js/color.js" defer></script>
    <script src="js/inscription_eleves.js" defer></script>
</head>
<body>
    <header>
        <div class="header_parent">
            <div class="headerlogo">
                <span class="logo_div gap">
                    <img src="../image/logo.png" class="logo" alt="">
                </span>
                <div class="logo_name gap">GESTNOTE</div>
            </div>
            <div class="auther" id="auther">

            <div class="nav_bar" id="nav_bar" style="background-color: transparent;">
                <nav id="nav" style="background-color: transparent;">
                    <ul id="ul" class="ul" style="background-color: transparent;">
                        <li id="li" class="li"><a href="acceuil_app.php"style="background-color: transparent;">ACCEUIL</a></li>
                        <li class="li"><a href="historique.php" style="background-color: transparent;">HISTORIQUE</a></li>
                        <li class="li"><a href="inscription.php" id="a" style="background-color: transparent;">INSCRIPTIONS D'ÉLÈVES</a></li>
                        <li class="li"><a href="saisi.php" style="background-color: transparent;">SAISIR LES NOTES</a></li>
                        <li class="li"><a href="suivis.php" style="background-color: transparent;">SUIVIS DES NOTES</a></li>
                        <li class="li"><a href="inprimer.php" style="background-color: transparent;">IMPRIMER</a></li>
                        <li class="li"><a href="parent.php" style="background-color: transparent;">RESULTAT</a></li>
                    </ul>
                </nav>
            </div>
            <div class="user_profile" id="user_profile" style="background-color: transparent;">
                <div class="user_logo" style="background-color: transparent;"><img src="<?php echo htmlspecialchars("../".$profil) ?>" class="logo_profile" alt="" style="background-color: transparent;" na></div>
                <div class="user_name" style="background-color: transparent;"><?php echo $user_name; ?></div>
            </div>
            </div>
            <div class="menue_burger" id="menue_burger">
                <div class="burger" id="burger_1"></div>
                <div class="burger" id="burger_2"></div>
                <div class="burger" id="burger_3"></div>
            </div>

        </div>
    </header>
    <main id="main">
        <?php include_once('div_2.php'); ?>
        <div class="content_1" id="content_1" style="position: relative;">

                    <h1>Inserer les élèves dans la base de données</h1>
                    <form action="" method="post"><br>
                         <table border>
                            <tbody>
                                <tr>
                                    <th>NOM COMPLET</th>
                                    <td><input type="text" name="nom" class="nom" placeholder="Entrez le nom complet"></td>
                                </tr>
                                <tr>
                                    <th>classe</th>
                                    <td><input type="text" name="classe" list="classes_list" id="" placeholder="Sélectionnez ou saisissez la classe">
                                        <datalist id="classes_list">
                                            <option value="Sixième">Sixième</option>
                                            <option value="Cinquième">Cinquième</option>
                                            <option value="Quatrième - Allemand">Quatrième - Allemand</option>
                                            <option value="Quatrième - Espagnol">Quatrième - Espagnol</option>
                                            <option value="Quatrième - Chinois">Quatrième - Chinois</option>
                                            <option value="Quatrième - Arabe">Quatrième - Arabe</option>
                                            <option value="Troisième - Allemand">Troisième - Allemand</option>
                                            <option value="Troisième - Espagnol">Troisième - Espagnol</option>
                                            <option value="Troisième - Chinois">Troisième - Chinois</option>
                                            <option value="Troisième - Arabe">Troisième - Arabe</option>
                                            <option value="Seconde A1">Seconde A1</option>
                                            <option value="Seconde A2">Seconde A2</option>
                                            <option value="Seconde A3">Seconde A3</option>
                                            <option value="Seconde A4 - Allemand">Seconde A4 - Allemand</option>
                                            <option value="Seconde A4 - Espagnol">Seconde A4 - Espagnol</option>
                                            <option value="Seconde A4 - Chinois">Seconde A4 - Chinois</option>
                                            <option value="Seconde A4 - Arabe">Seconde A4 - Arabe</option>
                                            <option value="Seconde A5">Seconde A5</option>
                                            <option value="Seconde C">Seconde C</option>
                                            <option value="Seconde D">Seconde D</option>
                                            <option value="Seconde SH">Seconde SH</option>
                                            <option value="Seconde AC">Seconde AC</option>
                                            <option value="Première A1">Première A1</option>
                                            <option value="Première A2">Première A2</option>
                                            <option value="Première A3">Première A3</option>
                                            <option value="Première A4 - Allemand">Première A4 - Allemand</option>
                                            <option value="Première A4 - Espagnol">Première A4 - Espagnol</option>
                                            <option value="Première A4 - Chinois">Première A4 - Chinois</option>
                                            <option value="Première A4 - Arabe">Première A4 - Arabe</option>
                                            <option value="Première A5">Première A5</option>
                                            <option value="Première ABI">Première ABI</option>
                                            <option value="Première C">Première C</option>
                                            <option value="Première D">Première D</option>
                                            <option value="Première TI">Première TI</option>
                                            <option value="Première SH">Première SH</option>
                                            <option value="Première AC">Première AC</option>
                                            <option value="Terminale A1">Terminale A1</option>
                                            <option value="Terminale A2">Terminale A2</option>
                                            <option value="Terminale A3">Terminale A3</option>
                                            <option value="Terminale A4 - Allemand">Terminale A4 - Allemand</option>
                                            <option value="Terminale A4 - Espagnol">Terminale A4 - Espagnol</option>
                                            <option value="Terminale A4 - Chinois">Terminale A4 - Chinois</option>
                                            <option value="Terminale A4 - Arabe">Terminale A4 - Arabe</option>
                                            <option value="Terminale A5">Terminale A5</option>
                                            <option value="Terminale ABI">Terminale ABI</option>
                                            <option value="Terminale C">Terminale C</option>
                                            <option value="Terminale D">Terminale D</option>
                                            <option value="Terminale TI">Terminale TI</option>
                                            <option value="Terminale SH">Terminale SH</option>
                                            <option value="Terminale AC">Terminale AC</option>
                                            <option value="1ère année MACO">1ère année MACO</option>
                                            <option value="2ème année MACO">2ème année MACO</option>
                                            <option value="3ème année MACO">3ème année MACO</option>
                                            <option value="4ème année MACO">4ème année MACO</option>
                                            <option value="1ère année Électricité">1ère année Électricité</option>
                                            <option value="2ème année Électricité">2ème année Électricité</option>
                                            <option value="3ème année Électricité">3ème année Électricité</option>
                                            <option value="4ème année Électricité">4ème année Électricité</option>
                                            <option value="1ère année Menuiserie">1ère année Menuiserie</option>
                                            <option value="2ème année Menuiserie">2ème année Menuiserie</option>
                                            <option value="3ème année Menuiserie">3ème année Menuiserie</option>
                                            <option value="4ème année Menuiserie">4ème année Menuiserie</option>
                                            <option value="1ère année Froid">1ère année Froid</option>
                                            <option value="2ème année Froid">2ème année Froid</option>
                                            <option value="3ème année Froid">3ème année Froid</option>
                                            <option value="4ème année Froid">4ème année Froid</option>
                                            <option value="1ère année ESF">1ère année ESF</option>
                                            <option value="2ème année ESF">2ème année ESF</option>
                                            <option value="3ème année ESF">3ème année ESF</option>
                                            <option value="4ème année ESF">4ème année ESF</option>
                                            <option value="Seconde F1">Seconde F1</option>
                                            <option value="Seconde F2">Seconde F2</option>
                                            <option value="Seconde F3">Seconde F3</option>
                                            <option value="Seconde F4">Seconde F4</option>
                                            <option value="Seconde F5">Seconde F5</option>
                                            <option value="Seconde F7">Seconde F7</option>
                                            <option value="Seconde G1">Seconde G1</option>
                                            <option value="Seconde G2">Seconde G2</option>
                                            <option value="Seconde G3">Seconde G3</option>
                                            <option value="Seconde ESF">Seconde ESF</option>
                                            <option value="Seconde CH">Seconde CH</option>
                                            <option value="Seconde IB">Seconde IB</option>
                                            <option value="Seconde IH">Seconde IH</option>
                                            <option value="Seconde MA">Seconde MA</option>
                                            <option value="Seconde CM">Seconde CM</option>
                                            <option value="Première F1">Première F1</option>
                                            <option value="Première F2">Première F2</option>
                                            <option value="Première F3">Première F3</option>
                                            <option value="Première F4">Première F4</option>
                                            <option value="Première F5">Première F5</option>
                                            <option value="Première F7">Première F7</option>
                                            <option value="Première G1">Première G1</option>
                                            <option value="Première G2">Première G2</option>
                                            <option value="Première G3">Première G3</option>
                                            <option value="Première ESF">Première ESF</option>
                                            <option value="Première CH">Première CH</option>
                                            <option value="Première IB">Première IB</option>
                                            <option value="Première IH">Première IH</option>
                                            <option value="Première MA">Première MA</option>
                                            <option value="Première CM">Première CM</option>
                                            <option value="Terminale F1">Terminale F1</option>
                                            <option value="Terminale F2">Terminale F2</option>
                                            <option value="Terminale F3">Terminale F3</option>
                                            <option value="Terminale F4">Terminale F4</option>
                                            <option value="Terminale F5">Terminale F5</option>
                                            <option value="Terminale F7">Terminale F7</option>
                                            <option value="Terminale G1">Terminale G1</option>
                                            <option value="Terminale G2">Terminale G2</option>
                                            <option value="Terminale G3">Terminale G3</option>
                                            <option value="Terminale ESF">Terminale ESF</option>
                                            <option value="Terminale CH">Terminale CH</option>
                                            <option value="Terminale IB">Terminale IB</option>
                                            <option value="Terminale IH">Terminale IH</option>
                                            <option value="Terminale MA">Terminale MA</option>
                                            <option value="Terminale CM">Terminale CM</option>
                                            </datalist>
                                            </td>
                                </tr>
                                <tr>
                                    <th>MATRICULE</th>
                                    <td><input type="text" name="matricule" class="matricule" value="<?php echo htmlspecialchars($matricule) ?>" readonly placeholder="Matricule automatique"></td>
                                </tr>
                                <tr>
                                    <th>DATE DE NAISSANCE</th>
                                    <td><input type="date" name="date" class="date"></td>
                                </tr>
                                <tr>
                                    <th>LIEUX DE NAISSANCE</th>
                                    <td><input type="search" name="naissance" class="naissance" placeholder="Entrez le lieu de naissance"></td>
                                </tr>
                                <tr>
                                    <th>SEXE</th>
                                    <td>
                                        <select name="sex" class="sex">
                                            <option value="MASCULIN">Masculin</option>
                                            <option value="FEMININ">Féminin</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>SITUATION</th>
                                    <td>
                                        <select name="situalion" class="situation">
                                            <option value="Ancien">Ancien</option>
                                            <option value="Nouveau">Nouveau</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>REDOUBLANT</th>
                                    <td>
                                        <select name="redoublan" class="redoublan">
                                            <option value="Non">Non</option>
                                            <option value="Oui">Oui</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="caption"><label for="add">Enregistrer l'élève</label><button type="submit" onclick="create_classe()" id="add" name="send">envoyer</button></div><br>
                    </form>
        

        </div>
    <footer style="margin-top: 40px;">
    <?php include"footer.php" ?>
</footer>
</body>
</html>