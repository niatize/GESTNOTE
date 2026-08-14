<?php
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
            isset($_POST['serie']) && 
            isset($_POST['classes']) &&
            isset($_POST['ecole']) &&
            isset($_FILES['logo_profile']))
    {
        if(
            !empty($_POST['nom']) &&
            !empty($_POST['mot_de_passe']) && 
            !empty($_POST['email']) && 
            !empty($_POST['telephone']) && 
            !empty($_POST['statut']) && 
            !empty($_POST['ecole']) && 
            !empty($_POST['serie']) && 
            !empty($_POST['classes'])&&
            !empty($_POST['ecole']) &&
            !empty($_FILES['logo_profile']))
        {
            $nom =  $_POST['nom'];
            $mot_de_passe = password_hash($_POST['mot_de_passe'],PASSWORD_DEFAULT);
            $email =   $_POST['email'];
            $telephone =   $_POST['telephone'];
            $statut =   $_POST['statut'];
            $ecole =   $_POST['ecole'];
            $serie =   $_POST['serie'];
            $classes =   $_POST['classes'];
            $ecole = $_POST['ecole'];
            $logo = $_FILES['logo_profile'];
            $logo_name = $logo['name'];      //nom originale du fichier
            $logo_server_space = $logo['tmp_name']; // enplacement de l'image sur le serveur 
            $logo_erreur = $logo['error']; // pour detecter les erreurs
            $chemin_finale = null;
                    // vérification si il y'a pas eu d'errur lors du transfert de l'image
                if($logo_erreur === 0){
                    $receive_folders = "profiles/"; // le dossier qui recevra le fichier
                    $logo_extension = strtolower(pathinfo($logo_name,PATHINFO_EXTENSION)); // récupération de son extension
                    $new_logo_name = uniqid('img_',true).'.'.$logo_extension;
                    $chemin_finale = $receive_folders.$new_logo_name;

                        // déplacement du fichier dans le dossier finale
                    move_uploaded_file($logo_server_space,$chemin_finale);
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
                $requette_user = $pdo->prepare("INSERT INTO user (full_name, pass_word, email, telephone, statut, serie, classes,etablissement_id,profil) VALUES (:nom, :mot_de_passe, :email, :telephone, :statut, :serie, :classes,:etablissement_id,:chemin)");
                $requette_user->execute(array(
                    "nom" => $nom,
                    "mot_de_passe" => $mot_de_passe,
                    "email" => $email,
                    "telephone" => $telephone,
                    "statut" => $statut,
                    "serie" => $serie,
                    "classes" => $classes,
                    "etablissement_id"=>$etablissement_id,
                    'chemin'=>$chemin_finale
                ));

                header('location: app/acceuil_app.php');
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
                                <tbody>
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
                                                <option value="Industriel">Technique</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="serie" style="position: relative;top:0">
                                        <td>Classes en suivis :</td>
                                        <td ><input type="text" name="classes"id="classe" title="Selectionner la liste de vos classes dont vous enseiger" class="select" required placeholder="cliquer ici pour selectionner la classe">
                                        <div class="div" id="select_div" style="display: none;">
                                                    <div class="seach">
                                                        <input type="search" id="seach_button" class="input_search" placeholder="Rechercher..." list="sections_options">
                                                        <button class="input_submit"type="button" id="seach_submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search"><path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/></svg></button>
                                                        <!-- mes datelist pour rechercher des classes -->
                                                        <!-- Datalist principale -->
                                                        <datalist id="sections_options">
                                                            <!-- Enseignement Général -->
                                                            <option value="sixieme"></option>
                                                            <option value="cinquieme">Cinquième génerale</option>
                                                            
                                                            <option value="quatrieme_allemand">Quatrième - Allemand</option>
                                                            <option value="quatrieme_espagnol">Quatrième - Espagnol</option>
                                                            <option value="quatrieme_chinois">Quatrième - Chinois</option>
                                                            <option value="quatrieme_arabe">Quatrième - Arabe</option>
                                                            
                                                            <option value="troisieme_allemand">Troisième - Allemand</option>
                                                            <option value="troisieme_espagnol">Troisième - Espagnol</option>
                                                            <option value="troisieme_chinois">Troisième - Chinois</option>
                                                            <option value="troisieme_arabe">Troisième - Arabe</option>

                                                            <option value="seconde_a1">Seconde A1 (Lettres, Latin et Grec)</option>
                                                            <option value="seconde_a2">Seconde A2 (Lettres, Latin et LV2)</option>
                                                            <option value="seconde_a3">Seconde A3 (Lettres et Latin)</option>
                                                            <option value="seconde_a4_allemand">Seconde A4 - Allemand</option>
                                                            <option value="seconde_a4_espagnol">Seconde A4 - Espagnol</option>
                                                            <option value="seconde_a4_chinois">Seconde A4 - Chinois</option>
                                                            <option value="seconde_a4_arabe">Seconde A4 - Arabe</option>
                                                            <option value="seconde_c">Seconde C (Mathématiques et Physique-Chimie)</option>
                                                            <option value="seconde_d">Seconde D (Mathématiques et S.V.T.)</option>
                                                            <option value="seconde_sh">Seconde SH (Sciences Humaines)</option>
                                                            <option value="seconde_ac">Seconde AC (Arts Cinématographiques)</option>

                                                            <option value="premiere_a1">Première A1 (Lettres, Latin et Grec)</option>
                                                            <option value="premiere_a2">Première A2 (Lettres, Latin et LV2)</option>
                                                            <option value="premiere_a3">Première A3 (Lettres et Latin)</option>
                                                            <option value="premiere_a4_allemand">Première A4 - Allemand</option>
                                                            <option value="premiere_a4_espagnol">Première A4 - Espagnol</option>
                                                            <option value="premiere_a4_chinois">Première A4 - Chinois</option>
                                                            <option value="premiere_a4_arabe">Première A4 - Arabe</option>
                                                            <option value="premiere_a5">Première A5 (Langues Vivantes II et III)</option>
                                                            <option value="premiere_abi">Première ABI (Lettres Bilingues)</option>
                                                            <option value="premiere_c">Première C (Mathématiques et Physique-Chimie)</option>
                                                            <option value="premiere_d">Première D (Mathématiques et S.V.T.)</option>
                                                            <option value="premiere_ti">Première TI (Technologie de l'Information)</option>
                                                            <option value="premiere_sh">Première SH (Sciences Humaines)</option>
                                                            <option value="premiere_ac">Première AC (Arts Cinématographiques)</option>

                                                            <option value="terminale_a1">Terminale A1 (Lettres, Latin et Grec)</option>
                                                            <option value="terminale_a2">Terminale A2 (Lettres, Latin et LV2)</option>
                                                            <option value="terminale_a3">Terminale A3 (Lettres et Latin)</option>
                                                            <option value="terminale_a4_allemand">Terminale A4 - Allemand</option>
                                                            <option value="terminale_a4_espagnol">Terminale A4 - Espagnol</option>
                                                            <option value="terminale_a4_chinois">Terminale A4 - Chinois</option>
                                                            <option value="terminale_a4_arabe">Terminale A4 - Arabe</option>
                                                            <option value="terminale_a5">Terminale A5 (Langues Vivantes II et III)</option>
                                                            <option value="terminale_abi">Terminale ABI (Lettres Bilingues)</option>
                                                            <option value="terminale_c">Terminale C (Mathématiques et Physique-Chimie)</option>
                                                            <option value="terminale_d">Terminale D (Mathématiques et S.V.T.)</option>
                                                            <option value="terminale_ti">Terminale TI (Technologie de l'Information)</option>
                                                            <option value="terminale_sh">Terminale SH (Sciences Humaines)</option>
                                                            <option value="terminale_ac">Terminale AC (Arts Cinématographiques)</option>

                                                            <!-- Enseignement Technique -->
                                                            <option value="premiere_annee_maco">1ère année MACO</option>
                                                            <option value="deuxieme_annee_maco">2ème année MACO</option>
                                                            <option value="troisieme_annee_maco">3ème année MACO</option>
                                                            <option value="quatrieme_annee_maco">4ème année MACO</option>

                                                            <option value="premiere_annee_electricite">1ère année Électricité</option>
                                                            <option value="deuxieme_annee_electricite">2ème année Électricité</option>
                                                            <option value="troisieme_annee_electricite">3ème année Électricité</option>
                                                            <option value="quatrieme_annee_electricite">4ème année Électricité</option>

                                                            <option value="premiere_annee_menuiserie">1ère année Menuiserie</option>
                                                            <option value="deuxieme_annee_menuiserie">2ème année Menuiserie</option>
                                                            <option value="troisieme_annee_menuiserie">3ème année Menuiserie</option>
                                                            <option value="quatrieme_annee_menuiserie">4ème année Menuiserie</option>

                                                            <option value="premiere_annee_froid">1ère année Froid</option>
                                                            <option value="deuxieme_annee_froid">2ème année Froid</option>
                                                            <option value="troisieme_annee_froid">3ème année Froid</option>
                                                            <option value="quatrieme_annee_froid">4ème année Froid</option>

                                                            <option value="premiere_annee_esf">1ère année ESF</option>
                                                            <option value="deuxieme_annee_esf">2ème année ESF</option>
                                                            <option value="troisieme_annee_esf">3ème année ESF</option>
                                                            <option value="quatrieme_annee_esf">4ème année ESF</option>

                                                            <option value="seconde_f1">Seconde F1</option>
                                                            <option value="seconde_f2">Seconde F2</option>
                                                            <option value="seconde_f3">Seconde F3</option>
                                                            <option value="seconde_f4">Seconde F4</option>
                                                            <option value="seconde_f5">Seconde F5</option>
                                                            <!-- Seconde -->
                                                            <option value="seconde_g1">Seconde G1</option>
                                                            <option value="seconde_g2">Seconde G2</option>
                                                            <option value="seconde_g3">Seconde G3</option>
                                                            <option value="seconde_esf">Seconde ESF</option>
                                                            <option value="seconde_ch">Seconde CH</option>

                                                            <!-- Première -->
                                                            <option value="premiere_f1">Première F1</option>
                                                            <option value="premiere_f2">Première F2</option>
                                                            <option value="premiere_f3">Première F3</option>
                                                            <option value="premiere_f4">Première F4</option>
                                                            <option value="premiere_f5">Première F5</option>
                                                            <option value="premiere_g1">Première G1</option>
                                                            <option value="premiere_g2">Première G2</option>
                                                            <option value="premiere_g3">Première G3</option>
                                                            <option value="premiere_esf">Première ESF</option>
                                                            <option value="premiere_ch">Première CH</option>

                                                            <!-- Terminale -->
                                                            <option value="terminale_f1">Terminale F1</option>
                                                            <option value="terminale_f2">Terminale F2</option>
                                                            <option value="terminale_f3">Terminale F3</option>
                                                            <option value="terminale_f4">Terminale F4</option>
                                                            <option value="terminale_f5">Terminale F5</option>
                                                            <option value="terminale_g1">Terminale G1</option>
                                                            <option value="terminale_g2">Terminale G2</option>
                                                            <option value="terminale_g3">Terminale G3</option>
                                                            <option value="terminale_esf">Terminale ESF</option>
                                                            <option value="terminale_ch">Terminale CH</option>
                                                        </datalist>
                                                        <button id="accept" type="button">OK</button>
                                                    </div>
                                                    <section id="generale">
                                                            <!-- Premier Cycle -->
                                                            <section id="sixieme">
                                                                <input type="checkbox" class="generale_check" id="input_sixieme" value="sixieme">
                                                                <label for="input_sixieme">Sixième génerale</label>
                                                            </section>
                                                            
                                                            <section id="cinquieme">
                                                                <input type="checkbox" class="generale_check" id="input_cinquieme" value="cinquieme">
                                                                <label for="input_cinquieme">Cinquième génerale</label>
                                                            </section>
                                                            
                                                            <!-- Quatrième : Options de Langues Vivantes II et III -->
                                                            <section id="quatrieme_allemand">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_allemand" value="quatrieme_allemand">
                                                                <label for="input_quatrieme_allemand">Quatrième - Allemand</label>
                                                            </section>
                                                            <section id="quatrieme_espagnol">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_espagnol" value="quatrieme_espagnol">
                                                                <label for="input_quatrieme_espagnol">Quatrième - Espagnol</label>
                                                            </section>
                                                            <section id="quatrieme_chinois">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_chinois" value="quatrieme_chinois">
                                                                <label for="input_quatrieme_chinois">Quatrième - Chinois</label>
                                                            </section>
                                                            <section id="quatrieme_arabe">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_arabe" value="quatrieme_arabe">
                                                                <label for="input_quatrieme_arabe">Quatrième - Arabe</label>
                                                            </section>
                                                            
                                                            <!-- Troisième : Options de Langues Vivantes II et III -->
                                                            <section id="troisieme_allemand">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_allemand" value="troisieme_allemand">
                                                                <label for="input_troisieme_allemand">Troisième - Allemand</label>
                                                            </section>
                                                            <section id="troisieme_espagnol">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_espagnol" value="troisieme_espagnol">
                                                                <label for="input_troisieme_espagnol">Troisième - Espagnol</label>
                                                            </section>
                                                            <section id="troisieme_chinois">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_chinois" value="troisieme_chinois">
                                                                <label for="input_troisieme_chinois">Troisième - Chinois</label>
                                                            </section>
                                                            <section id="troisieme_arabe">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_arabe" value="troisieme_arabe">
                                                                <label for="input_troisieme_arabe">Troisième - Arabe</label>
                                                            </section>

                                                            <!-- Second Cycle : Seconde (Séries complètes officielles au Cameroun) -->
                                                            <section id="seconde_a1">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_a1" value="seconde_a1">
                                                                <label for="input_seconde_a1">Seconde A1 (Lettres, Latin et Grec)</label>
                                                            </section>
                                                            <section id="seconde_a2">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_a2" value="seconde_a2">
                                                                <label for="input_seconde_a2">Seconde A2 (Lettres, Latin et LV2)</label>
                                                            </section>
                                                            <section id="seconde_a3">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_a3" value="seconde_a3">
                                                                <label for="input_seconde_a3">Seconde A3 (Lettres et Latin)</label>
                                                            </section>
                                                            <section id="seconde_a4_allemand">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_a4_allemand" value="seconde_a4_allemand">
                                                                <label for="input_seconde_a4_allemand">Seconde A4 - Allemand</label>
                                                            </section>
                                                            <section id="seconde_a4_espagnol">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_a4_espagnol" value="seconde_a4_espagnol">
                                                                <label for="input_seconde_a4_espagnol">Seconde A4 - Espagnol</label>
                                                            </section>
                                                            <section id="seconde_a4_chinois">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_a4_chinois" value="seconde_a4_chinois">
                                                                <label for="input_seconde_a4_chinois">Seconde A4 - Chinois</label>
                                                            </section>
                                                            <section id="seconde_a4_arabe">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_a4_arabe" value="seconde_a4_arabe">
                                                                <label for="input_seconde_a4_arabe">Seconde A4 - Arabe</label>
                                                            </section>
                                                            <section id="seconde_c">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_c" value="seconde_c">
                                                                <label for="input_seconde_c">Seconde C (Mathématiques et Physique-Chimie)</label>
                                                            </section>
                                                            <section id="seconde_d">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_d" value="seconde_d">
                                                                <label for="input_seconde_d">Seconde D (Mathématiques et S.V.T.)</label>
                                                            </section>
                                                            <section id="seconde_sh">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_sh" value="seconde_sh">
                                                                <label for="input_seconde_sh">Seconde SH (Sciences Humaines)</label>
                                                            </section>
                                                            <section id="seconde_ac">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_ac" value="seconde_ac">
                                                                <label for="input_seconde_ac">Seconde AC (Arts Cinématographiques)</label>
                                                            </section>

                                                            <!-- Second Cycle : Première -->
                                                            <section id="premiere_a1">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_a1" value="premiere_a1">
                                                                <label for="input_premiere_a1">Première A1 (Lettres, Latin et Grec)</label>
                                                            </section>
                                                            <section id="premiere_a2">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_a2" value="premiere_a2">
                                                                <label for="input_premiere_a2">Première A2 (Lettres, Latin et LV2)</label>
                                                            </section>
                                                            <section id="premiere_a3">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_a3" value="premiere_a3">
                                                                <label for="input_premiere_a3">Première A3 (Lettres et Latin)</label>
                                                            </section>
                                                            <section id="premiere_a4_allemand">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_a4_allemand" value="premiere_a4_allemand">
                                                                <label for="input_premiere_a4_allemand">Première A4 - Allemand</label>
                                                            </section>
                                                            <section id="premiere_a4_espagnol">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_a4_espagnol" value="premiere_a4_espagnol">
                                                                <label for="input_premiere_a4_espagnol">Première A4 - Espagnol</label>
                                                            </section>
                                                            <section id="premiere_a4_chinois">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_a4_chinois" value="premiere_a4_chinois">
                                                                <label for="input_premiere_a4_chinois">Première A4 - Chinois</label>
                                                            </section>
                                                            <section id="premiere_a4_arabe">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_a4_arabe" value="premiere_a4_arabe">
                                                                <label for="input_premiere_a4_arabe">Première A4 - Arabe</label>
                                                            </section>
                                                            <section id="premiere_a5">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_a5" value="premiere_a5">
                                                                <label for="input_premiere_a5">Première A5 (Langues Vivantes II et III)</label>
                                                            </section>
                                                            <section id="premiere_abi">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_abi" value="premiere_abi">
                                                                <label for="input_premiere_abi">Première ABI (Lettres Bilingues)</label>
                                                            </section>
                                                            <section id="premiere_c">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_c" value="premiere_c">
                                                                <label for="input_premiere_c">Première C (Mathématiques et Physique-Chimie)</label>
                                                            </section>
                                                            <section id="premiere_d">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_d" value="premiere_d">
                                                                <label for="input_premiere_d">Première D (Mathématiques et S.V.T.)</label>
                                                            </section>
                                                            <section id="premiere_ti">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_ti" value="premiere_ti">
                                                                <label for="input_premiere_ti">Première TI (Technologie de l'Information)</label>
                                                            </section>
                                                            <section id="premiere_sh">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_sh" value="premiere_sh">
                                                                <label for="input_premiere_sh">Première SH (Sciences Humaines)</label>
                                                            </section>
                                                            <section id="premiere_ac">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_ac" value="premiere_ac">
                                                                <label for="input_premiere_ac">Première AC (Arts Cinématographiques)</label>
                                                            </section>

                                                            <!-- Second Cycle : Terminale -->
                                                            <section id="terminale_a1">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_a1" value="terminale_a1">
                                                                <label for="input_terminale_a1">Terminale A1 (Lettres, Latin et Grec)</label>
                                                            </section>
                                                            <section id="terminale_a2">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_a2" value="terminale_a2">
                                                                <label for="input_terminale_a2">Terminale A2 (Lettres, Latin et LV2)</label>
                                                            </section>
                                                            <section id="terminale_a3">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_a3" value="terminale_a3">
                                                                <label for="input_terminale_a3">Terminale A3 (Lettres et Latin)</label>
                                                            </section>
                                                            <section id="terminale_a4_allemand">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_a4_allemand" value="terminale_a4_allemand">
                                                                <label for="input_terminale_a4_allemand">Terminale A4 - Allemand</label>
                                                            </section>
                                                            <section id="terminale_a4_espagnol">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_a4_espagnol" value="terminale_a4_espagnol">
                                                                <label for="input_terminale_a4_espagnol">Terminale A4 - Espagnol</label>
                                                            </section>
                                                            <section id="terminale_a4_chinois">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_a4_chinois" value="terminale_a4_chinois">
                                                                <label for="input_terminale_a4_chinois">Terminale A4 - Chinois</label>
                                                            </section>
                                                            <section id="terminale_a4_arabe">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_a4_arabe" value="terminale_a4_arabe">
                                                                <label for="input_terminale_a4_arabe">Terminale A4 - Arabe</label>
                                                            </section>
                                                            <section id="terminale_a5">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_a5" value="terminale_a5">
                                                                <label for="input_terminale_a5">Terminale A5 (Langues Vivantes II et III)</label>
                                                            </section>
                                                            <section id="terminale_abi">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_abi" value="terminale_abi">
                                                                <label for="input_terminale_abi">Terminale ABI (Lettres Bilingues)</label>
                                                            </section>
                                                            <section id="terminale_c">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_c" value="terminale_c">
                                                                <label for="input_terminale_c">Terminale C (Mathématiques et Physique-Chimie)</label>
                                                            </section>
                                                            <section id="terminale_d">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_d" value="terminale_d">
                                                                <label for="input_terminale_d">Terminale D (Mathématiques et S.V.T.)</label>
                                                            </section>
                                                            <section id="terminale_ti">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_ti" value="terminale_ti">
                                                                <label for="input_terminale_ti">Terminale TI (Technologie de l'Information)</label>
                                                            </section>
                                                            <section id="terminale_sh">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_sh" value="terminale_sh">
                                                                <label for="input_terminale_sh">Terminale SH (Sciences Humaines)</label>
                                                            </section>
                                                            <section id="terminale_ac">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_ac" value="terminale_ac">
                                                                <label for="input_terminale_ac">Terminale AC (Arts Cinématographiques)</label>
                                                            </section>
                                                    </section>

                                                    <section id="technique">
                                                            <!-- Premier Cycle Technique : 1ère, 2ème, 3ème et 4ème Années par Spécialité (MACO, Électricité, etc.) -->
                                                            <!-- MACO (Maçonnerie / Construction) -->
                                                            <section id="premiere_annee_maco">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_annee_maco" value="premiere_annee_maco">
                                                                <label for="input_premiere_annee_maco">1ère année MACO</label>
                                                            </section>
                                                            <section id="deuxieme_annee_maco">
                                                                <input type="checkbox" class="generale_check" id="input_deuxieme_annee_maco" value="deuxieme_annee_maco">
                                                                <label for="input_deuxieme_annee_maco">2ème année MACO</label>
                                                            </section>
                                                            <section id="troisieme_annee_maco">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_annee_maco" value="troisieme_annee_maco">
                                                                <label for="input_troisieme_annee_maco">3ème année MACO</label>
                                                            </section>
                                                            <section id="quatrieme_annee_maco">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_annee_maco" value="quatrieme_annee_maco">
                                                                <label for="input_quatrieme_annee_maco">4ème année MACO</label>
                                                            </section>

                                                            <!-- Électricité -->
                                                            <section id="premiere_annee_electricite">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_annee_electricite" value="premiere_annee_electricite">
                                                                <label for="input_premiere_annee_electricite">1ère année Électricité</label>
                                                            </section>
                                                            <section id="deuxieme_annee_electricite">
                                                                <input type="checkbox" class="generale_check" id="input_deuxieme_annee_electricite" value="deuxieme_annee_electricite">
                                                                <label for="input_deuxieme_annee_electricite">2ème année Électricité</label>
                                                            </section>
                                                            <section id="troisieme_annee_electricite">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_annee_electricite" value="troisieme_annee_electricite">
                                                                <label for="input_troisieme_annee_electricite">3ème année Électricité</label>
                                                            </section>
                                                            <section id="quatrieme_annee_electricite">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_annee_electricite" value="quatrieme_annee_electricite">
                                                                <label for="input_quatrieme_annee_electricite">4ème année Électricité</label>
                                                            </section>

                                                            <!-- Menuiserie -->
                                                            <section id="premiere_annee_menuiserie">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_annee_menuiserie" value="premiere_annee_menuiserie">
                                                                <label for="input_premiere_annee_menuiserie">1ère année Menuiserie</label>
                                                            </section>
                                                            <section id="deuxieme_annee_menuiserie">
                                                                <input type="checkbox" class="technique_check" id="input_deuxieme_annee_menuiserie" value="deuxieme_annee_menuiserie">
                                                                <label for="input_deuxieme_annee_menuiserie">2ème année Menuiserie</label>
                                                            </section>
                                                            <section id="troisieme_annee_menuiserie">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_annee_menuiserie" value="troisieme_annee_menuiserie">
                                                                <label for="input_troisieme_annee_menuiserie">3ème année Menuiserie</label>
                                                            </section>
                                                            <section id="quatrieme_annee_menuiserie">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_annee_menuiserie" value="quatrieme_annee_menuiserie">
                                                                <label for="input_quatrieme_annee_menuiserie">4ème année Menuiserie</label>
                                                            </section>

                                                            <!-- Froid et Climatisation -->
                                                            <section id="premiere_annee_froid">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_annee_froid" value="premiere_annee_froid">
                                                                <label for="input_premiere_annee_froid">1ère année Froid</label>
                                                            </section>
                                                            <section id="deuxieme_annee_froid">
                                                                <input type="checkbox" class="generale_check" id="input_deuxieme_annee_froid" value="deuxieme_annee_froid">
                                                                <label for="input_deuxieme_annee_froid">2ème année Froid</label>
                                                            </section>
                                                            <section id="troisieme_annee_froid">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_annee_froid" value="troisieme_annee_froid">
                                                                <label for="input_troisieme_annee_froid">3ème année Froid</label>
                                                            </section>
                                                            <section id="quatrieme_annee_froid">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_annee_froid" value="quatrieme_annee_froid">
                                                                <label for="input_quatrieme_annee_froid">4ème année Froid</label>
                                                            </section>

                                                            <!-- ESF (Économie Sociale et Familiale) -->
                                                            <section id="premiere_annee_esf">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_annee_esf" value="premiere_annee_esf">
                                                                <label for="input_premiere_annee_esf">1ère année ESF</label>
                                                            </section>
                                                            <section id="deuxieme_annee_esf">
                                                                <input type="checkbox" class="generale_check" id="input_deuxieme_annee_esf" value="deuxieme_annee_esf">
                                                                <label for="input_deuxieme_annee_esf">2ème année ESF</label>
                                                            </section>
                                                            <section id="troisieme_annee_esf">
                                                                <input type="checkbox" class="generale_check" id="input_troisieme_annee_esf" value="troisieme_annee_esf">
                                                                <label for="input_troisieme_annee_esf">3ème année ESF</label>
                                                            </section>
                                                            <section id="quatrieme_annee_esf">
                                                                <input type="checkbox" class="generale_check" id="input_quatrieme_annee_esf" value="quatrieme_annee_esf">
                                                                <label for="input_quatrieme_annee_esf">4ème année ESF</label>
                                                            </section>

                                                            <!-- Second Cycle Technique : Seconde F... -->
                                                            <section id="seconde_f1">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_f1" value="seconde_f1">
                                                                <label for="input_seconde_f1">Seconde F1</label>
                                                            </section>
                                                            <section id="seconde_f2">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_f2" value="seconde_f2">
                                                                <label for="input_seconde_f2">Seconde F2</label>
                                                            </section>
                                                            <section id="seconde_f3">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_f3" value="seconde_f3">
                                                                <label for="input_seconde_f3">Seconde F3</label>
                                                            </section>
                                                            <section id="seconde_f4">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_f4" value="seconde_f4">
                                                                <label for="input_seconde_f4">Seconde F4</label>
                                                            </section>
                                                            <section id="seconde_f5">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_f5" value="seconde_f5">
                                                                <label for="input_seconde_f5">Seconde F5</label>
                                                            </section>
                                                            <section id="seconde_g1">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_g1" value="seconde_g1">
                                                                <label for="input_seconde_g1">Seconde G1</label>
                                                            </section>
                                                            <section id="seconde_g2">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_g2" value="seconde_g2">
                                                                <label for="input_seconde_g2">Seconde G2</label>
                                                            </section>
                                                            <section id="seconde_g3">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_g3" value="seconde_g3">
                                                                <label for="input_seconde_g3">Seconde G3</label>
                                                            </section>
                                                            <section id="seconde_esf">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_esf" value="seconde_esf">
                                                                <label for="input_seconde_esf">Seconde ESF</label>
                                                            </section>
                                                            <section id="seconde_ch">
                                                                <input type="checkbox" class="generale_check" id="input_seconde_ch" value="seconde_ch">
                                                                <label for="input_seconde_ch">Seconde CH</label>
                                                            </section>

                                                            <!-- Second Cycle Technique : Première F... -->
                                                            <section id="premiere_f1">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_f1" value="premiere_f1">
                                                                <label for="input_premiere_f1">Première F1</label>
                                                            </section>
                                                            <section id="premiere_f2">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_f2" value="premiere_f2">
                                                                <label for="input_premiere_f2">Première F2</label>
                                                            </section>
                                                            <section id="premiere_f3">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_f3" value="premiere_f3">
                                                                <label for="input_premiere_f3">Première F3</label>
                                                            </section>
                                                            <section id="premiere_f4">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_f4" value="premiere_f4">
                                                                <label for="input_premiere_f4">Première F4</label>
                                                            </section>
                                                            <section id="premiere_f5">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_f5" value="premiere_f5">
                                                                <label for="input_premiere_f5">Première F5</label>
                                                            </section>
                                                            <section id="premiere_g1">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_g1" value="premiere_g1">
                                                                <label for="input_premiere_g1">Première G1</label>
                                                            </section>
                                                            <section id="premiere_g2">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_g2" value="premiere_g2">
                                                                <label for="input_premiere_g2">Première G2</label>
                                                            </section>
                                                            <section id="premiere_g3">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_g3" value="premiere_g3">
                                                                <label for="input_premiere_g3">Première G3</label>
                                                            </section>
                                                            <section id="premiere_esf">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_esf" value="premiere_esf">
                                                                <label for="input_premiere_esf">Première ESF</label>
                                                            </section>
                                                            <section id="premiere_ch">
                                                                <input type="checkbox" class="generale_check" id="input_premiere_ch" value="premiere_ch">
                                                                <label for="input_premiere_ch">Première CH</label>
                                                            </section>

                                                            <!-- Second Cycle Technique : Terminale F... -->
                                                            <section id="terminale_f1">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_f1" value="terminale_f1">
                                                                <label for="input_terminale_f1">Terminale F1</label>
                                                            </section>
                                                            <section id="terminale_f2">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_f2" value="terminale_f2">
                                                                <label for="input_terminale_f2">Terminale F2</label>
                                                            </section>
                                                            <section id="terminale_f3">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_f3" value="terminale_f3">
                                                                <label for="input_terminale_f3">Terminale F3</label>
                                                            </section>
                                                            <section id="terminale_f4">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_f4" value="terminale_f4">
                                                                <label for="input_terminale_f4">Terminale F4</label>
                                                            </section>
                                                            <section id="terminale_f5">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_f5" value="terminale_f5">
                                                                <label for="input_terminale_f5">Terminale F5</label>
                                                            </section>
                                                            <section id="terminale_g1">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_g1" value="terminale_g1">
                                                                <label for="input_terminale_g1">Terminale G1</label>
                                                            </section>
                                                            <section id="terminale_g2">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_g2" value="terminale_g2">
                                                                <label for="input_terminale_g2">Terminale G2</label>
                                                            </section>
                                                            <section id="terminale_g3">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_g3" value="terminale_g3">
                                                                <label for="input_terminale_g3">Terminale G3</label>
                                                            </section>
                                                            <section id="terminale_esf">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_esf" value="terminale_esf">
                                                                <label for="input_terminale_esf">Terminale ESF</label>
                                                            </section>
                                                            <section id="terminale_ch">
                                                                <input type="checkbox" class="generale_check" id="input_terminale_ch" value="terminale_ch">
                                                                <label for="input_terminale_ch">Terminale CH</label>
                                                            </section>
                                                    </section>
                                        </div>
                                        </td>
                                    </tr> 
                                    <tr class="serie" style="position: relative;top:0">
                                        <td>Matières enseignées :</td>
                                        <td>
                                            <input type="text" name="matieres" id="matiere" title="Sélectionner la liste de vos matières enseignées" class="select" required placeholder="Cliquer ici pour sélectionner les matières">
                                            <div class="div" id="select_div_matiere" style="display: none;">
                                                <div class="seach">
                                                    <input type="search" id="search_button_matiere" class="input_search" placeholder="Rechercher une matière..." list="matieres_options">
                                                    <button class="input_submit" type="button" id="search_submit_matiere">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search-icon lucide-search">
                                                            <path d="m21 21-4.34-4.34"/><circle cx="11" cy="11" r="8"/>
                                                        </svg>
                                                    </button>
                                                    
                                                    <!-- Datalist principale des matières -->
                                                    <datalist id="matieres_options">
                                                        <!-- Enseignement Général : Sciences & Littérature -->
                                                        <option value="mathematiques">Mathématiques</option>
                                                        <option value="physique">Physique</option>
                                                        <option value="chimie">Chimie</option>
                                                        <option value="svteehb">SVT / EEHB (Sciences de la Vie et de la Terre)</option>
                                                        <option value="informatique_generale">Informatique Générale / TIC</option>
                                                        <option value="informatique_theorique">Informatique Théorique</option>
                                                        <option value="informatique_pratique">Informatique Pratique / Systèmes d'Information</option>
                                                        <option value="francais">Langue Française</option>
                                                        <option value="litterature_francaise">Littérature / Culture Générale</option>
                                                        <option value="english_language">English Language</option>
                                                        <option value="english_literature">English Literature</option>
                                                        <option value="histoire">Histoire</option>
                                                        <option value="geographie">Géographie</option>
                                                        <option value="ecm">Éducation à la Citoyenneté et à la Morale (ECM)</option>
                                                        <option value="philosophie">Philosophie</option>
                                                        <option value="allemand">Allemand (LV2)</option>
                                                        <option value="espagnol">Espagnol (LV2)</option>
                                                        <option value="chinois">Chinois (LV2 / LV3)</option>
                                                        <option value="arabe">Arabe (LV2 / LV3)</option>
                                                        <option value="italien">Italien (LV2 / LV3)</option>
                                                        <option value="latin">Latin</option>
                                                        <option value="grec">Grec</option>
                                                        <option value="langues_nationales">Langues et Cultures Nationales (LCN)</option>
                                                        <option value="eps">Éducation Physique et Sportive (EPS)</option>
                                                        <option value="arts_plastiques">Arts Plastiques / Dessin</option>
                                                        <option value="arts_cinematographiques">Arts Cinématographiques</option>
                                                        <option value="musique">Éducation Musicale</option>

                                                        <!-- Enseignement Technique Commercial & Gestion -->
                                                        <option value="comptabilite_generale">Comptabilité Générale / Financière</option>
                                                        <option value="comptabilite_analytique">Comptabilité Analytique</option>
                                                        <option value="gestion_financiere">Gestion Financière</option>
                                                        <option value="bureautique_steno">Bureautique / Sténotypie</option>
                                                        <option value="correspondance_commerciale">Correspondance Commerciale</option>
                                                        <option value="organisation_administrative">Organisation Administrative / Secrétariat</option>

                                                        <!-- Enseignement Technique Industriel -->
                                                        <option value="mecanique_appliquee">Mécanique Appliquée</option>
                                                        <option value="dessin_technique">Dessin Technique / Schéma</option>
                                                        <option value="electrotechnique">Électrotechnique</option>
                                                        <option value="electronique">Électronique</option>
                                                        <option value="automatisme">Automatisme / Régulation</option>
                                                        <option value="thermodynamique_froid">Thermodynamique / Froid & Climatisation</option>
                                                        <option value="technologie_construction">Technologie de Construction / Bâtiment</option>
                                                        <option value="resistance_materiaux">Résistance des Matériaux (RDM)</option>

                                                        <!-- Sciences Sociales & Économiques -->
                                                        <option value="economie_generale">Économie Générale</option>
                                                        <option value="economie_entreprise">Économie d'Entreprise / Organisation</option>
                                                        <option value="droit_travail">Droit Général et du Travail</option>
                                                        <option value="esf_couture">Économie Sociale et Familiale / Couture</option>
                                                        <option value="puericulture_nutrition">Puériculture et Nutrition</option>
                                                    </datalist>
                                                    <button id="accept_matiere" type="button">OK</button>
                                                </div>

                                                <section id="liste_matieres">
                                                    <!-- Enseignement Général : Sciences & Mathématiques -->
                                                    <section id="sec_mathematiques">
                                                        <input type="checkbox" class="matiere_check" id="input_mathematiques" value="mathematiques">
                                                        <label for="input_mathematiques">Mathématiques</label>
                                                    </section>

                                                    <section id="sec_physique">
                                                        <input type="checkbox" class="matiere_check" id="input_physique" value="physique">
                                                        <label for="input_physique">Physique</label>
                                                    </section>

                                                    <section id="sec_chimie">
                                                        <input type="checkbox" class="matiere_check" id="input_chimie" value="chimie">
                                                        <label for="input_chimie">Chimie</label>
                                                    </section>

                                                    <section id="sec_svteehb">
                                                        <input type="checkbox" class="matiere_check" id="input_svteehb" value="svteehb">
                                                        <label for="input_svteehb">SVT / EEHB (Sciences de la Vie et de la Terre)</label>
                                                    </section>

                                                    <!-- Informatique & Technologies -->
                                                     <section id="sec_technologie_information">
                                                        <input type="checkbox" class="matiere_check" id="input_technologie_information" value="technologie_information">
                                                        <label for="input_technologie_information">Technologie de l'Information (TI)</label>
                                                    </section>

                                                    <!-- Langues & Littérature -->
                                                    <section id="sec_francais">
                                                        <input type="checkbox" class="matiere_check" id="input_francais" value="francais">
                                                        <label for="input_francais">Langue Française</label>
                                                    </section>

                                                    <section id="sec_litterature_francaise">
                                                        <input type="checkbox" class="matiere_check" id="input_litterature_francaise" value="litterature_francaise">
                                                        <label for="input_litterature_francaise">Littérature / Culture Générale</label>
                                                    </section>

                                                    <section id="sec_english_language">
                                                        <input type="checkbox" class="matiere_check" id="input_english_language" value="english_language">
                                                        <label for="input_english_language">English Language</label>
                                                    </section>

                                                    <section id="sec_english_literature">
                                                        <input type="checkbox" class="matiere_check" id="input_english_literature" value="english_literature">
                                                        <label for="input_english_literature">English Literature</label>
                                                    </section>

                                                    <!-- Langues Vivantes II & Ancêtres -->
                                                    <section id="sec_allemand">
                                                        <input type="checkbox" class="matiere_check" id="input_allemand" value="allemand">
                                                        <label for="input_allemand">Allemand (LV2)</label>
                                                    </section>

                                                    <section id="sec_espagnol">
                                                        <input type="checkbox" class="matiere_check" id="input_espagnol" value="espagnol">
                                                        <label for="input_espagnol">Espagnol (LV2)</label>
                                                    </section>

                                                    <section id="sec_chinois">
                                                        <input type="checkbox" class="matiere_check" id="input_chinois" value="chinois">
                                                        <label for="input_chinois">Chinois (LV2 / LV3)</label>
                                                    </section>

                                                    <section id="sec_arabe">
                                                        <input type="checkbox" class="matiere_check" id="input_arabe" value="arabe">
                                                        <label for="input_arabe">Arabe (LV2 / LV3)</label>
                                                    </section>

                                                    <section id="sec_italien">
                                                        <input type="checkbox" class="matiere_check" id="input_italien" value="italien">
                                                        <label for="input_italien">Italien (LV2 / LV3)</label>
                                                    </section>

                                                    <section id="sec_latin">
                                                        <input type="checkbox" class="matiere_check" id="input_latin" value="latin">
                                                        <label for="input_latin">Latin</label>
                                                    </section>

                                                    <section id="sec_grec">
                                                        <input type="checkbox" class="matiere_check" id="input_grec" value="grec">
                                                        <label for="input_grec">Grec Ancienne</label>
                                                    </section>

                                                    <section id="sec_langues_nationales">
                                                        <input type="checkbox" class="matiere_check" id="input_langues_nationales" value="langues_nationales">
                                                        <label for="input_langues_nationales">Langues et Cultures Nationales (LCN)</label>
                                                    </section>

                                                    <!-- Sciences Humaines & Sociales -->
                                                    <section id="sec_histoire">
                                                        <input type="checkbox" class="matiere_check" id="input_histoire" value="histoire">
                                                        <label for="input_histoire">Histoire</label>
                                                    </section>

                                                    <section id="sec_geographie">
                                                        <input type="checkbox" class="matiere_check" id="input_geographie" value="geographie">
                                                        <label for="input_geographie">Géographie</label>
                                                    </section>

                                                    <section id="sec_ecm">
                                                        <input type="checkbox" class="matiere_check" id="input_ecm" value="ecm">
                                                        <label for="input_ecm">Éducation à la Citoyenneté et à la Morale (ECM)</label>
                                                    </section>

                                                    <section id="sec_philosophie">
                                                        <input type="checkbox" class="matiere_check" id="input_philosophie" value="philosophie">
                                                        <label for="input_philosophie">Philosophie</label>
                                                    </section>

                                                    <!-- Arts & Éducation Physique -->
                                                    <section id="sec_eps">
                                                        <input type="checkbox" class="matiere_check" id="input_eps" value="eps">
                                                        <label for="input_eps">Éducation Physique et Sportive (EPS)</label>
                                                    </section>

                                                    <section id="sec_arts_plastiques">
                                                        <input type="checkbox" class="matiere_check" id="input_arts_plastiques" value="arts_plastiques">
                                                        <label for="input_arts_plastiques">Arts Plastiques / Dessin</label>
                                                    </section>

                                                    <section id="sec_arts_cinematographiques">
                                                        <input type="checkbox" class="matiere_check" id="input_arts_cinematographiques" value="arts_cinematographiques">
                                                        <label for="input_arts_cinematographiques">Arts Cinématographiques</label>
                                                    </section>

                                                    <section id="sec_musique">
                                                        <input type="checkbox" class="matiere_check" id="input_musique" value="musique">
                                                        <label for="input_musique">Éducation Musicale</label>
                                                    </section>

                                                    <!-- Enseignement Technique Commercial (Tertiaire) -->
                                                    <section id="sec_comptabilite_generale">
                                                        <input type="checkbox" class="matiere_check" id="input_comptabilite_generale" value="comptabilite_generale">
                                                        <label for="input_comptabilite_generale">Comptabilité Générale / Financière</label>
                                                    </section>

                                                    <section id="sec_comptabilite_analytique">
                                                        <input type="checkbox" class="matiere_check" id="input_comptabilite_analytique" value="comptabilite_analytique">
                                                        <label for="input_comptabilite_analytique">Comptabilité Analytique</label>
                                                    </section>

                                                    <section id="sec_gestion_financiere">
                                                        <input type="checkbox" class="matiere_check" id="input_gestion_financiere" value="gestion_financiere">
                                                        <label for="input_gestion_financiere">Gestion Financière</label>
                                                    </section>

                                                    <section id="sec_bureautique_steno">
                                                        <input type="checkbox" class="matiere_check" id="input_bureautique_steno" value="bureautique_steno">
                                                        <label for="input_bureautique_steno">Bureautique / Sténotypie</label>
                                                    </section>

                                                    <section id="sec_correspondance_commerciale">
                                                        <input type="checkbox" class="matiere_check" id="input_correspondance_commerciale" value="correspondance_commerciale">
                                                        <label for="input_correspondance_commerciale">Correspondance Commerciale</label>
                                                    </section>

                                                    <section id="sec_organisation_administrative">
                                                        <input type="checkbox" class="matiere_check" id="input_organisation_administrative" value="organisation_administrative">
                                                        <label for="input_organisation_administrative">Organisation Administrative / Secrétariat</label>
                                                    </section>

                                                    <!-- Enseignement Technique Industriel -->
                                                    <section id="sec_mecanique_appliquee">
                                                        <input type="checkbox" class="matiere_check" id="input_mecanique_appliquee" value="mecanique_appliquee">
                                                        <label for="input_mecanique_appliquee">Mécanique Appliquée</label>
                                                    </section>

                                                    <section id="sec_dessin_technique">
                                                        <input type="checkbox" class="matiere_check" id="input_dessin_technique" value="dessin_technique">
                                                        <label for="input_dessin_technique">Dessin Technique / Schéma</label>
                                                    </section>

                                                    <section id="sec_electrotechnique">
                                                        <input type="checkbox" class="matiere_check" id="input_electrotechnique" value="electrotechnique">
                                                        <label for="input_electrotechnique">Électrotechnique</label>
                                                    </section>

                                                    <section id="sec_electronique">
                                                        <input type="checkbox" class="matiere_check" id="input_electronique" value="electronique">
                                                        <label for="input_electronique">Électronique</label>
                                                    </section>

                                                    <section id="sec_automatisme">
                                                        <input type="checkbox" class="matiere_check" id="input_automatisme" value="automatisme">
                                                        <label for="input_automatisme">Automatisme / Régulation</label>
                                                    </section>

                                                    <section id="sec_thermodynamique_froid">
                                                        <input type="checkbox" class="matiere_check" id="input_thermodynamique_froid" value="thermodynamique_froid">
                                                        <label for="input_thermodynamique_froid">Thermodynamique / Froid & Climatisation</label>
                                                    </section>

                                                    <section id="sec_technologie_construction">
                                                        <input type="checkbox" class="matiere_check" id="input_technologie_construction" value="technologie_construction">
                                                        <label for="input_technologie_construction">Technologie de Construction / Bâtiment</label>
                                                    </section>

                                                    <section id="sec_resistance_materiaux">
                                                        <input type="checkbox" class="matiere_check" id="input_resistance_materiaux" value="resistance_materiaux">
                                                        <label for="input_resistance_materiaux">Résistance des Matériaux (RDM)</label>
                                                    </section>

                                                    <!-- Droit, Économie & Métiers de la Société -->
                                                    <section id="sec_economie_generale">
                                                        <input type="checkbox" class="matiere_check" id="input_economie_generale" value="economie_generale">
                                                        <label for="input_economie_generale">Économie Générale</label>
                                                    </section>

                                                    <section id="sec_economie_entreprise">
                                                        <input type="checkbox" class="matiere_check" id="input_economie_entreprise" value="economie_entreprise">
                                                        <label for="input_economie_entreprise">Économie d'Entreprise / Organisation</label>
                                                    </section>

                                                    <section id="sec_droit_travail">
                                                        <input type="checkbox" class="matiere_check" id="input_droit_travail" value="droit_travail">
                                                        <label for="input_droit_travail">Droit Général et du Travail</label>
                                                    </section>

                                                    <section id="sec_esf_couture">
                                                        <input type="checkbox" class="matiere_check" id="input_esf_couture" value="esf_couture">
                                                        <label for="input_esf_couture">Économie Sociale et Familiale / Couture</label>
                                                    </section>

                                                    <section id="sec_puericulture_nutrition">
                                                        <input type="checkbox" class="matiere_check" id="input_puericulture_nutrition" value="puericulture_nutrition">
                                                        <label for="input_puericulture_nutrition">Puériculture et Nutrition</label>
                                                    </section>
                                                </section>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
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
    <script src="JS/inscription.js" defer></script>
</body>
</body>
</html>