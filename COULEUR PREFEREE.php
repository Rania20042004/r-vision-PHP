<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de la couleur préférée</title>
</head>
<body>
    <h1>Choisissez votre couleur préférée</h1>
    <form action="" method="post">
        <label for="couleur">Couleur :</label>
        <select id="couleur" name="couleur" required>
            <option value="" disabled selected>--Sélectionnez une couleur--</option>
            <option value="Rouge">Rouge</option>
            <option value="Vert">Vert</option>
            <option value="Bleu">Bleu</option>
        </select>
        <br><br>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer la couleur choisie
        $couleur = htmlspecialchars($_POST['couleur']);
        
        // Afficher le message
        echo "<h2>Votre couleur préférée est : $couleur</h2>";
    }
    ?>
</body>
</html>
