<?php    
         // creation d'une session pour voir la serie de l'utilisateur
         session_start();

    if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"]) ){
        $user_name = $_SESSION["user_name"];
        $profil= $_SESSION['profil'];
        $tab_name = explode(" ",$user_name);
        $user_name = $tab_name[0];
    }else{
        $user_name = "Mon profil";
    }



?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESTNOTE</title>
    <link rel="stylesheet" href="/app/css/all_style.css">
    <link rel="stylesheet" href="/app/css/all_style_responsive.css">
    <script src="/app/js/header.js" defer></script>
    <script src="/app/js/color.js" defer></script>
</head>
<body>
    <header>
        <div class="header_parent">
            <div class="headerlogo">
                <span class="logo_div gap">
                    <img src="/image/logo.png" class="logo" alt="">
                </span>
                <div class="logo_name gap">GESTNOTE</div>
            </div>
            <div class="auther" id="auther">

            <div class="nav_bar" id="nav_bar" style="background-color: transparent;">
                <nav id="nav" style="background-color: transparent;">
                    <ul id="ul" class="ul" style="background-color: transparent;">
                        <li id="li" class="li"><a href="/app/acceuil_app.php" style="background-color: transparent;">ACCEUIL</a></li>
                        <li class="li"><a href="/app/historique.php" style="background-color: transparent;">HISTORIQUE</a></li>
                        <li class="li"><a href="/app/confection.php"  style="background-color: transparent;">CONTRÔLE DES BULLETINS</a></li>
                        <li class="li"><a href="/app/saisi.php" style="background-color: transparent;">SAISIR LES NOTES</a></li>
                        <li class="li"><a href="/app/calcul.php" id="a" style="background-color: transparent;">CALCULS</a></li>
                        <li class="li"><a href="/app/inprimer.php" style="background-color: transparent;">IMPRIMER</a></li>
                        <li class="li"><a href="/app/parent.php" style="background-color: transparent;">RESULTAT</a></li>
                    </ul>
                </nav>
            </div>
            <div class="user_profile" id="user_profile" style="background-color: transparent;">
                <div class="user_logo" style="background-color: transparent;"><img src="<?php echo htmlspecialchars("/".$profil) ?>" class="logo_profile" alt="" style="background-color: transparent;" na></div>
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
        <div class="content_2" id="content_2" style="position: relative;">
            <span class="back" id="back">←</span>
            <div class="profile" align="center">
                <div class="user_log" align="center" style="background-color: transparent;"><img src="/image/telegram-svgrepo-com.svg" class="logo_profile" alt=""><br><input type="text" name="nom_user" id="" style="border: none;background-color: transparent;" placeholder="NOM UTILISATEUR"></div>
                <div class="user_name"><span id="user_name"></span>
                </div>
            </div>
            <div class="theme">

                        <ul>
                         <li id="moon" style="cursor: pointer;" class="thème">Thème sombre
                        </li>
                        <li id="sun" class="thème">thème clair
                        </li>

                    </ul>
            </div>
        </div>
        <div class="content_1" id="content_1">

        <h1>Hello word !!!</h1>
        

        </div>
    </main>
</body>
</html>