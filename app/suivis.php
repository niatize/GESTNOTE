<?php    
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../data_base.php";
$liste_de_classes = [];
$mat_list = [];
$bdd_receip = [];
    if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"]) ){
        $user_names = $_SESSION["user_name"];
        $profil= $_SESSION['profil'];
        $tab_name = explode(" ",$user_names);
        $user_name = $tab_name[0];
        try{
        $sql= $pdo->prepare('SELECT id_classes FROM etablissement INNER JOIN user ON etablissement.id = user.etablissement_id WHERE user.full_name = :nom');
        $sql->execute(["nom"=>$user_names]);
        $id_classes = $sql->fetch(PDO::FETCH_ASSOC);
        $id_classes = $id_classes["id_classes"];
        $id_classes= explode(', ',$id_classes);
        for($i=0;$i<count($id_classes);$i++){
            for($j=$i+1;$j<count($id_classes);$j++){
                if($id_classes[$i]>$id_classes[$j]){
                    $k=$id_classes[$i];
                    $id_classes[$i] = $id_classes[$j];
                    $id_classes[$j] = $k;
                }
            }
        }
        for($i=0;$i<count($id_classes);$i++){
            $sql = $pdo->prepare('SELECT nom FROM classe WHERE id_class = :id_classes ORDER BY id_class ASC');
            $sql->execute(["id_classes"=>$id_classes[$i]]);
            $class_list = $sql->fetch(PDO::FETCH_ASSOC);
            array_push($liste_de_classes,$class_list);
        }
        }catch(PDOException $e){
            die("ERREUR :". $e->getMessage());
        }
    }else{
        header('location: ../connexion.php');
        $user_name = "Mon profil";
    }
    // Récupération de l'identifiant de la classe active

    // identification de la classe qu est en cours 
    if(isset($_GET['classe']) && !empty($_GET['classe'])){
        $classe_en_cour = $_GET['classe'];
    }
    if($classe_en_cour){
        try{
            $sql = $pdo->prepare('SELECT id_mat
                             FROM matiere_coeff
                             INNER JOIN classe
                             ON matiere_coeff.id_class = classe.id_class
                             WHERE nom = :id
                            ');
            $sql->execute(["id"=>$classe_en_cour]);
                $id_mat = $sql->fetchAll(PDO::FETCH_COLUMN);
            // recupération du nom de chaque matière présent dans la classe en question
            for($i=0;$i<count($id_mat);$i++){
                $sql = $pdo->prepare('SELECT nom
                                FROM matiere
                                where id_mat = :id');
                $sql->execute(["id"=>$id_mat[$i]]);
                $nom = $sql->fetch(PDO::FETCH_COLUMN);
                array_push($mat_list,$nom);
            }
            $sql = $pdo->query('SELECT nom FROM matiere');
            $matieres_list = $sql->fetchAll(PDO::FETCH_ASSOC);
            $bdd_receip = [
                "classes"=>$liste_de_classes,
                "matieres"=>$matieres_list
            ];
            json_encode($bdd_receip);
        }catch(PDOException $e){
            die("ERREUR::".$e->getMessage());
        }
    }



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivis des bulletins</title>
    <link rel="stylesheet" href="css/all_style.css">
    <link rel="stylesheet" href="css/all_style_responsive.css">
    <link rel="stylesheet" href="css/suivis.css">
    <link rel="stylesheet" href="css/saisis.css">
    <script src="js/header.js" defer></script>
    <script src="js/color.js" defer></script>
    <script src="js/suivis.js" defer></script>
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
                        <li class="li"><a href="inscription.php"  style="background-color: transparent;">INSCRIPTION D'ÉLÈVES</a></li>
                        <li class="li"><a href="saisi.php" style="background-color: transparent;">SAISIR LES NOTES</a></li>
                        <li class="li"><a href="suivis.php" id="a" style="background-color: transparent;">SUIVIS DES NOTES</a></li>
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
        <?php include_once('div_2.php') ?>
        <div class="content_1" id="content_1" style="position: relative;">

            <h1>Suivez l'évolution de la saisis des notes</h1>
            <div class="classes">
                <br>
                    <?php 
                        for($i=0;$i<count($liste_de_classes);$i++){
                            echo '<div class="classe"><a id="'.$liste_de_classes[$i]['nom'].'" href="?classe='.$liste_de_classes[$i]['nom'].'">'.$liste_de_classes[$i]['nom'].'</a></div>';
                        }
                ?>
                <br>
            </div>
            <form action="" id="form">
                <div class="matiere" id="matiere"><br>
                    <div class="filtre">
                        <span >FILTRE ET RECHERCHE</span>
                        Trimestre:<br>
                        <select name="trimestre" id="">
                            <option value="Trimestre 1">Trimestre 1</option>
                            <option value="Trimestre 2">Trimestre 2</option>
                            <option value="Trimestre 3">Trimestre 3</option> 
                        </select>
                    </div>
                    <div class="filtre">
                        Matière: <br>
                        <input type="search" name="matière" list="matière" id="" placeholder="Entrer la matière concerné">
                        <datalist id="matière">
                            <?php 
                            for($i=0;$i<count($mat_list);$i++){
                                echo '<option value="'.$mat_list[$i].'">'.$mat_list[$i].'</option>';
                            }
                            ?>
                        </datalist>
                    </div>
                    <div class="filtre">
                        Rechercher<br>
                        <input type="search" name="recherche" list="recherche" id="" placeholder="Chercher un élève...">
                    </div>
                    <button type="submit" id="submit">Filter les données</button>
                </div><br>
                <div class="statuts_contener">

                    <div class="progress_bar" style="background-color: transparent;">
                        <div class="progress" style="background-color: transparent;">
                            <?php echo htmlspecialchars($classe_en_cour); ?>
                        </div>
                        <div class="progress" style="background-color: transparent;"></div>
                    </div>

                    <div class="schuler_statut" style="background-color: transparent;">
                        <div class="over" style="background-color: transparent;"></div>
                        <div class="dont_nid" style="background-color: transparent;"></div>
                    </div>

                    <div class="auther" style="background-color: transparent;"></div>
                </div>
            </form>

        </div>
    </main>
    <footer>
        <?php require_once "footer.php" ?>
    </footer>
</body>
</html>
<?php 
// script de reception du formulaire


// gestion de font de la classe choisis
 echo    '<script>
                const div = document.getElementById("'.$classe_en_cour.'")
                div.style.backgroundColor = "goldenrod"
            </script>';
?>