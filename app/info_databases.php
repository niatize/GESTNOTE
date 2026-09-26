<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../data_base.php";

$eleve_ok = []; // Élèves dont les notes ont été remplies
$eleve_not = []; // Élèves dont les notes n'ont pas été remplies

// Récupération de la classe en session
$classe_en_cour = $_SESSION['classe_en_cour'] ?? '';

try {
    // 1. Récupération de l'id de la classe en cours
    $sql = $pdo->prepare('SELECT id_class FROM classe WHERE nom = :nom');
    $sql->execute(["nom" => $classe_en_cour]);
    $id_class = $sql->fetchColumn();

    // 2. Sélection des élèves de la classe
    $sql = $pdo->prepare('SELECT id_eleve, nom_complet
                        FROM eleve
                        WHERE nom_classe = :nom
                        ORDER BY nom_complet ASC');
    $sql->execute(['nom' => $classe_en_cour]);
    $liste_des_élèves = $sql->fetchAll(PDO::FETCH_ASSOC);

    // 3. Sélection des matières pour la classe active
    $sql = $pdo->prepare('SELECT matiere.nom 
                        FROM matiere 
                        INNER JOIN matiere_coeff ON matiere_coeff.id_mat = matiere.id_mat 
                        WHERE matiere_coeff.id_class = :id_class
                        ORDER BY matiere.nom ASC');
    $sql->execute(['id_class' => $id_class]);
    $matieres_list = $sql->fetchAll(PDO::FETCH_COLUMN);

    // 4. Filtrage des élèves (notes remplies vs non remplies)
    foreach ($liste_des_élèves as $eleve) {
        $sql = $pdo->prepare('SELECT nom_complet
                            FROM eleve
                            INNER JOIN notes ON notes.id_eleve = eleve.id_eleve
                            WHERE eleve.id_eleve = :id_eleve AND notes.note_seq != ""');
        $sql->execute(['id_eleve' => $eleve['id_eleve']]);
        $eleve_note_ok = $sql->fetch(PDO::FETCH_COLUMN);

        if ($eleve_note_ok) {
            $eleve_ok[] = $eleve_note_ok;
        } else {
            $eleve_not[] = $eleve['nom_complet'];
        }
    }

    // Évite les doublons si un élève possède plusieurs notes dans différentes matières
    $eleve_ok = array_values(array_unique($eleve_ok));

    // Extraction propre de tous les noms d'élèves de la classe
    $tous_les_eleves = array_column($liste_des_élèves, 'nom_complet');

    // Construction du tableau de résultats à renvoyer en JSON
    $bdd_receip = [
        "eleves" => $tous_les_eleves,
        "matieres" => $matieres_list,
        "eleves_notes_remplis" => $eleve_ok,
        "eleve_note_non_remplis" => $eleve_not
    ];

    echo json_encode($bdd_receip, JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    die("ERREUR : " . $e->getMessage());
}
?>