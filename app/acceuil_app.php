<?php  
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_name = "" ;
    if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"]) ){
        $user_name = $_SESSION["user_name"];
        $profil= $_SESSION['profil'];
        $tab_name = explode(" ",$user_name);
        $user_name = $tab_name[0];
    }



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTNOTE</title>
    <link rel="stylesheet" href="css/all_style.css">
    <link rel="stylesheet" href="css/all_style_responsive.css">
    <link rel="stylesheet" href="css/acceuil.css">
    <link rel="stylesheet" href="css/acceul_responsive.css">
    <script src="js/header.js" defer></script>
    <script src="js/color.js" defer></script>
    <script src="js/acceuille.js" defer></script>
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
                        <li id="li" class="li"><a href="acceuil_app.php" id="a" style="background-color: transparent;">ACCEUIL</a></li>
                        <li class="li"><a href="historique.php" style="background-color: transparent;">HISTORIQUE</a></li>
                        <li class="li"><a href="inscription.php"  style="background-color: transparent;">INSCRIPTION D'ÉLÈVES</a></li>
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
        <?php include'div_2.php' ?>
        <div class="content_1" id="content_1">
            <h1>BIENVENUE DANS <span>GESTNOTE</span> POUR LA GESTION DE VOS BULLETINS</h1>
            <div class="slider_parent">
                <div class="slider_child">
                    <div class="slider_image">
                        <img src="../image/logo.png" alt="" class="image_slide">
                        <img src="img/images_2.jpeg" alt="" class="image_slide">
                        <img src="img/images_3.jpeg" alt="" class="image_slide">
                        <img src="../image/OriceftStudents3.png" alt="" class="image_slide">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="content">
                    <h3>Historique</h3>
                    Vous avez la posibilité avec GESTNOTE de voir les bulletins antérieurement réalisé
                    et classé selon les années de réalisations. Cest derniers serons utliles pour facilement recupérer les données qui pourons être utiliser par l'élève concerné. A la fin d'année, est publier la liste des dix premiers de l'établissement. <br>
                    <button class="button" id="historique">Voir l'historique</button>
                </div>

                <div class="content" id="id">
                    <h3>Inscription</h3>
                        Dans cette partie, vous alez la possibilité d'inscrires, modifier les élèves dans la base de données
                    <button class="button" id="controle">Inscrire des élèves</button>
                </div>
                
                <div class="content">
                    <h3>Saisis des notes</h3>
                    Finis de faire un rangs sur un même post de travaille pour saisir les notes. GESTNOTE permet au professeurs de saisir les notes même en étant chez eux. Ainsi elle permet de gagner énormement de temps et de satisfaire les élèves. <br>
                    <button class="button" id="saisis">Saisir les notes</button>
                </div>
                
                <div class="content">
                    <h3>Suivis</h3>
                        Accédez au tableau de bord pour superviser la saisie des notes par les professeurs, identifier immédiatement les retards de soumission et vous assurer que chaque enseignant respecte les délais de la feuille de route.
                    <button class="button" id="calcul">Suivre la saisis</button>
                </div>
                
                <div class="content">
                    <h3>Impression groupée des bulletins</h3>
                    Générez et imprimez en un clic l'ensemble des bulletins de notes de la classe pour le trimestre en cours.
                    Ne perdez plus de temps à imprimer fiche par fiche. Lancez l'impression intégrale de tous les bulletins d'une classe en une seule opération.
                    <button class="button" id="imprimer">Imprimer les bulletins</button>
                </div>
                
                <div class="content">
                    <h3>Bulletin Numérique Officiel</h3>
                    Retrouvez l'intégralité du bulletin scolaire en ligne. Consultez les moyennes et appréciations en temps réel, ou téléchargez une copie numérique (PDF) pour vos archives.
                    Accédez à l'historique des notes, aux moyennes de classe et au bulletin officiel du trimestre en version numérique permettant ainsi de réduire la consommation en papier protégeant ainsi l'écosystème.
                    <button class="button" id="resultat">Voir les résultat</button>
                </div>
                
            </div>

        </div>
    </main>
    <footer align="center">
        <?php require('footer.php') ?>
    </footer>
</body>
</html>