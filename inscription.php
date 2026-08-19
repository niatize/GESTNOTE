<?php
            session_start();
require_once("data_base.php");
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;




if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
    if(
            isset($_POST['nom']) &&
            isset($_POST['mot_de_passe']) && 
            isset($_POST['email']) &&
            isset($_POST['telephone']) && 
            isset($_POST['statut']) && 
            isset($_POST['ecole']) && 
            isset($_FILES['logo_profile'])&&
            isset($_POST["serie"]))
    {
        if(
            !empty($_POST['nom']) &&
            !empty($_POST['mot_de_passe']) && 
            !empty($_POST['email']) && 
            !empty($_POST['telephone']) && 
            !empty($_POST['statut']) && 
            !empty($_POST['ecole']) && 
            !empty($_FILES['logo_profile'])&&
            !empty($_POST["serie"]))
        {
            $nom =  $_POST['nom'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'],PASSWORD_DEFAULT);
            $email =   $_POST['email'];
            $telephone =   $_POST['telephone'];
            $statut =   $_POST['statut'];
            $ecole =   $_POST['ecole'];
                //convertir la serie en chaine
            $serie = $_POST["serie"];
            $serie = implode($serie);
            $ecole = $_POST['ecole'];
            $logo = $_FILES['logo_profile'];
            $logo_name = $logo['name'];      //nom originale du fichier
            $logo_server_space = $logo['tmp_name']; // enplacement de l'image sur le serveur 
            $logo_erreur = $logo['error']; // pour detecter les erreurs
            $chemin_finale = null;
                    // vérification si il y'a pas eu d'errur lors du transfert de l'image
                if($logo_erreur === 0){
                    $receive_folders = "app/profiles/"; // le dossier qui recevra le fichier
                    $logo_extension = strtolower(pathinfo($logo_name,PATHINFO_EXTENSION)); // récupération de son extension
                    $new_logo_name = uniqid('img_',true).'.'.$logo_extension;
                    $chemin_finale = $receive_folders.$new_logo_name;

                        // déplacement du fichier dans le dossier finale
                    move_uploaded_file($logo_server_space,$chemin_finale);
                    $_SESSION['profil'] = $chemin_finale;
                }

            try{
                $select_school = $pdo->prepare("SELECT id  FROM etablissement WHERE school_name = :ecole");
                $select_school->execute(["ecole"=>$ecole]);
                $etabissement = $select_school->fetch(PDO::FETCH_ASSOC);
                if($etabissement){
                    $etablissement_id = $etabissement["id"];
                }else{
                    echo "<script> alert('etablissement $ecole non trouvé')</script>";
                }
            }catch(PDOException $e){
                die("Erreur sur la ligne ".$e->getLine().":".$e->getMessage());
            }
            try {
                $requette_user = $pdo->prepare("INSERT INTO user (full_name,pass_word,email,telephone,statut,etablissement_id,profil,serie) VALUES (:nom,:mot_de_passe,:email,:telephone,:statut,:etablissement_id,:chemin,:serie)");
                $requette_user->execute(array(
                    "nom" => $nom,
                    "mot_de_passe" => $mot_de_passe,
                    "email" => $email,
                    "telephone" => $telephone,
                    "statut" => $statut,
                    "etablissement_id"=>$etablissement_id,
                    'chemin'=>$chemin_finale,
                    "serie"=>$serie
                ));
                if($statut === "Administrareur" || $statut === "Élève"){
                    header('location: connexion.php');
                }else if($statut === "Professeur"){
                    header("location: ../app/matière_prof.php");
                }
                exit();

            } catch (PDOException $e) {
                // Affiche l'erreur précise de MySQL à l'écran
                die("Erreur SQL : " . $e->getMessage());
            }
        }else{
            echo " <script> alert('Echec!!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/header_responsive copy.css">
    <link rel="stylesheet" href="css/inscription.css">
</head>
<body>
     <header>
        <?php require_once("header.php") ?>
     </header>
     <main>

        <h1>Inscrivez vous</h1><br>
               <form action="" method="post" enctype="multipart/form-data">
                    <div class="parent" id="div_1">
                        <fieldset>
                            <legend align="center">ETAPE <span style="color: gold;">1</span>/3</legend>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Nom complet :</td>
                                        <td><input type="text" name="nom" id="nom_utilisateur" placeholder="nom d'utilisateur" required></td>
                                    </tr>
                                    <tr>
                                        <td>mot de pass :</td>
                                        <td><input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="mot de passe" required  title="un numéro camerounais"></td>
                                    </tr>
                                    <tr>
                                        <td>mot de pass :</td>
                                        <td><input type="password" id="password_verif" placeholder="confirmer le mot de passe" required></td>
                                    </tr>
                                    <tr>
                                    <td colspan="2" align="center"><input type="button" value="SUIVANT" id="suivant_1"></td> 
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                    </div>


                    <div class="parent div_2" id="div_2">
                        
                        <fieldset>
                            <legend align="center">ETAPE <span style="color: gold;">2</span>/3</legend>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Adresse :</td>
                                        <td><input type="email" name="email" id="email_utilisateur" placeholder="votre adresse mail" required></td>
                                    </tr>
                                    <tr>
                                      <td>Téléphone :</td>
                                        <td><input type="tel" pattern="[0-9]{9}" name="telephone" id="numéro_de_telephone" placeholder="votre numéro de téléphone" required  title="un numéro camerounais"></td>
                                    </tr>
                                    <tr>
                                        <td>Statut :</td>
                                        <td>
                                            <select name="statut" id="statut" autofocus required>
                                                <option value="Administrareur">Administrareur</option>
                                                <option value="Élève">élève</option>
                                                <option value="Professeur">Professeur</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td><button type="button" class="retour" id="return_1">RETOUR</button></td> 
                                    <td>
                                        <input type="button" value="SUIVANT" id="suivant_2"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset><br><br>
                    </div><br><br>


                    <div class="parent div_3" id="div_3">
                        <fieldset>
                            <legend align="center">ETAPE <span style="color: gold;">3</span>/3</legend>
                            <table>
                                <tbody>eleve
                                    <tr id="profile_input">
                                        <td>choisir une photo de Profile</td>
                                        <td><input type="file" accept="image/*" name="logo_profile" id="logo_profile_input" required></td>
                                    </tr>
                                    <tr id="image_de_profile" style="display: none;" >
                                        <td colspan="2" align="center">
                                            <img src="" alt="" id="logo_profile" style="height: 100px;  object-fit: cover;width: 100px; border-radius: 50%;"><br>
                                            <strong id="nom_de_l_utilisateur"></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Etablissement :</td>
                                        <td>
                                            <select name="ecole" id="ecole" style="color: black;">
                                                <option value="" disabled>choisir une école</option>
                                                <option value="CEFTI">CEFTI</option>
                                                <option value="RAPHA">RAPHA</option>
                                            </select>
                                        </td>
                                    </tr> 
                                    <tr class="serie">
                                        <td>Séries :</td>
                                        <td>   
                                            <select name="serie[]"  id="require" required  class="select" size="2" style="color: black" multiple>
                                                <option value="Generale">Generale</option>
                                                <option value="Technique">Technique</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <td><br>
                                        <button type="button" class="retour" id="return_2" style="margin-top: 20px;">RETOUR</button><br>
                                    </td>
                                        <td>
                                            <input type="submit" name="submit" value="TERMINER" style="margin-top: 30px;">
                                        </td> 
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                    </div>
               </form><br>
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
    <script src="JS/inscription.js"></script>
</body>
</body>
</html>