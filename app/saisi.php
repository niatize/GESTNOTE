<?php    
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("../data_base.php");

if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"])) {
    $user_name = $_SESSION["user_name"];
    $name = $user_name;
    $profil = $_SESSION['profil'];
    $tab_name = explode(" ", $user_name);
    $user_name = $tab_name[0];
} else {
    header('location: ../connexion.php');
    exit();
}

try {
    $sql = $pdo->prepare("SELECT * FROM user WHERE full_name = :nom");
    $sql->execute(["nom" => $name]);
    $user_info = $sql->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $th) {
    die("Erreur : " . $th->getMessage());
}

// =========================================================================
// TRAITEMENT DU FORMULAIRE : CONSERVATION DE LA REQUÊTE D'INSERTION D'ORIGINE
// =========================================================================
$message_script = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["send"])) {
    if (
        isset($_POST["matiere_choisis"]) && !empty($_POST["matiere_choisis"]) &&
        isset($_POST["nom_eleve"]) && !empty($_POST["nom_eleve"]) &&
        isset($_POST["cc"]) && isset($_POST["eval"])
    ) {
        $matiere_choisis = $_POST["matiere_choisis"];
        $nom_eleve = $_POST["nom_eleve"];
        $cc = $_POST["cc"];
        $eval = $_POST["eval"];

        try {
            // 1. Récupération de l'identifiant de la matière
            $sql = $pdo->prepare("SELECT id_mat FROM matiere WHERE nom = :matiere_choisis");
            $sql->execute(["matiere_choisis" => $matiere_choisis]);
            $id_matiere = $sql->fetch(PDO::FETCH_ASSOC);

            if ($id_matiere) {
                $id_mat = $id_matiere["id_mat"];

                // 2. Préparation de la requête d'insertion d'origine
                $insert_sql = $pdo->prepare("INSERT INTO notes(id_mat, note_cc, note_eval, id_eleve) 
                                             VALUES(:id_mat, :note_cc, :note_eval, :id_eleve)");

                // 3. Boucle d'insertion par élève
                for ($i = 0; $i < count($nom_eleve); $i++) {
                    $sql_eleve = $pdo->prepare("SELECT id_eleve FROM eleve WHERE nom_complet = :nom_complet");
                    $sql_eleve->execute(["nom_complet" => $nom_eleve[$i]]);
                    $id_eleve = $sql_eleve->fetch(PDO::FETCH_ASSOC);

                    if ($id_eleve) {
                        $val_cc = (float) str_replace(',', '.', $cc[$i]);
                        $val_eval = (float) str_replace(',', '.', $eval[$i]);

                        $insert_sql->execute([
                            "id_mat"    => $id_mat,
                            "note_cc"   => $val_cc,
                            "note_eval" => $val_eval,
                            "id_eleve"  => $id_eleve["id_eleve"]
                        ]);
                    }
                }
                $message_script = '<script>alert("Les notes ont bien été envoyées !");</script>';
            }
        } catch (PDOException $e) {
            die("ERROR : " . $e->getMessage());
        }
    } else {
        $message_script = '<script>alert("Veuillez remplir toutes les notes avant d\'envoyer.");</script>';
    }
}

// =========================================================================
// CHARGEMENT DE LA STRUCTURE (CLASSES, MATIÈRES ET ÉLÈVES VIA VOS REQUÊTES)
// =========================================================================
$classes_raw = array_filter(array_map('trim', explode('+ ', $user_info['classes'])));
$matieres_raw = array_filter(array_map('trim', explode('+', $user_info['matieres'])));

$structure_data = [];

foreach ($classes_raw as $index => $nom_classe) {
    if (empty($nom_classe)) continue;

    $matieres_associees = [];
    if (isset($matieres_raw[$index])) {
        $matieres_associees = array_filter(array_map('trim', explode(', ', $matieres_raw[$index])));
    }

    $matieres_bdd = [];
    try {
        $sql = $pdo->prepare('SELECT id_class FROM classe WHERE nom = :nom');
        $sql->execute(["nom" => $nom_classe]);
        $id_classe = $sql->fetchColumn();

        if ($id_classe) {
            $sql = $pdo->prepare("SELECT nom FROM matiere 
                INNER JOIN matiere_coeff ON matiere_coeff.id_mat = matiere.id_mat
                WHERE matiere_coeff.id_class = :id_class");
            $sql->execute(["id_class" => $id_classe]);
            $matieres_bdd = $sql->fetchAll(PDO::FETCH_COLUMN);
        }
    } catch (PDOException $e) {
        die("ERROR : " . $e->getMessage());
    }

    $matieres_valid = array_values(array_intersect($matieres_associees, $matieres_bdd));

    $eleves = [];
    try {
        $sql = $pdo->prepare("SELECT nom_complet FROM eleve WHERE nom_classe = :classe ORDER BY nom_complet ASC");
        $sql->execute(["classe" => $nom_classe]);
        $rows = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {
            $eleves[] = [
                'nom_complet' => $row['nom_complet'],
                'cc' => '',
                'eval' => ''
            ];
        }
    } catch (PDOException $e) {
        die('ERROR :: ' . $e->getMessage());
    }

    $structure_data[$nom_classe] = [
        'matieres' => $matieres_valid,
        'eleves'   => $eleves
    ];
}

$structure_json = json_encode($structure_data);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des notes - GESTNOTE</title>
    <link rel="stylesheet" href="css/all_style.css">
    <link rel="stylesheet" href="css/acceuil.css">
    <link rel="stylesheet" href="css/saisis.css">
    <link rel="stylesheet" href="css/all_style_responsive.css">
    <script src="js/header.js" defer></script>
    <script src="js/color.js" defer></script>
    <script src="js/vue.global.js"></script>
</head>
<body>

    <?php if (!empty($message_script)) echo $message_script; ?>

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
                            <li class="li"><a href="acceuil_app.php">ACCEUIL</a></li>
                            <li class="li"><a href="historique.php">HISTORIQUE</a></li>
                            <li class="li"><a href="inscription.php">INSCRIPTIONS D'ÉLÈVES</a></li>
                            <li class="li"><a href="saisi.php" id="a">SAISIR LES NOTES</a></li>
                            <li class="li"><a href="suivis.php">SUIVIS DES NOTES</a></li>
                            <li class="li"><a href="inprimer.php">IMPRIMER</a></li>
                            <li class="li"><a href="parent.php">RESULTAT</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="user_profile" id="user_profile" style="background-color: transparent;">
                    <div class="user_logo" style="background-color: transparent;">
                        <img src="<?php echo htmlspecialchars("../" . $profil) ?>" class="logo_profile" alt="" style="background-color: transparent;">
                    </div>
                    <div class="user_name" style="background-color: transparent;"><?php echo htmlspecialchars($user_name); ?></div>
                </div>
            </div>
            <div class="menue_burger" id="menue_burger">
                <div class="burger" id="burger_1"></div>
                <div class="burger" id="burger_2"></div>
                <div class="burger" id="burger_3"></div>
            </div>
        </div>
    </header>

    <main id="app">
        <?php include_once('div_2.php') ?>
        
        <div class="content_1" id="content_1" style="position: relative;">
            
            <!-- Liste des classes -->
            <div class="classes class"><br>
                <div v-for="(data, nomClasse) in structure" :key="nomClasse" class="classe">
                    <a href="#" 
                       :id="nomClasse"
                       :class="{ 'active': classeActive === nomClasse }"
                       @click.prevent="selectionnerClasse(nomClasse)">
                        {{ nomClasse }}
                    </a>
                </div><br>
            </div>

            <!-- Liste des matières -->
            <div class="matiere" id="matiere">
                <div v-for="mat in matieresDisponibles" :key="mat" class="matier">
                    <a href="#" 
                       id="ac" 
                       :class="{ 'active-mat': matiereActive === mat }"
                       @click.prevent="selectionnerMatiere(mat)">
                        {{ mat }}
                    </a>
                </div>
            </div>

            <!-- Messages d'information -->
            <div class="input_note">
                <div v-if="classeActive && matiereActive">
                    Veuillez saisir les notes des élèves de la <strong>{{ classeActive }}</strong> dont la matière concernée est <strong>{{ matiereActive }}</strong>
                </div>
                <div v-else-if="classeActive && matieresDisponibles.length === 0" id="p">
                    Vous n'êtes affecté à aucune matière de cette classe
                </div>
                <div v-else-if="classeActive && !matiereActive">
                    Veuillez sélectionner une matière ci-dessus.
                </div>
            </div>

            <!-- Zone de saisie des notes -->
            <div id="insertion_de_note" v-if="classeActive && matiereActive && elevesActuels.length > 0">
                
                <form action="" method="post">
                    <!-- Données masquées envoyées à PHP -->
                    <input type="hidden" name="classe_en_cours" :value="classeActive">
                    <input type="hidden" name="matiere_choisis" :value="matiereActive">

                    <div class="barre_sequence_recherche" style="margin-bottom: 15px; display: flex; gap: 20px; align-items: center;">
                        <div style="background-color: transparent;">
                            <label style="background-color: transparent;" for="sequence_select">SÉQUENCE : </label>
                            <select style="background-color: transparent;" id="sequence_select" name="sequence" v-model="sequence">
                                <option value="note_seq1">Séquence N°1</option>
                                <option value="note_seq2">Séquence N°2</option>
                                <option value="note_seq3">Séquence N°3</option>
                                <option value="note_seq4">Séquence N°4</option>
                                <option value="note_seq5">Séquence N°5</option>
                                <option value="note_seq6">Séquence N°6</option>
                            </select>
                        </div>

                        <div>
                            <input type="text" v-model="recherche" placeholder="Rechercher un élève..." style="padding: 5px;">
                        </div>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th rowspan="2" class="n">N°</th>
                                <th rowspan="2" class="nom">NOM</th>
                                <th colspan="2" class="note">NOTE</th>
                                <th rowspan="2" class="seq_col">NOTE SÉQUENCE</th>
                            </tr>
                            <tr>
                                <th class="cc">CC</th>
                                <th class="eval">EVAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(eleve, index) in elevesFiltres" :key="eleve.nom_complet">
                                <td align="center">{{ index + 1 }}</td>
                                <td>
                                    <input type="text" 
                                           name="nom_eleve[]" 
                                           :value="eleve.nom_complet" 
                                           style="padding: 3px; font-size:medium; border:none" 
                                           readonly>
                                </td>
                                <td>
                                    <input type="text" 
                                           name="cc[]" 
                                           v-model="eleve.cc" 
                                           @input="validerNote(eleve, 'cc')" 
                                           placeholder="ex: 14" 
                                           style="text-align: center;" 
                                           required>
                                </td>
                                <td>
                                    <input type="text" 
                                           name="eval[]" 
                                           v-model="eleve.eval" 
                                           @input="validerNote(eleve, 'eval')" 
                                           placeholder="ex: 12" 
                                           style="text-align: center;" 
                                           required>
                                </td>
                                <td align="center" style="font-weight: bold; color: #1d4ed8;">
                                    {{ calculerNoteSequence(eleve.cc, eleve.eval) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="submit_div" style="margin-top: 15px;">
                        <button type="submit" name="send" class="btn-submit">
                            <svg style="color: white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="blue" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                <polyline points="17 21 17 13 7 13 7 21"/>
                                <polyline points="7 3 7 8 15 8"/>
                            </svg>
                            Enregistrer les notes
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </main>

    <footer>
        <?php require_once "footer.php" ?>
    </footer>

    <script>
        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    structure: <?php echo $structure_json; ?>,
                    classeActive: '',
                    matiereActive: '',
                    recherche: '',
                    sequence: 'note_seq1'
                };
            },
            computed: {
                matieresDisponibles() {
                    if (this.classeActive && this.structure[this.classeActive]) {
                        return this.structure[this.classeActive].matieres || [];
                    }
                    return [];
                },
                elevesActuels() {
                    if (this.classeActive && this.structure[this.classeActive]) {
                        return this.structure[this.classeActive].eleves || [];
                    }
                    return [];
                },
                elevesFiltres() {
                    return this.elevesActuels.filter(e => 
                        e.nom_complet.toLowerCase().includes(this.recherche.toLowerCase())
                    );
                }
            },
            methods: {
                selectionnerClasse(nomClasse) {
                    this.classeActive = nomClasse;
                    const mats = this.structure[nomClasse].matieres;
                    this.matiereActive = (mats && mats.length > 0) ? mats[0] : '';
                },
                selectionnerMatiere(nomMatiere) {
                    this.matiereActive = nomMatiere;
                },
                validerNote(eleve, champ) {
                    let valeur = String(eleve[champ]).replace(',', '.');
                    valeur = valeur.replace(/[^0-9.]/g, '');
                    
                    const parties = valeur.split('.');
                    if (parties.length > 2) {
                        valeur = parties[0] + '.' + parties.slice(1).join('');
                    }

                    if (parseFloat(valeur) > 20) {
                        valeur = '20';
                    }

                    eleve[champ] = valeur;
                },
                calculerNoteSequence(cc, evalVal) {
                    const noteCC = parseFloat(String(cc).replace(',', '.'));
                    const noteEval = parseFloat(String(evalVal).replace(',', '.'));

                    if (!isNaN(noteCC) && !isNaN(noteEval)) {
                        return ((noteCC + noteEval) / 2).toFixed(2) + ' / 20';
                    }
                    return '-';
                }
            },
            mounted() {
                const premieresClasses = Object.keys(this.structure);
                if (premieresClasses.length > 0) {
                    this.selectionnerClasse(premieresClasses[0]);
                }
            }
        }).mount('#app');
    </script>
</body>
</html>