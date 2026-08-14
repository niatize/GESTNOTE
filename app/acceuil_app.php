<?php    
         // creation d'une session pour voir la serie de l'utilisateur
         session_start();

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
    <link rel="stylesheet" href="/app/css/all_style.css">
    <link rel="stylesheet" href="/app/css/all_style_responsive.css">
    <link rel="stylesheet" href="/app/css/acceuil.css">
    <link rel="stylesheet" href="/app/css/acceul_responsive.css">
    <script src="/app/js/header.js" defer></script>
    <script src="/app/js/color.js" defer></script>
    <script src="/app/js/acceuille.js" defer></script>
</head>
<body>
    <?php require("header.php") ?>
    <main id="main">
        <?php include'div_2.php' ?>
        <div class="content_1" id="content_1">
            <h1>BIENVENUE DANS <span>GESTNOTE</span> POUR LA GESTION DE VOS BULLETINS</h1>
            <div class="slider_parent">
                <div class="slider_child">
                    <div class="slider_image">
                        <img src="/image/logo.png" alt="" class="image_slide">
                        <img src="/app/img/images_2.jpeg" alt="" class="image_slide">
                        <img src="/app/img/images_3.jpeg" alt="" class="image_slide">
                        <img src="/image/OriceftStudents3.png" alt="" class="image_slide">
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
                    <h3>Contrôle des bulletins</h3>
                    Dans cette partie de l'aplications, vous pouvez visualiser la suivis et la mise en forme progressive des bulletins. Ainsi, cellon le délais, vous pouvez visualiser les erreurs de retard de la saisis des notes par les professeurs et leurs faires part. Ici, une liste complete qui récapitule les bulletins collective par classe est distribué.<br>
                    <button class="button" id="controle">Aller au contrôle</button>
                </div>
                
                <div class="content">
                    <h3>Saisis des notes</h3>
                    Finis de faire un rangs sur un même post de travaille pour saisir les notes. GESTNOTE permet au professeurs de saisir les notes même en étant chez eux. Ainsi elle permet de gagner énormement de temps et de satisfaire les élèves. <br>
                    <button class="button" id="saisis">Saisir les notes</button>
                </div>
                
                <div class="content">
                    <h3>Calcul</h3>
                    Actualiser régulièrement le serveur afin de mettre a jour le calcul automatique des bulletins. Ici, vous avez la posibilité de voir les élèves et les salles de classes dont les notes n'ont pas été attribué pendant une séquance. <br>
                    <button class="button" id="calcul">Aller au calcul</button>
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