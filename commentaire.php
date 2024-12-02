<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soumettre un commentaire</title>
</head>
<body>
    <h1>Soumettre un commentaire</h1>
    <form action="" method="post">
        <label for="nom">Votre nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br><br>

        <label for="commentaire">Votre commentaire :</label>
        <textarea id="commentaire" name="commentaire" rows="5" cols="40" required></textarea>
        <br><br>

        <button type="submit">Soumettre</button>
    </form>

    <?php
    // Démarrer une session pour stocker les commentaires
    session_start();

    // Initialiser le tableau des commentaires si ce n'est pas encore fait
    if (!isset($_SESSION['commentaires'])) {
        $_SESSION['commentaires'] = [];
    }

    // Ajouter un commentaire si le formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = htmlspecialchars($_POST['nom']);
        $commentaire = htmlspecialchars($_POST['commentaire']);
        $horodatage = date("Y-m-d H:i:s");

        // Ajouter le commentaire au tableau
        $_SESSION['commentaires'][] = [
            "nom" => $nom,
            "commentaire" => $commentaire,
            "horodatage" => $horodatage
        ];
    }

    // Afficher les commentaires
    if (!empty($_SESSION['commentaires'])) {
        echo "<h2>Commentaires soumis</h2>";
        foreach ($_SESSION['commentaires'] as $comm) {
            echo "<div style='border: 1px solid #ccc; padding: 10px; margin: 10px 0;'>";
            echo "<strong>{$comm['nom']}</strong> a écrit le <em>{$comm['horodatage']}</em> :";
            echo "<p>{$comm['commentaire']}</p>";
            echo "</div>";
        }
    } else {
        echo "<h2>Aucun commentaire soumis pour l'instant.</h2>";
    }
    ?>
</body>
</html>
