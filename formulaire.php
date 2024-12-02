<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec validation</title>
</head>
<body>
    <h1>Formulaire</h1>
    <form action="" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        <br><br>
        
        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" required min="1">
        <br><br>
        
        <button type="submit">Envoyer</button>
    </form>

    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $nom = htmlspecialchars($_POST['nom']);
        $age = $_POST['age'];

        // Validation de l'âge
        if (filter_var($age, FILTER_VALIDATE_INT) && $age > 0) {
            // Si l'âge est valide, afficher le message de bienvenue
            echo "<h2>Bienvenue, $nom, vous avez $age ans !</h2>";
        } else {
            // Si la validation échoue, afficher un message d'erreur
            echo "<h2 style='color: red;'>Erreur : Veuillez entrer un âge valide (un entier supérieur à 0) !</h2>";
        }
    }
    ?>
</body>
</html>
