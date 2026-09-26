<?php  
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_name = "Utilisateur";
$profil = "image/default_user.png";

if (isset($_SESSION["user_name"]) && !empty($_SESSION["user_name"])) {
    $user_name = $_SESSION["user_name"];
    $tab_name = explode(" ", $user_name);
    $user_name = $tab_name[0];
}else{
    header('location: ../connexion.php');
}

if (isset($_SESSION["profil"]) && !empty($_SESSION["profil"])) {
    $profil = $_SESSION['profil'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
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
                        <li class="li"><a href="inscription.php"style="background-color: transparent;">INSCRIPTIONS D'ÉLÈVES</a></li>
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
        <?php include 'div_2.php'; ?>

        <div class="content_1" id="content_1">
            
            <!-- Hero / Banners & Slider -->
            <section class="hero_section"><br>
                <p class="sub_title">Votre solution complète et centralisée pour la gestion des bulletins et le suivi académique.</p>
                
                <div class="slider_parent">
                    <div class="slider_child">
                        <div class="slider_image">
                            <img src="../image/logo.png" alt="Logo GestNote" class="image_slide">
                            <img src="img/images_2.jpeg" alt="Espace de travail" class="image_slide">
                            <img src="img/images_3.jpeg" alt="Saisie des notes" class="image_slide">
                            <img src="../image/OriceftStudents3.png" alt="Élèves et communauté" class="image_slide">
                        </div>
                    </div>
                </div>
            </section>

            <!-- NOUVELLE SECTION : Chiffres clés / Stats rapide -->
            <section class="stats_section">
                <div class="stat_card">
                    <span class="stat_number">100%</span>
                    <span class="stat_label">Numérisé & Sécurisé</span>
                </div>
                <div class="stat_card">
                    <span class="stat_number">24/7</span>
                    <span class="stat_label">Accès Enseignants</span>
                </div>
                <div class="stat_card">
                    <span class="stat_number">1 Clic</span>
                    <span class="stat_label">Impression Groupée</span>
                </div>
            </section>

            <!-- Grille des fonctionnalités principales -->
            <section class="container_wrapper">
                <h2 class="section_heading">Fonctionnalités Principales</h2>
                
                <div class="container">
                    <div class="content">
                        <div class="card_header">
                            <h3>Historique</h3>
                        </div>
                        <p>Consultez les archives des bulletins des années précédentes. Accédez rapidement aux données d'archives et au palmarès des dix premiers élèves de l'établissement.</p>
                        <button class="button" id="historique" onclick="window.location.href='historique.php'">Voir l'historique</button>
                    </div>

                    <div class="content" id="id">
                        <div class="card_header">
                            <h3>Inscription</h3>
                        </div>
                        <p>Gérez le répertoire des élèves : inscrivez de nouveaux apprenants ou mettez à jour leurs informations directement dans la base de données.</p>
                        <button class="button" id="controle" onclick="window.location.href='inscription.php'">Inscrire des élèves</button>
                    </div>
                    
                    <div class="content">
                        <div class="card_header">
                            <h3>Saisie des notes</h3>
                        </div>
                        <p>Espace dédié au corps enseignant pour la saisie à distance des notes de devoirs, d'évaluations et d'examens en toute simplicité.</p>
                        <button class="button" id="saisis" onclick="window.location.href='saisi.php'">Saisir les notes</button>
                    </div>
                    
                    <div class="content">
                        <div class="card_header">
                            <h3>Suivi & Supervision</h3>
                        </div>
                        <p>Supervisez l'état d'avancement du remplissage des notes par matière et identifiez les retards pour garantir le respect de la feuille de route.</p>
                        <button class="button" id="calcul" onclick="window.location.href='suivis.php'">Suivre la saisie</button>
                    </div>
                    
                    <div class="content">
                        <div class="card_header">
                            <h3>Impression Groupée</h3>
                        </div>
                        <p>Générez et imprimez en une seule opération l'intégralité des bulletins trimestriels pour l'ensemble d'une classe.</p>
                        <button class="button" id="imprimer" onclick="window.location.href='inprimer.php'">Imprimer les bulletins</button>
                    </div>
                    
                    <div class="content">
                        <div class="card_header">
                            <h3>Bulletin Numérique</h3>
                        </div>
                        <p>Accédez directement au tableau des résultats, consultez les moyennes globales et téléchargez les copies officielles au format PDF.</p>
                        <button class="button" id="resultat" onclick="window.location.href='parent.php'">Voir les résultats</button>
                    </div>
                </div>
            </section>

            <!-- NOUVELLE SECTION : Annonces & Mises à jour -->
            <section class="news_section">
                <div class="news_box">
                    <h3>📢 Information & Calendrier</h3>
                    <p>Pensez à finaliser la saisie des notes avant la clôture de la séquence en cours. Pour toute assistance technique sur la plateforme, contactez l'administrateur système.</p>
                </div>
            </section>

        </div>
    </main>

    <footer>
        <?php require('footer.php'); ?>
    </footer>
</body>
</html>