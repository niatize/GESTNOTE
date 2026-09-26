<?php    
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../data_base.php";

$liste_de_classes = [];
$mat_list = [];
$matieres_details = [];

if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"])) {
    $user_names = $_SESSION["user_name"];
    $profil = $_SESSION['profil'];
    $tab_name = explode(" ", $user_names);
    $user_name = $tab_name[0];
    try {
        // Requête 1: Récupération des classes associées à l'établissement/utilisateur
        $sql = $pdo->prepare('SELECT id_classes FROM etablissement INNER JOIN user ON etablissement.id = user.etablissement_id WHERE user.full_name = :nom');
        $sql->execute(["nom" => $user_names]);
        $id_classes_res = $sql->fetch(PDO::FETCH_ASSOC);
        
        if ($id_classes_res) {
            $id_classes = explode(', ', $id_classes_res["id_classes"]);

            // Tri à bulle sur les ID de classes
            for ($i = 0; $i < count($id_classes); $i++) {
                for ($j = $i + 1; $j < count($id_classes); $j++) {
                    if ($id_classes[$i] > $id_classes[$j]) {
                        $k = $id_classes[$i];
                        $id_classes[$i] = $id_classes[$j];
                        $id_classes[$j] = $k;
                    }
                }
            }

            for ($i = 0; $i < count($id_classes); $i++) {
                $sql = $pdo->prepare('SELECT nom FROM classe WHERE id_class = :id_classes ORDER BY id_class ASC');
                $sql->execute(["id_classes" => $id_classes[$i]]);
                $class_list = $sql->fetch(PDO::FETCH_ASSOC);
                if ($class_list) {
                    array_push($liste_de_classes, $class_list);
                }
            }
        }
    } catch (PDOException $e) {
        die("ERREUR :" . $e->getMessage());
    }
} else {
    header('location: ../connexion.php');
    exit();
}

// Identification de la classe active
$classe_en_cour = isset($_GET['classe']) && !empty($_GET['classe']) ? $_GET['classe'] : (isset($_SESSION['classe_en_cour']) ? $_SESSION['classe_en_cour'] : '');

if ($classe_en_cour && $classe_en_cour !== 'Veuillez sélectionner l\'une des classe parmis la liste de classe a votre droite') {
    $_SESSION['classe_en_cour'] = $classe_en_cour;
    try {
        // Requête 2: Récupération de l'ID de la classe sélectionnée
        $sql = $pdo->prepare('SELECT id_class FROM classe WHERE nom = :nom');
        $sql->execute(["nom" => $classe_en_cour]);
        $id_class = $sql->fetchColumn();

        // Requête 3: Sélection de toutes les matières associées à cette classe
        $sql = $pdo->prepare('SELECT DISTINCT matiere.id_mat, matiere.nom FROM matiere INNER JOIN matiere_coeff ON matiere_coeff.id_mat = matiere.id_mat WHERE matiere_coeff.id_class = :id_class ORDER BY matiere.nom ASC');
        $sql->execute(['id_class' => $id_class]);
        $matieres_list = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Requête 4: Récupération de tous les élèves de la classe
        $sql = $pdo->prepare('SELECT id_eleve, nom_complet FROM eleve WHERE nom_classe = :nom ORDER BY nom_complet ASC');
        $sql->execute(['nom' => $classe_en_cour]);
        $liste_des_eleves = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Analyse détaillée matière par matière
        foreach ($matieres_list as $mat) {
            $id_mat = $mat['id_mat'];
            $nom_mat = $mat['nom'];
            $mat_list[] = $nom_mat;

            $eleve_ok = [];
            $eleve_not = [];

            foreach ($liste_des_eleves as $eleve) {
                // Vérification si la note existe
                $sql = $pdo->prepare('SELECT COUNT(*) FROM notes WHERE id_eleve = :id_eleve AND id_mat = :id_mat AND note_seq IS NOT NULL');
                $sql->execute([
                    'id_eleve' => $eleve['id_eleve'],
                    'id_mat'   => $id_mat
                ]);
                $count = $sql->fetchColumn();

                if ($count > 0) {
                    $eleve_ok[] = $eleve['nom_complet'];
                } else {
                    $eleve_not[] = $eleve['nom_complet'];
                }
            }

            $matieres_details[$nom_mat] = [
                'ok'  => array_values(array_unique($eleve_ok)),
                'not' => array_values(array_unique($eleve_not))
            ];
        }

    } catch (PDOException $e) {
        die("ERREUR: " . $e->getMessage());
    }
}

