
<?php
        session_start();
        include_once'../data_base.php';
        if(isset($_SESSION['name']) && !empty($_SESSION['name'])){
            $name = $_SESSION['name'];
            if(isset($_POST['classe']) && isset($_POST['matiere']) && !empty($_POST["matiere"]) && !empty($_POST["classe"])){
                $classes = $_POST['classe'];
                $matieres = $_POST['matiere'];
                $classes = implode('+ ',$classes);
                $matieres = implode('+ ',$matieres);
                try{
                    $sql = $pdo->prepare("UPDATE user SET classes = :classes, matieres = :matieres WHERE full_name = :full_name");
                    $sql->execute([
                        "classes"=>$classes,
                        "matieres"=>$matieres,
                        "full_name"=>$name
                    ]);
                    echo "<script>alert('création de compte réussis')</script>";
                    header("location: ../connexion.php");
                }catch(PDOException $e){
                    die("ERROR :  ".$e->getMessage()." ligne".$e->getLine());
                }
            }

        }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choix des classes avec matières</title>
    <link rel="stylesheet" href="css/mat_peof.css">
    <link rel="stylesheet" href="../css/header_footer.css">
    <link rel="stylesheet" href="../css/header_responsive copy.css">
</head>
<body>
    <header>
        <?php require_once'../header.php' ?>
    </header>

    <div class="container">

            <fieldset>
                <legend align="center">Entrer les classes affecté des matières a enseigner</legend>
                <form action="" method="post" style="position: relative;">
                    <table>
                            <tr class="caption">
                                <td colspan="2" align="center"><label for="add_classe" style="color: black;">Ajouter une classe ? </label><button type="button" id="add_classe" onclick="create_classe()">Ajouter</button></td>
                            </tr>
                        <tbody id="tbody">
                            <tr>
                               <td> <label for="classe_1" style=" color:black;">Classe:</label><input type="search" name="classe[]" id="classe_1"placeholder="Entrer la classe" list="classes_list" required></td>
                               <td> <label for="matière_1"style=" color:black;">Matières:</label><input type="search" name="matiere[]" id="matière_1" placeholder="Entrer les matières" class="matiere" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form_sub">
                            <td><button type="button" id="retour">RETOUT</button></td>
                            <td><button type="submit" id="enregistrer">ENREGISTRER</button></td>
                    </div>
                </form>
            </fieldset>

    </div>
    <script src="js/mat_prof.js" defer></script>
    <script src="../JS/color_pages.js"></script>
    <script src="../JS/header.js" defer></script>




























    



