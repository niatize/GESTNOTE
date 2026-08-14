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
                        <li id="li" class="li"><a href="/app/acceuil_app.php" id="a" style="background-color: transparent;">ACCEUIL</a></li>
                        <li class="li"><a href="/app/historique.php" style="background-color: transparent;">HISTORIQUE</a></li>
                        <li class="li"><a href="/app/confection.php"  style="background-color: transparent;">CONTRÔLE DES BULLETINS</a></li>
                        <li class="li"><a href="/app/saisi.php" style="background-color: transparent;">SAISIR LES NOTES</a></li>
                        <li class="li"><a href="/app/calcul.php" style="background-color: transparent;">CALCULS</a></li>
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