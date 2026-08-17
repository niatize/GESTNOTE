<?php    
         // creation d'une session pour voir la serie de l'utilisateur
         session_start();
        include_once ("../data_base.php");
    if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"]) ){
        $user_name = $_SESSION["user_name"];
        $name = $user_name;
        $profil= $_SESSION['profil'];
        $tab_name = explode(" ",$user_name);
        $user_name = $tab_name[0];
    }else{
        $user_name = "Mon profil";
    }
    try {
        $sql = $pdo->prepare("SELECT * FROM user WHERE full_name = :nom");
        $sql->execute(["nom"=>$name]);
        $user_info = $sql->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $th) {
        //throw $th;
        die("Erreur".$th->getMessage());
    }


    //récupération des classes en tableau

    $classes = explode(',',$user_info["classes"]);
    //initialisation des classes par leurs nombres
    $matieres = explode(',',$user_info["matieres"]);
    function create_option($table){
        echo '<select >';
        for($i=0;$i<count($table);$i++){
            echo '<option>'.htmlspecialchars($table[$i]).'</option>';
        }
        echo '</select>';
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
    <link rel="stylesheet" href="/app/css/saisis.css">
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
                        <li class="li"><a href="/app/saisi.php" id="a" style="background-color: transparent;">SAISIR LES NOTES</a></li>
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
    <main id="main">
        <?php include_once('div_2.php') ?>
        <div class="content_1" id="content_1">
            <h1>
            <?php 
                $series = explode(", ",$user_info["serie"]);
                if($series[1] !== null){
                echo '<div class="generale div" id="generale"><a href="">'.$series[0].'</a></div>';
                echo "<hr>";
                echo '<div class="technique div"><a href="">'.$series[1].'</a></div>';
                }elseif($series[1]==null && $series[0]!==null){
                    echo '<div class="generale div" id="generale"><a href="">'.$series[0].'</a></div>';
                }
            ?>
        </h1>
        <section id="class" class="class">
            <nav class="nav2">
                    <ol class="ol">
                        <?php
                            for($i=0;$i<count($classes);$i++){
                                echo '<li><a href="">'. $classes[$i].'</a>'.create_option($matieres).'</li>';
                            }
                        ?>
                    </ol>
            </nav>
        </section><br>
        <div class="search">
            <input type="search" name="" id="" placeholder="Rechercher une classe..."><button type="button">Rechercher...</button>
        </div>
        </div>
    </main>
</body>
</html>