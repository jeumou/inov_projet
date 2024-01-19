

<?php
// Vérifie si le formulaire a été soumis
if (isset($_POST['delall'])) {
    // Inclure le fichier de connexion à la base de données
    include("../inc/connexion.php");

    try {
        // Récupérer les identifiants des éléments à supprimer
        $ids = array_map('intval', $_POST['checkbox']);

        // Vérifier s'il y a des éléments à supprimer
        if (!empty($ids)) {
            // Créer une chaîne de paramètres liés pour la requête PDO
            $params = implode(',', array_fill(0, count($ids), '?'));

            // Préparer et exécuter la requête DELETE avec des paramètres liés
            $stmt = $db->prepare("DELETE FROM membres WHERE id IN ($params)");
            $stmt->execute($ids);

            // Afficher un message de succès
            echo "Suppression réussie!";
        } else {
            // Afficher un message si aucune case n'est cochée
            echo "Veuillez sélectionner au moins un élément à supprimer.";
        }
    } catch (PDOException $e) {
        // Gérer les erreurs de suppression
        echo "Suppression échouée : " . $e->getMessage();
    }
} else {
    // Gérer le cas où le formulaire n'a pas été soumis
    echo "Le formulaire n'a pas été soumis.";
}
?>


