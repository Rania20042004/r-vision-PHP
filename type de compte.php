<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type de compte</title>
</head>
<body>
    <h1>Choisissez votre type de compte</h1>
    <form action="" method="post">
        <label for="typeCompte">Type de compte :</label>
        <select id="typeCompte" name="typeCompte" required>
            <option value="" disabled selected>--Sélectionnez un type de compte--</option>
            <option value="Administrateur">Administrateur</option>
            <option value="Utilisateur">Utilisateur simple</option>
        </select>
        <br><br>
        <button type="submit">Valider</button>
    </form>

    <?php
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer le type de compte sélectionné
        $typeCompte = htmlspecialchars($_POST['typeCompte']);

        // Afficher un message en fonction du type de compte
        if ($typeCompte === "Administrateur") {
            echo "<h2>Bienvenue, administrateur !</h2>";
        } elseif ($typeCompte === "Utilisateur") {
            echo "<h2>Bienvenue, utilisateur simple !</h2>";
        } else {
            echo "<h2>Type de compte invalide.</h2>";
        }
    }
    ?>
</body>
</html>