<datalist id="classes_list">
  <option value="Sixième">Sixième</option>
  <option value="Cinquième">Cinquième</option>
  <option value="Quatrième - Allemand">Quatrième - Allemand</option>
  <option value="Quatrième - Espagnol">Quatrième - Espagnol</option>
  <option value="Quatrième - Chinois">Quatrième - Chinois</option>
  <option value="Quatrième - Arabe">Quatrième - Arabe</option>
  <option value="Troisième - Allemand">Troisième - Allemand</option>
  <option value="Troisième - Espagnol">Troisième - Espagnol</option>
  <option value="Troisième - Chinois">Troisième - Chinois</option>
  <option value="Troisième - Arabe">Troisième - Arabe</option>
  <option value="Seconde A1">Seconde A1</option>
  <option value="Seconde A2">Seconde A2</option>
  <option value="Seconde A3">Seconde A3</option>
  <option value="Seconde A4 - Allemand">Seconde A4 - Allemand</option>
  <option value="Seconde A4 - Espagnol">Seconde A4 - Espagnol</option>
  <option value="Seconde A4 - Chinois">Seconde A4 - Chinois</option>
  <option value="Seconde A4 - Arabe">Seconde A4 - Arabe</option>
  <option value="Seconde A5">Seconde A5</option>
  <option value="Seconde C">Seconde C</option>
  <option value="Seconde D">Seconde D</option>
  <option value="Seconde SH">Seconde SH</option>
  <option value="Seconde AC">Seconde AC</option>
  <option value="Première A1">Première A1</option>
  <option value="Première A2">Première A2</option>
  <option value="Première A3">Première A3</option>
  <option value="Première A4 - Allemand">Première A4 - Allemand</option>
  <option value="Première A4 - Espagnol">Première A4 - Espagnol</option>
  <option value="Première A4 - Chinois">Première A4 - Chinois</option>
  <option value="Première A4 - Arabe">Première A4 - Arabe</option>
  <option value="Première A5">Première A5</option>
  <option value="Première ABI">Première ABI</option>
  <option value="Première C">Première C</option>
  <option value="Première D">Première D</option>
  <option value="Première TI">Première TI</option>
  <option value="Première SH">Première SH</option>
  <option value="Première AC">Première AC</option>
  <option value="Terminale A1">Terminale A1</option>
  <option value="Terminale A2">Terminale A2</option>
  <option value="Terminale A3">Terminale A3</option>
  <option value="Terminale A4 - Allemand">Terminale A4 - Allemand</option>
  <option value="Terminale A4 - Espagnol">Terminale A4 - Espagnol</option>
  <option value="Terminale A4 - Chinois">Terminale A4 - Chinois</option>
  <option value="Terminale A4 - Arabe">Terminale A4 - Arabe</option>
  <option value="Terminale A5">Terminale A5</option>
  <option value="Terminale ABI">Terminale ABI</option>
  <option value="Terminale C">Terminale C</option>
  <option value="Terminale D">Terminale D</option>
  <option value="Terminale TI">Terminale TI</option>
  <option value="Terminale SH">Terminale SH</option>
  <option value="Terminale AC">Terminale AC</option>
  <option value="1ère année MACO">1ère année MACO</option>
  <option value="2ème année MACO">2ème année MACO</option>
  <option value="3ème année MACO">3ème année MACO</option>
  <option value="4ème année MACO">4ème année MACO</option>
  <option value="1ère année Électricité">1ère année Électricité</option>
  <option value="2ème année Électricité">2ème année Électricité</option>
  <option value="3ème année Électricité">3ème année Électricité</option>
  <option value="4ème année Électricité">4ème année Électricité</option>
  <option value="1ère année Menuiserie">1ère année Menuiserie</option>
  <option value="2ème année Menuiserie">2ème année Menuiserie</option>
  <option value="3ème année Menuiserie">3ème année Menuiserie</option>
  <option value="4ème année Menuiserie">4ème année Menuiserie</option>
  <option value="1ère année Froid">1ère année Froid</option>
  <option value="2ème année Froid">2ème année Froid</option>
  <option value="3ème année Froid">3ème année Froid</option>
  <option value="4ème année Froid">4ème année Froid</option>
  <option value="1ère année ESF">1ère année ESF</option>
  <option value="2ème année ESF">2ème année ESF</option>
  <option value="3ème année ESF">3ème année ESF</option>
  <option value="4ème année ESF">4ème année ESF</option>
  <option value="Seconde F1">Seconde F1</option>
  <option value="Seconde F2">Seconde F2</option>
  <option value="Seconde F3">Seconde F3</option>
  <option value="Seconde F4">Seconde F4</option>
  <option value="Seconde F5">Seconde F5</option>
  <option value="Seconde F7">Seconde F7</option>
  <option value="Seconde G1">Seconde G1</option>
  <option value="Seconde G2">Seconde G2</option>
  <option value="Seconde G3">Seconde G3</option>
  <option value="Seconde ESF">Seconde ESF</option>
  <option value="Seconde CH">Seconde CH</option>
  <option value="Seconde IB">Seconde IB</option>
  <option value="Seconde IH">Seconde IH</option>
  <option value="Seconde MA">Seconde MA</option>
  <option value="Seconde CM">Seconde CM</option>
  <option value="Première F1">Première F1</option>
  <option value="Première F2">Première F2</option>
  <option value="Première F3">Première F3</option>
  <option value="Première F4">Première F4</option>
  <option value="Première F5">Première F5</option>
  <option value="Première F7">Première F7</option>
  <option value="Première G1">Première G1</option>
  <option value="Première G2">Première G2</option>
  <option value="Première G3">Première G3</option>
  <option value="Première ESF">Première ESF</option>
  <option value="Première CH">Première CH</option>
  <option value="Première IB">Première IB</option>
  <option value="Première IH">Première IH</option>
  <option value="Première MA">Première MA</option>
  <option value="Première CM">Première CM</option>
  <option value="Terminale F1">Terminale F1</option>
  <option value="Terminale F2">Terminale F2</option>
  <option value="Terminale F3">Terminale F3</option>
  <option value="Terminale F4">Terminale F4</option>
  <option value="Terminale F5">Terminale F5</option>
  <option value="Terminale F7">Terminale F7</option>
  <option value="Terminale G1">Terminale G1</option>
  <option value="Terminale G2">Terminale G2</option>
  <option value="Terminale G3">Terminale G3</option>
  <option value="Terminale ESF">Terminale ESF</option>
  <option value="Terminale CH">Terminale CH</option>
  <option value="Terminale IB">Terminale IB</option>
  <option value="Terminale IH">Terminale IH</option>
  <option value="Terminale MA">Terminale MA</option>
  <option value="Terminale CM">Terminale CM</option>
