<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/header_responsive copy.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index_responsive.css">
</head>
<body>

     <header>
        <?php require_once("header.php") ?>
     </header>





    <main class="main">
        <h1>Bienvenue a la page d'acceuil du Gestionnaire de Note scolaire</h1><br>
        <section >

            <div class="container">
                <div class="child">
                    <h3>FACILITER VOTRE VIE EN GÉRANT VOS NOTES SCOLAIRES SANS EFFORT</h3>
Finie la corvée des bulletins scolaires. Avec GESTNOTE, calculez les moyennes et générez vos rapports en quelques
                     clics. Explorez la démo ou connectez-vous pour commencer !                    <div class="but">
                        <button class="button" id="ifo_button">VOIR LA DÉMO</button>
                    </div>
                </div>
            <div class="child child_2" id="content_1">
                <img src="image/OriceftStudents2.png" alt="" class="img">
            </div> 
                <div class="child">
                    <h3>Connection</h3>
                    connectez-vous pour vivre une expérience inoubliable avec GestNote
                     <br>
                    <div class="but">
                        <button class="button" id="connexion">SE CONNECTER</button>
                    </div>
                </div>
                <div class="child">
                    <h3>Contact</h3>
                    Pour plus dinformations ou pour un service ou encore pour l'aprentissage a l'utilisation de notres application, vous pouvez nous contacter.
                    <div class="but">
                        <button class="button" id="contact">Nous contacter</button> 
                    </div>
                </div>
        </section><br><br>


    </main>
    <footer >
        <p align="center">
            <span style="color: #00a2ff;font-weight: bolder">GESTNOTE</span> — Douala-Cameroun

                © create by NI PRO DEV 
        </p>
    </footer>

    <script src="JS/header.js" defer></script>
    <script src="JS/index.js" defer></script>
    <script src="JS/color_pages.js" defer></script>
</body>
</html> 