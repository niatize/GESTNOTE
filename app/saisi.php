<?php    
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
        include_once ("../data_base.php");
    if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"]) ){
        $user_name = $_SESSION["user_name"];
        $name = $user_name;
        $profil= $_SESSION['profil'];
        $tab_name = explode(" ",$user_name);
        $user_name = $tab_name[0];
    }else{
        header('location: ../connexion.php');
    }
    try {
        $sql = $pdo->prepare("SELECT * FROM user WHERE full_name = :nom");
        $sql->execute(["nom"=>$name]);
        $user_info = $sql->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $th) {
        //throw $th;
        die("Erreur".$th->getMessage());
    }

                // pour voir les classes de l'utilisateur en fonction de ses matières
 
            $matieres_bdd = [];
            $matiere_get = [];       

            $classes = explode('+ ',$user_info['classes']);
            $matieres = explode('+',$user_info['matieres']);
if (isset($_GET["classe"]) && !empty($_GET['classe']) && isset($_GET["matiere"]) && !empty($_GET['matiere'])) {
    $classe = $_GET["classe"];
    $matiere = urldecode($_GET["matiere"]);
    $matiere_get = explode(', ',$matiere);
    try {
        $sql = $pdo->prepare('SELECT id_class FROM classe WHERE nom = :nom');
        $sql->execute(["nom" => $classe]);
        $id_classe = $sql->fetchColumn();

        if ($id_classe) {
            $sql = $pdo->prepare
            ("SELECT nom
            FROM matiere
            INNER JOIN matiere_coeff ON matiere_coeff.id_mat = matiere.id_mat
            WHERE matiere_coeff.id_class = :id_class
            ");
            $sql->execute(["id_class" => $id_classe]);
            $matieres_bdd = $sql->fetchAll(PDO::FETCH_COLUMN); 
        }

    } catch (PDOException $e) {
        die("ERROR : " . $e->getMessage());
    }
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisis des notes</title>
    <link rel="stylesheet" href="css/all_style.css">
    <link rel="stylesheet" href="css/all_style_responsive.css">
    <link rel="stylesheet" href="css/acceuil.css">
    <link rel="stylesheet" href="css/saisis.css">
    <script src="js/header.js" defer></script>
    <script src="js/color.js" defer></script>
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
                        <li id="li" class="li"><a href="acceuil_app.php" style="background-color: transparent;">ACCEUIL</a></li>
                        <li class="li"><a href="historique.php" style="background-color: transparent;">HISTORIQUE</a></li>
                        <li class="li"><a href="inscription.php"  style="background-color: transparent;">INSCRIPTIONS D'ÉLÈVES</a></li>
                        <li class="li"><a href="saisi.php" id="a" style="background-color: transparent;">SAISIR LES NOTES</a></li>
                        <li class="li"><a href="suivis.php" style="background-color: transparent;">SUIVIS DES NOTES</a></li>
                        <li class="li"><a href="inprimer.php" style="background-color: transparent;">IMPRIMER</a></li>
                        <li class="li"><a href="parent.php" style="background-color: transparent;">RESULTAT</a></li>
                    </ul>
                </nav>
            </div>
            <div class="user_profile" id="user_profile" style="background-color: transparent;">
                <div class="user_logo" style="background-color: transparent;"><img src="<?php echo htmlspecialchars("../".$profil) ?>" class="logo_profile" alt="" style="background-color: transparent;"></div>
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
        <div class="content_1" id="content_1" style="position: relative;" >
                <h1>
                <?php 
                    $series = explode(",",$user_info["serie"]);
                    if($series[1] !== null){
                    echo '<div class="generale div" id="generale">'.$series[0].'</div>';
                    echo "<hr>";
                    echo '<div class="technique div">'.$series[1].'</div>';
                    }elseif($series[1]==null && $series[0]!==null){
                        echo '<div class="generale div" id="generale">'.$series[0].'</div>';
                    }
                ?>
            </h1>
            <div class="classes class"><br>
                <?php 
                    for($i=0;$i<count($classes);$i++){
                        $classe = trim($classes[$i]);
                        echo '<div class="classe"><a id="'.htmlspecialchars($classe).'" href="saisi.php?classe='.htmlspecialchars($classe).'&matiere='.urlencode($matieres[$i]).'">'.$classes[$i].'</a></div>';
                    }
                ?><br>
            </div>
            <div class="matiere" id="matiere">
                <?php
                    $test = false;
                    // filtrage et affichege des matières selon la classe choisis
                    for($i = 0; $i<count($matiere_get);$i++){
                        for($j = 0;$j< count($matieres_bdd);$j++){
                                if(trim($matiere_get[$i]) === trim($matieres_bdd[$j])){
                                    $test = true;
                                    if($test){
                                            echo '<div class="matier"><a id="ac" href="saisi.php?'.http_build_query(['matiere_choix'=>htmlspecialchars($matiere_get[$i]),'classe_en_cours'=>$_GET["classe"]]).'">'.htmlspecialchars($matiere_get[$i]).'</a></div>';
                                    }
                                }
                        }
                    } 
                ?>
            </div>
            <div class="input_note">
                <?php 
                    if (isset($_GET["matiere_choix"]) && !empty($_GET["matiere_choix"])) {
                        // L'utilisateur a choisi sa matière : on enregistre en session
                        $_SESSION["classe_en_cours"] = $_GET["classe_en_cours"];
                        $_SESSION["matiere_choix"] = $_GET["matiere_choix"];

                        echo '<div>Veuillez saisir les notes des élèves de la <strong>' . htmlspecialchars($_GET["classe_en_cours"]) . '</strong> dont la matière concernée est <strong>' . htmlspecialchars($_GET["matiere_choix"]) . '</strong></div>';
                    } 
                    elseif (isset($_GET["classe"]) && !$test) {
                        // Le message s'affiche UNIQUEMENT si l'utilisateur vient de choisir une classe ET qu'aucune matière n'a été trouvée
                        echo '<div id="p">Vous n\'êtes affecté à aucune matière de cette classe</div>';
                    }
                ?>
            </div>
            <div id="insertion_de_note">
               <form action="" method="post">
                     <?php 
                        if (isset($_GET["matiere_choix"]) && !empty($_GET["matiere_choix"]) && isset($_GET["classe_en_cours"]) && !empty($_GET["classe_en_cours"])) {
                            $classe_en_cours = $_SESSION["classe_en_cours"];
                            $matiere_choisis = $_SESSION["matiere_choix"];
                            try{
                                $sql = $pdo->prepare(
                                    "SELECT nom_complet
                                    FROM eleve
                                    WHERE nom_classe = :classe_en_cours
                                    ORDER BY nom_complet ASC
                                    ");
                                $sql->execute(["classe_en_cours"=>$classe_en_cours]);
                                $eleves_info = $sql->fetchAll(PDO::FETCH_ASSOC);
                                echo ' <table border>
                                        <tr>
                                            <th rowspan="2" class="n">N°</th>
                                            <th rowspan="2" class="nom">NOM</th>
                                            <th colspan="2" class="note">NOTE</th>
                                        </tr>
                                        <tr>
                                        <th class="cc">CC</th>
                                        <th class="eval">EVAL</th>
                                        </tr>';
                            for($i=0;$i<count($eleves_info);$i++){
                                echo '
                                    <tr>
                                        <td align="center">'.($i+1).'</td>
                                        <td><input type="text" value="'.htmlspecialchars($eleves_info[$i]["nom_complet"]).'"name="nom_eleve[]" style="padding: 3px;font-size:large;border:none" readonly></td>
                                        <td><input type="number" pattern="[0.25-9]"name="cc[]" required></td>
                                        <td><input type="number"pattern="[0.25-9]" name="eval[]" required></td>
                                    </tr>';
                            }
                                echo '
                                    </table>
                                    <div class="submit_div"><button type="submit" name="send" class="btn-submit">
                                            <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="blue" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                                <polyline points="17 21 17 13 7 13 7 21"/>
                                                <polyline points="7 3 7 8 15 8"/>
                                            </svg>
                                            Enregistrer les notes
                                        </button>
                                    </div>';
                            }catch(PDOException $e){
                                die('ERROR :: '.$e->getMessage());
                            }
                        }
                    ?> 
                         <!-- creation du tableau qui vas récupérer les notres des éléves -->
                   
               </form>
            </div>
        </div>
    </main>
    <footer>
        <?php require_once "footer.php" ?>
    </footer>
</body>
</html>
        <!-- option d'envoie des notes saisis -->
    <?php 
    // gestion de couleur sur la classe active
    echo    '<script>
                const div = document.getElementById("'.$classe_en_cours.'")
                div.style.backgroundColor = "goldenrod"
            </script>';
        if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_SERVER["REQUEST_METHOD"]) && isset($_POST["send"])){
            if(isset($_POST["nom_eleve"]) && 
            !empty($_POST["nom_eleve"]) && 
            isset($_POST["cc"]) && 
            !empty($_POST["cc"])  && 
            isset($_POST["eval"]) && 
            !empty($_POST["eval"])){
                $nom_eleve = $_POST["nom_eleve"];
                $cc = $_POST["cc"];
                $eval = $_POST["eval"];
                //récupération de l'identifiant de la matière en question
                try{
                    $sql = $pdo->prepare("SELECT
                    id_mat
                    FROM matiere
                    WHERE matiere.nom = :matiere_choisis");
                    $sql->execute(["matiere_choisis"=>$matiere_choisis]);
                    $id_matiere = $sql->fetch(PDO::FETCH_ASSOC);
                    $id_matiere = $id_matiere["id_mat"];
                    //insertion des notes en base de données
                    //récupération de l'identifiant de l'élève;
                    for($i=0;$i<count($nom_eleve);$i++){
                    $sql = $pdo->prepare("SELECT id_eleve FROM eleve WHERE nom_complet = :nom_complet");
                    $sql->execute(["nom_complet"=>$nom_eleve[$i]]);
                    $id_eleve = $sql->fetch(PDO::FETCH_ASSOC);
                    // insertion des données  dans la table
                        $sql = $pdo->prepare("INSERT INTO
                                        notes(id_mat,note_cc,note_eval,id_eleve)
                                        VALUES(:id_mat,:note_cc,:note_eval,:id_eleve)
                                        ");
                        $sql->execute(["id_mat"=> $id_matiere,
                                        "note_cc"=> (float) $cc[$i],
                                        "note_eval"=>(float) $eval[$i],
                                        "id_eleve"=>$id_eleve["id_eleve"]
                                        ]);

                    }
                echo '<script>alert("les notres ont bien étés envoyé")</script>';
                }catch(PDOException $e){
                    die("ERROR : ".$e->getMessage());
                }

            }
        }
        if(isset($_POST["send"])&& empty($_POST["cc"])  && empty($_POST["eval"])){
            echo '<script>alert("Veuillez remplir toutes les notes avant d\'envoyer")</script>';
        }
    
    
    ?>