</datalist>
                                        
                                            
                                            <div class="div" id="select_div_matiere" style="position: relative;">
                                                <div class="seach">
                                                            <input type="search" id="search_button_matiere" class="input_search" placeholder="Rechercher une matière..." list="matieres_options">
                                                            <button class="input_submit research" type="button" id="search_submit_matiere">Chercher...</button>
                                        <!-- Datalist principale des matières -->
                                        <datalist id="matieres_options">
                                            <!-- Enseignement Général : Sciences & Littérature -->
                                            <option value="sec_mathematiques">Mathématiques</option>
                                            <option value="sec_physique">Physique</option>
                                            <option value="sec_chimie">Chimie</option>
                                            <option value="sec_svteehb">SVT / EEHB (Sciences de la Vie et de la Terre)</option>
                                            <option value="sec_informatique_generale">Informatique Générale / TIC</option>
                                            <option value="sec_informatique_theorique">Informatique Théorique</option>
                                            <option value="sec_informatique_pratique">Informatique Pratique / Systèmes d'Information</option>
                                            <option value="sec_francais">Langue Française</option>
                                            <option value="sec_litterature_francaise">Littérature / Culture Générale</option>
                                            <option value="sec_english_language">English Language</option>
                                            <option value="sec_english_literature">English Literature</option>
                                            <option value="sec_histoire">Histoire</option>
                                            <option value="sec_geographie">Géographie</option>
                                            <option value="sec_ecm">Éducation à la Citoyenneté et à la Morale (ECM)</option>
                                            <option value="sec_philosophie">Philosophie</option>
                                            <option value="sec_allemand">Allemand (LV2)</option>
                                            <option value="sec_espagnol">Espagnol (LV2)</option>
                                            <option value="sec_chinois">Chinois (LV2 / LV3)</option>
                                            <option value="sec_arabe">Arabe (LV2 / LV3)</option>
                                            <option value="sec_italien">Italien (LV2 / LV3)</option>
                                            <option value="sec_latin">Latin</option>
                                            <option value="sec_grec">Grec</option>
                                            <option value="sec_langues_nationales">Langues et Cultures Nationales (LCN)</option>
                                            <option value="sec_eps">Éducation Physique et Sportive (EPS)</option>
                                            <option value="sec_arts_plastiques">Arts Plastiques / Dessin</option>
                                            <option value="sec_arts_cinematographiques">Arts Cinématographiques</option>
                                            <option value="sec_musique">Éducation Musicale</option>

                                            <!-- Enseignement Technique Commercial & Gestion -->
                                            <option value="sec_comptabilite_generale">Comptabilité Générale / Financière</option>
                                            <option value="sec_comptabilite_analytique">Comptabilité Analytique</option>
                                            <option value="sec_gestion_financiere">Gestion Financière</option>
                                            <option value="sec_bureautique_steno">Bureautique / Sténotypie</option>
                                            <option value="sec_correspondance_commerciale">Correspondance Commerciale</option>
                                            <option value="sec_organisation_administrative">Organisation Administrative / Secrétariat</option>

                                            <!-- Enseignement Technique Industriel -->
                                            <option value="sec_mecanique_appliquee">Mécanique Appliquée</option>
                                            <option value="sec_dessin_technique">Dessin Technique / Schéma</option>
                                            <option value="sec_electrotechnique">Électrotechnique</option>
                                            <option value="sec_electronique">Électronique</option>
                                            <option value="sec_automatisme">Automatisme / Régulation</option>
                                            <option value="sec_thermodynamique_froid">Thermodynamique / Froid & Climatisation</option>
                                            <option value="sec_technologie_construction">Technologie de Construction / Bâtiment</option>
                                            <option value="sec_resistance_materiaux">Résistance des Matériaux (RDM)</option>

                                            <!-- Sciences Sociales & Économiques -->
                                            <option value="sec_economie_generale">Économie Générale</option>
                                            <option value="sec_economie_entreprise">Économie d'Entreprise / Organisation</option>
                                            <option value="sec_droit_travail">Droit Général et du Travail</option>
                                            <option value="sec_esf_couture">Économie Sociale et Familiale / Couture</option>
                                            <option value="sec_puericulture_nutrition">Puériculture et Nutrition</option>
                                            
                                            <!-- Enseignement Technique Industriel - Génie Civil & Bâtiment -->
                                            <option value="sec_dessin_de_batiment">Dessin de Bâtiment</option>
                                            <option value="sec_mecanique_des_sols">Mécanique des Sols</option>
                                            <option value="sec_topographie_metre">Topographie / Métré</option>
                                            <option value="sec_beton_arme">Béton Armé</option>

                                            <!-- Enseignement Technique Industriel - Génie Électrique -->
                                            <option value="sec_schemas_electriques">Schémas Électriques</option>
                                            <option value="sec_mesures_electriques">Mesures Électriques</option>
                                            <option value="sec_microprocesseurs_automates_programmables">Microprocesseurs / Automates Programmables</option>

                                            <!-- Enseignement Technique Industriel - Génie Mécanique & Auto -->
                                            <option value="sec_construction_mecanique">Construction Mécanique</option>
                                            <option value="sec_maintenance_automobile">Maintenance Automobile</option>
                                            <option value="sec_moteurs_a_combustion_interne">Moteurs à Combustion Interne</option>
                                            <option value="sec_hydraulique_pneumatique">Hydraulique & Pneumatique</option>

                                            <!-- Enseignement Technique Industriel - Génie Chimique -->
                                            <option value="sec_chimie_industrielle">Chimie Industrielle</option>
                                            <option value="sec_genie_des_procedes">Génie des Procédés</option>

                                            <!-- Enseignement Technique Tertiaire (STT) - Commerce & Gestion -->
                                            <option value="sec_marketing_action_commerciale">Marketing / Action Commerciale</option>
                                            <option value="sec_mathematiques_financieres_calculs_financiers">Mathématiques Financières / Calculs Financiers</option>
                                            <option value="sec_statistiques_appliquees">Statistiques Appliquées</option>
                                            <option value="sec_fiscalite">Fiscalité</option>
                                            <option value="sec_droit_commercial_des_affaires">Droit Commercial / Des Affaires</option>

                                            <!-- Enseignement Technique Tertiaire (STT) - Informatique de Gestion & Réseaux -->
                                            <option value="sec_algorithmique_programmation">Algorithmique & Programmation</option>
                                            <option value="sec_systemes_d_information_bases_de_donnees">Systèmes d'Information & Bases de Données</option>
                                            <option value="sec_reseaux_informatiques">Réseaux Informatiques</option>
                                        </datalist>
                                        <button id="accept_matiere" type="button">VALIDER</button>
                                        </div>
                                        <section id="liste_matieres">
                                            <!-- Enseignement Général : Sciences & Mathématiques -->
                                            <section id="sec_mathematiques">
                                                <input type="checkbox" class="matiere_check" id="input_mathematiques" value="Mathématiques">
                                                <label for="input_mathematiques">Mathématiques</label>
                                            </section>

                                            <section id="sec_physique">
                                                <input type="checkbox" class="matiere_check" id="input_physique" value="Physique">
                                                <label for="input_physique">Physique</label>
                                            </section>

                                            <section id="sec_chimie">
                                                <input type="checkbox" class="matiere_check" id="input_chimie" value="Chimie">
                                                <label for="input_chimie">Chimie</label>
                                            </section>

                                            <section id="sec_svteehb">
                                                <input type="checkbox" class="matiere_check" id="input_svteehb" value="SVT / EEHB">
                                                <label for="input_svteehb">SVT / EEHB (Sciences de la Vie et de la Terre)</label>
                                            </section>

                                            <!-- Informatique & Technologies -->
                                            <section id="sec_technologie_information">
                                                <input type="checkbox" class="matiere_check" id="input_technologie_information" value="Technologie de l'Information (TI)">
                                                <label for="input_technologie_information">Technologie de l'Information (TI)</label>
                                            </section>
                                            <section id="sec_informatique_generale">
                                                <input type="checkbox" class="matiere_check" id="input_informatique_generale" value="Informatique Générale / TIC">
                                                <label for="input_informatique_generale">Informatique Générale / TIC</label>
                                            </section>

                                            <section id="sec_informatique_theorique">
                                                <input type="checkbox" class="matiere_check" id="input_informatique_theorique" value="Informatique Théorique">
                                                <label for="input_informatique_theorique">Informatique Théorique</label>
                                            </section>

                                            <section id="sec_informatique_pratique">
                                                <input type="checkbox" class="matiere_check" id="input_informatique_pratique" value="Informatique Pratique / Systèmes d'Information">
                                                <label for="input_informatique_pratique">Informatique Pratique / Systèmes d'Information</label>
                                            </section>
                                            <!-- Langues & Littérature -->
                                            <section id="sec_francais">
                                                <input type="checkbox" class="matiere_check" id="input_francais" value="Langue Française">
                                                <label for="input_francais">Langue Française</label>
                                            </section>

                                            <section id="sec_litterature_francaise">
                                                <input type="checkbox" class="matiere_check" id="input_litterature_francaise" value="Littérature / Culture Générale">
                                                <label for="input_litterature_francaise">Littérature / Culture Générale</label>
                                            </section>

                                            <section id="sec_english_language">
                                                <input type="checkbox" class="matiere_check" id="input_english_language" value="English Language">
                                                <label for="input_english_language">English Language</label>
                                            </section>

                                            <section id="sec_english_literature">
                                                <input type="checkbox" class="matiere_check" id="input_english_literature" value="English Literature">
                                                <label for="input_english_literature">English Literature</label>
                                            </section>

                                            <!-- Langues Vivantes II & Ancêtres -->
                                            <section id="sec_allemand">
                                                <input type="checkbox" class="matiere_check" id="input_allemand" value="Allemand (LV2)">
                                                <label for="input_allemand">Allemand (LV2)</label>
                                            </section>

                                            <section id="sec_espagnol">
                                                <input type="checkbox" class="matiere_check" id="input_espagnol" value="Espagnol (LV2)">
                                                <label for="input_espagnol">Espagnol (LV2)</label>
                                            </section>

                                            <section id="sec_chinois">
                                                <input type="checkbox" class="matiere_check" id="input_chinois" value="Chinois (LV2 / LV3)">
                                                <label for="input_chinois">Chinois (LV2 / LV3)</label>
                                            </section>

                                            <section id="sec_arabe">
                                                <input type="checkbox" class="matiere_check" id="input_arabe" value="Arabe (LV2 / LV3)">
                                                <label for="input_arabe">Arabe (LV2 / LV3)</label>
                                            </section>

                                            <section id="sec_italien">
                                                <input type="checkbox" class="matiere_check" id="input_italien" value="Italien (LV2 / LV3)">
                                                <label for="input_italien">Italien (LV2 / LV3)</label>
                                            </section>

                                            <section id="sec_latin">
                                                <input type="checkbox" class="matiere_check" id="input_latin" value="Latin">
                                                <label for="input_latin">Latin</label>
                                            </section>

                                            <section id="sec_grec">
                                                <input type="checkbox" class="matiere_check" id="input_grec" value="Grec Ancienne">
                                                <label for="input_grec">Grec Ancienne</label>
                                            </section>

                                            <section id="sec_langues_nationales">
                                                <input type="checkbox" class="matiere_check" id="input_langues_nationales" value="Langues et Cultures Nationales (LCN)">
                                                <label for="input_langues_nationales">Langues et Cultures Nationales (LCN)</label>
                                            </section>

                                            <!-- Sciences Humaines & Sociales -->
                                            <section id="sec_histoire">
                                                <input type="checkbox" class="matiere_check" id="input_histoire" value="Histoire">
                                                <label for="input_histoire">Histoire</label>
                                            </section>

                                            <section id="sec_geographie">
                                                <input type="checkbox" class="matiere_check" id="input_geographie" value="Géographie">
                                                <label for="input_geographie">Géographie</label>
                                            </section>

                                            <section id="sec_ecm">
                                                <input type="checkbox" class="matiere_check" id="input_ecm" value="Éducation à la Citoyenneté et à la Morale (ECM)">
                                                <label for="input_ecm">Éducation à la Citoyenneté et à la Morale (ECM)</label>
                                            </section>

                                            <section id="sec_philosophie">
                                                <input type="checkbox" class="matiere_check" id="input_philosophie" value="Philosophie">
                                                <label for="input_philosophie">Philosophie</label>
                                            </section>

                                            <!-- Arts & Éducation Physique -->
                                            <section id="sec_eps">
                                                <input type="checkbox" class="matiere_check" id="input_eps" value="Éducation Physique et Sportive (EPS)">
                                                <label for="input_eps">Éducation Physique et Sportive (EPS)</label>
                                            </section>

                                            <section id="sec_arts_plastiques">
                                                <input type="checkbox" class="matiere_check" id="input_arts_plastiques" value="Arts Plastiques / Dessin">
                                                <label for="input_arts_plastiques">Arts Plastiques / Dessin</label>
                                            </section>

                                            <section id="sec_arts_cinematographiques">
                                                <input type="checkbox" class="matiere_check" id="input_arts_cinematographiques" value="Arts Cinématographiques">
                                                <label for="input_arts_cinematographiques">Arts Cinématographiques</label>
                                            </section>

                                            <section id="sec_musique">
                                                <input type="checkbox" class="matiere_check" id="input_musique" value="Éducation Musicale">
                                                <label for="input_musique">Éducation Musicale</label>
                                            </section>

                                            <!-- Enseignement Technique Commercial (Tertiaire) -->
                                            <section id="sec_comptabilite_generale">
                                                <input type="checkbox" class="matiere_check" id="input_comptabilite_generale" value="Comptabilité Générale / Financière">
                                                <label for="input_comptabilite_generale">Comptabilité Générale / Financière</label>
                                            </section>

                                            <section id="sec_comptabilite_analytique">
                                                <input type="checkbox" class="matiere_check" id="input_comptabilite_analytique" value="Comptabilité Analytique">
                                                <label for="input_comptabilite_analytique">Comptabilité Analytique</label>
                                            </section>

                                            <section id="sec_gestion_financiere">
                                                <input type="checkbox" class="matiere_check" id="input_gestion_financiere" value="Gestion Financière">
                                                <label for="input_gestion_financiere">Gestion Financière</label>
                                            </section>

                                            <section id="sec_bureautique_steno">
                                                <input type="checkbox" class="matiere_check" id="input_bureautique_steno" value="Bureautique / Sténotypie">
                                                <label for="input_bureautique_steno">Bureautique / Sténotypie</label>
                                            </section>

                                            <section id="sec_correspondance_commerciale">
                                                <input type="checkbox" class="matiere_check" id="input_correspondance_commerciale" value="Correspondance Commerciale">
                                                <label for="input_correspondance_commerciale">Correspondance Commerciale</label>
                                            </section>

                                            <section id="sec_organisation_administrative">
                                                <input type="checkbox" class="matiere_check" id="input_organisation_administrative" value="Organisation Administrative / Secrétariat">
                                                <label for="input_organisation_administrative">Organisation Administrative / Secrétariat</label>
                                            </section>

                                            <!-- Enseignement Technique Industriel -->
                                            <section id="sec_mecanique_appliquee">
                                                <input type="checkbox" class="matiere_check" id="input_mecanique_appliquee" value="Mécanique Appliquée">
                                                <label for="input_mecanique_appliquee">Mécanique Appliquée</label>
                                            </section>

                                            <section id="sec_dessin_technique">
                                                <input type="checkbox" class="matiere_check" id="input_dessin_technique" value="Dessin Technique / Schéma">
                                                <label for="input_dessin_technique">Dessin Technique / Schéma</label>
                                            </section>

                                            <section id="sec_electrotechnique">
                                                <input type="checkbox" class="matiere_check" id="input_electrotechnique" value="Électrotechnique">
                                                <label for="input_electrotechnique">Électrotechnique</label>
                                            </section>

                                            <section id="sec_electronique">
                                                <input type="checkbox" class="matiere_check" id="input_electronique" value="Électronique">
                                                <label for="input_electronique">Électronique</label>
                                            </section>

                                            <section id="sec_automatisme">
                                                <input type="checkbox" class="matiere_check" id="input_automatisme" value="Automatisme / Régulation">
                                                <label for="input_automatisme">Automatisme / Régulation</label>
                                            </section>

                                            <section id="sec_thermodynamique_froid">
                                                <input type="checkbox" class="matiere_check" id="input_thermodynamique_froid" value="Thermodynamique / Froid & Climatisation">
                                                <label for="input_thermodynamique_froid">Thermodynamique / Froid & Climatisation</label>
                                            </section>

                                            <section id="sec_technologie_construction">
                                                <input type="checkbox" class="matiere_check" id="input_technologie_construction" value="Technologie de Construction / Bâtiment">
                                                <label for="input_technologie_construction">Technologie de Construction / Bâtiment</label>
                                            </section>

                                            <section id="sec_resistance_materiaux">
                                                <input type="checkbox" class="matiere_check" id="input_resistance_materiaux" value="Résistance des Matériaux (RDM)">
                                                <label for="input_resistance_materiaux">Résistance des Matériaux (RDM)</label>
                                            </section>

                                            <!-- Droit, Économie & Métiers de la Société -->
                                            <section id="sec_economie_generale">
                                                <input type="checkbox" class="matiere_check" id="input_economie_generale" value="Économie Générale">
                                                <label for="input_economie_generale">Économie Générale</label>
                                            </section>

                                            <section id="sec_economie_entreprise">
                                                <input type="checkbox" class="matiere_check" id="input_economie_entreprise" value="Économie d'Entreprise / Organisation">
                                                <label for="input_economie_entreprise">Économie d'Entreprise / Organisation</label>
                                            </section>

                                            <section id="sec_droit_travail">
                                                <input type="checkbox" class="matiere_check" id="input_droit_travail" value="Droit Général et du Travail">
                                                <label for="input_droit_travail">Droit Général et du Travail</label>
                                            </section>

                                            <section id="sec_esf_couture">
                                                <input type="checkbox" class="matiere_check" id="input_esf_couture" value="Économie Sociale et Familiale / Couture">
                                                <label for="input_esf_couture">Économie Sociale et Familiale / Couture</label>
                                            </section>

                                            <section id="sec_puericulture_nutrition">
                                                <input type="checkbox" class="matiere_check" id="input_puericulture_nutrition" value="Puériculture et Nutrition">
                                                <label for="input_puericulture_nutrition">Puériculture et Nutrition</label>
                                            </section>
                                            <!-- Enseignement Technique Industriel - Génie Civil & Bâtiment -->
                                            <section id="sec_dessin_batiment">
                                                <input type="checkbox" class="matiere_check" id="input_dessin_batiment" value="Dessin de Bâtiment">
                                                <label for="input_dessin_batiment">Dessin de Bâtiment</label>
                                            </section>

                                            <section id="sec_mecanique_sols">
                                                <input type="checkbox" class="matiere_check" id="input_mecanique_sols" value="Mécanique des Sols">
                                                <label for="input_mecanique_sols">Mécanique des Sols</label>
                                            </section>

                                            <section id="sec_topographie_metre">
                                                <input type="checkbox" class="matiere_check" id="input_topographie_metre" value="Topographie / Métré">
                                                <label for="input_topographie_metre">Topographie / Métré</label>
                                            </section>

                                            <section id="sec_beton_arme">
                                                <input type="checkbox" class="matiere_check" id="input_beton_arme" value="Béton Armé">
                                                <label for="input_beton_arme">Béton Armé</label>
                                            </section>

                                            <!-- Enseignement Technique Industriel - Génie Électrique -->
                                            <section id="sec_schemas_electriques">
                                                <input type="checkbox" class="matiere_check" id="input_schemas_electriques" value="Schémas Électriques">
                                                <label for="input_schemas_electriques">Schémas Électriques</label>
                                            </section>

                                            <section id="sec_mesures_electriques">
                                                <input type="checkbox" class="matiere_check" id="input_mesures_electriques" value="Mesures Électriques">
                                                <label for="input_mesures_electriques">Mesures Électriques</label>
                                            </section>

                                            <section id="sec_microprocesseurs_automates">
                                                <input type="checkbox" class="matiere_check" id="input_microprocesseurs_automates" value="Microprocesseurs / Automates Programmables">
                                                <label for="input_microprocesseurs_automates">Microprocesseurs / Automates Programmables</label>
                                            </section>

                                            <!-- Enseignement Technique Industriel - Génie Mécanique & Auto -->
                                            <section id="sec_construction_mecanique">
                                                <input type="checkbox" class="matiere_check" id="input_construction_mecanique" value="Construction Mécanique">
                                                <label for="input_construction_mecanique">Construction Mécanique</label>
                                            </section>

                                            <section id="sec_maintenance_automobile">
                                                <input type="checkbox" class="matiere_check" id="input_maintenance_automobile" value="Maintenance Automobile">
                                                <label for="input_maintenance_automobile">Maintenance Automobile</label>
                                            </section>

                                            <section id="sec_moteurs_combustion">
                                                <input type="checkbox" class="matiere_check" id="input_moteurs_combustion" value="Moteurs à Combustion Interne">
                                                <label for="input_moteurs_combustion">Moteurs à Combustion Interne</label>
                                            </section>

                                            <section id="sec_hydraulique_pneumatique">
                                                <input type="checkbox" class="matiere_check" id="input_hydraulique_pneumatique" value="Hydraulique & Pneumatique">
                                                <label for="input_hydraulique_pneumatique">Hydraulique & Pneumatique</label>
                                            </section>

                                            <!-- Enseignement Technique Industriel - Génie Chimique -->
                                            <section id="sec_chimie_industrielle">
                                                <input type="checkbox" class="matiere_check" id="input_chimie_industrielle" value="Chimie Industrielle">
                                                <label for="input_chimie_industrielle">Chimie Industrielle</label>
                                            </section>

                                            <section id="sec_genie_procedes">
                                                <input type="checkbox" class="matiere_check" id="input_genie_procedes" value="Génie des Procédés">
                                                <label for="input_genie_procedes">Génie des Procédés</label>
                                            </section>

                                            <!-- Enseignement Technique Tertiaire (STT) - Commerce & Gestion -->
                                            <section id="sec_marketing_action_commerciale">
                                                <input type="checkbox" class="matiere_check" id="input_marketing_action_commerciale" value="Marketing / Action Commerciale">
                                                <label for="input_marketing_action_commerciale">Marketing / Action Commerciale</label>
                                            </section>

                                            <section id="sec_mathematiques_financieres">
                                                <input type="checkbox" class="matiere_check" id="input_mathematiques_financieres" value="Mathématiques Financières / Calculs Financiers">
                                                <label for="input_mathematiques_financieres">Mathématiques Financières / Calculs Financiers</label>
                                            </section>

                                            <section id="sec_statistiques_appliquees">
                                                <input type="checkbox" class="matiere_check" id="input_statistiques_appliquees" value="Statistiques Appliquées">
                                                <label for="input_statistiques_appliquees">Statistiques Appliquées</label>
                                            </section>

                                            <section id="sec_fiscalite">
                                                <input type="checkbox" class="matiere_check" id="input_fiscalite" value="Fiscalité">
                                                <label for="input_fiscalite">Fiscalité</label>
                                            </section>

                                            <section id="sec_droit_commercial">
                                                <input type="checkbox" class="matiere_check" id="input_droit_commercial" value="Droit Commercial / Des Affaires">
                                                <label for="input_droit_commercial">Droit Commercial / Des Affaires</label>
                                            </section>

                                            <!-- Enseignement Technique Tertiaire (STT) - Informatique de Gestion & Réseaux -->
                                            <section id="sec_algorithmique_programmation">
                                                <input type="checkbox" class="matiere_check" id="input_algorithmique_programmation" value="Algorithmique et Programmation">
                                                <label for="input_algorithmique_programmation">Algorithmique & Programmation</label>
                                            </section>

                                            <section id="sec_systemes_information_bdd">
                                                <input type="checkbox" class="matiere_check" id="input_systemes_information_bdd" value="Systèmes d'Information & Bases de Données">
                                                <label for="input_systemes_information_bdd">Systèmes d'Information & Bases de Données</label>
                                            </section>

                                            <section id="sec_reseaux_informatiques">
                                                <input type="checkbox" class="matiere_check" id="input_reseaux_informatiques" value="Réseaux Informatiques">
                                                <label for="input_reseaux_informatiques">Réseaux Informatiques</label>
                                            </section>
                                        </section>
                                    </div>

    <footer style="position: absolute; bottom:0;">
        <p align="center">
            <span style="color: #00a2ff;font-weight: bolder">GESTNOTE</span> — Douala-Cameroun

                © create by NI PRO DEV 
        </p>
    </footer>
</body>
</html>