// Transmission des données JSON vers Vue.js
$vue_data = [
    'classeActive'    => $classe_en_cour,
    'matieres'        => array_values(array_unique($mat_list)),
    'matieresDetails' => $matieres_details
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi des bulletins - GESTNOTE</title>
    <link rel="stylesheet" href="css/all_style.css">
    <link rel="stylesheet" href="css/all_style_responsive.css">
    <link rel="stylesheet" href="css/suivis.css">
    <link rel="stylesheet" href="css/saisis.css">
    
    <script src="js/vue.global.js"></script>
    <script src="js/header.js" defer></script>
    <script src="js/color.js" defer></script>
</head>
<body>
    <header>
        <div class="header_parent">
            <div class="headerlogo">
                <span class="logo_div gap">
                    <img src="../image/logo.png" class="logo" alt="Logo">
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
                            <li class="li"><a href="saisi.php">SAISIR LES NOTES</a></li>
                            <li class="li"><a href="suivis.php" id="a">SUIVIS DES NOTES</a></li>
                            <li class="li"><a href="inprimer.php">IMPRIMER</a></li>
                            <li class="li"><a href="parent.php">RESULTAT</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="user_profile" id="user_profile" style="background-color: transparent;">
                    <div class="user_logo" style="background-color: transparent;">
                        <img src="<?php echo htmlspecialchars("../".$profil); ?>" class="logo_profile" alt="Profil">
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
        <?php include_once('div_2.php'); ?>
        <div class="content_1" id="content_1">

            <!-- Sidebar Liste des classes -->
            <div class="classes">
                <br>
                <?php foreach ($liste_de_classes as $cls): ?>
                    <div class="classe">
                        <a id="<?php echo htmlspecialchars($cls['nom']); ?>" 
                           href="?classe=<?php echo urlencode($cls['nom']); ?>"
                           :class="{ 'active_classe': classeActive === '<?php echo $cls['nom']; ?>' }">
                            <?php echo '<span class="spn" style="background-color: transparent">'.htmlspecialchars($cls['nom']).'</span>'; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
                <br>
            </div>

            <!-- Conteneur d'affichage des cartes par matière -->
            <div class="suivi_vue_wrapper">
                
                <!-- Barre de Recherche et Filtres -->
                <div class="card_filtres">
                    <span class="span_title">Filtres et Recherche</span>
                    <div class="filtres_grid">
                        <div class="filtre_item">
                            <label>Trimestre :</label>
                            <select v-model="selectedTrimestre">
                                <option value="Trimestre 1">Trimestre 1</option>
                                <option value="Trimestre 2">Trimestre 2</option>
                                <option value="Trimestre 3">Trimestre 3</option> 
                            </select>
                        </div>

                        <div class="filtre_item">
                            <label>Matière :</label>
                            <select v-model="selectedMatiere">
                                <option value="">Toutes les matières ({{ matieresTriees.length }})</option>
                                <option v-for="mat in matieresTriees" :key="mat" :value="mat">{{ mat }}</option>
                            </select>
                        </div>

                        <div class="filtre_item">
                            <label>Rechercher :</label>
                            <input type="search" v-model="searchQuery" placeholder="Rechercher une classe, un élève..." class="input_search">
                        </div>
                    </div>
                </div>

                <div v-if="!classeActive" class="alert_no_classe">
                    Veuillez sélectionner l'une des classes parmi la liste à votre gauche.
                </div>

                <!-- Boucle dynamique sur les matières -->
                <div v-else class="statuts_contener">
                    <div v-for="matiere in matieresAffichees" :key="matiere" class="card_matiere">
                        
                        <!-- Entête Accordéon avec barre bicolore -->
                        <div class="progress_bar" @click="toggleAccordion(matiere)">
                            <div class="progress_header_top">
                                <div class="progress_title">
                                    <span class="icon">{{ matiereOuverte === matiere ? '∨' : '>' }}</span>
                                    <strong>{{ classeActive }} - {{ matiere }}</strong>
                                </div>
                                <div class="progress_stats">
                                    <span class="badge_percent">
                                        {{ Math.round((getElevesOk(matiere).length / ((getElevesOk(matiere).length + getElevesNot(matiere).length) || 1)) * 100) }}%
                                    </span>
                                    <span class="stats_text">
                                        {{ getElevesOk(matiere).length }}/{{ getElevesOk(matiere).length + getElevesNot(matiere).length }} élèves saisis
                                    </span>
                                </div>
                            </div>

                            <!-- Barre Segmentée -->
                            <div class="progress_track">
                                <div class="progress_fill_green" 
                                     :style="{ width: ((getElevesOk(matiere).length / ((getElevesOk(matiere).length + getElevesNot(matiere).length) || 1)) * 100) + '%' }">
                                </div>
                                <div class="progress_fill_red" 
                                     :style="{ width: ((getElevesNot(matiere).length / ((getElevesOk(matiere).length + getElevesNot(matiere).length) || 1)) * 100) + '%' }">
                                </div>
                            </div>
                        </div>

                        <!-- Légende sous la barre de progression -->
                        <div v-show="matiereOuverte === matiere" class="progress_legend">
                            <span class="legend_item green">
                                <span class="dot"></span> 
                                Notes Saisies ({{ getElevesOk(matiere).length }}/{{ getElevesOk(matiere).length + getElevesNot(matiere).length }})
                            </span>
                            <span class="legend_item red">
                                <span class="dot"></span> 
                                Notes Manquantes ({{ getElevesNot(matiere).length }}/{{ getElevesOk(matiere).length + getElevesNot(matiere).length }})
                            </span>
                        </div>

                        <!-- Affichage des tableaux si accordéon ouvert -->
                        <div v-show="matiereOuverte === matiere" class="schuler_statut">
                            
                            <!-- Élèves ayant une note -->
                            <div class="table_block block_ok">
                                <h4 class="title_ok">Élèves - Notes Saisies ({{ getFilteredElevesOk(matiere).length }})</h4>
                                <div class="table_responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Nom Complet</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(eleve, index) in getFilteredElevesOk(matiere)" :key="index">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ eleve }}</td>
                                                <td><span class="tag ok">Note Saisie</span></td>
                                            </tr>
                                            <tr v-if="getFilteredElevesOk(matiere).length === 0">
                                                <td colspan="3" class="empty_msg">Aucun élève dans cette catégorie</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Élèves sans note -->
                            <div class="table_block block_not">
                                <h4 class="title_not">Élèves - Notes Manquantes ({{ getFilteredElevesNot(matiere).length }})</h4>
                                <div class="table_responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Nom Complet</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(eleve, index) in getFilteredElevesNot(matiere)" :key="index">
                                                <td>{{ index + 1 }}</td>
                                                <td>{{ eleve }}</td>
                                                <td><span class="tag not">Note Manquante</span></td>
                                            </tr>
                                            <tr v-if="getFilteredElevesNot(matiere).length === 0">
                                                <td colspan="3" class="empty_msg">Aucun élève dans cette catégorie</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>
    </main>

    <footer id="footer" style="margin-top: -40px;">
        <?php require_once "footer.php"; ?>
    </footer>

    <script>
        const initialData = <?php echo json_encode($vue_data); ?>;

        const { createApp } = Vue;

        createApp({
            data() {
                return {
                    classeActive: initialData.classeActive,
                    matieres: initialData.matieres,
                    matieresDetails: initialData.matieresDetails || {},
                    selectedTrimestre: 'Trimestre 1',
                    selectedMatiere: '',
                    searchQuery: '',
                    matiereOuverte: null
                };
            },
            computed: {
                matieresTriees() {
                    return [...this.matieres].sort((a, b) => {
                        const countOkA = this.getElevesOk(a).length;
                        const countOkB = this.getElevesOk(b).length;

                        if (countOkA > 0 && countOkB === 0) return -1;
                        if (countOkA === 0 && countOkB > 0) return 1;
                        
                        return countOkB - countOkA;
                    });
                },
                matieresAffichees() {
                    if (this.selectedMatiere !== '') {
                        return this.matieresTriees.filter(m => m === this.selectedMatiere);
                    }
                    return this.matieresTriees;
                }
            },
            mounted() {
                if (this.matieresTriees.length > 0) {
                    this.matiereOuverte = this.matieresTriees[0];
                }
            },
            methods: {
                toggleAccordion(matiere) {
                    if (this.matiereOuverte === matiere) {
                        this.matiereOuverte = null;
                    } else {
                        this.matiereOuverte = matiere;
                    }
                },
                getElevesOk(matiere) {
                    return (this.matieresDetails[matiere] && this.matieresDetails[matiere].ok) ? this.matieresDetails[matiere].ok : [];
                },
                getElevesNot(matiere) {
                    return (this.matieresDetails[matiere] && this.matieresDetails[matiere].not) ? this.matieresDetails[matiere].not : [];
                },
                getFilteredElevesOk(matiere) {
                    const list = this.getElevesOk(matiere);
                    if (!this.searchQuery) return list;
                    return list.filter(nom => nom.toLowerCase().includes(this.searchQuery.toLowerCase()));
                },
                getFilteredElevesNot(matiere) {
                    const list = this.getElevesNot(matiere);
                    if (!this.searchQuery) return list;
                    return list.filter(nom => nom.toLowerCase().includes(this.searchQuery.toLowerCase()));
                }
            }
        }).mount('#app');
    </script>
</body>
</html>