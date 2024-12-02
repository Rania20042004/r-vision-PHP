<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Formulaire de connexion</h1>
    <form action="" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Se connecter</button>
    </form>

    <?php
    // Tableau associatif contenant les informations des utilisateurs
    $utilisateurs = [
        [
            "email" => "alice@example.com",
            "mot_de_passe" => "password123"
        ],
        [
            "email" => "bob@example.com",
            "mot_de_passe" => "bobpass456"
        ],
        [
            "email" => "charlie@example.com",
            "mot_de_passe" => "charlie789"
        ]
    ];

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emailSaisi = htmlspecialchars($_POST['email']);
        $motDePasseSaisi = htmlspecialchars($_POST['password']);
        $utilisateurTrouve = false;

        // Vérifier les informations saisies dans le tableau
        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur['email'] === $emailSaisi && $utilisateur['mot_de_passe'] === $motDePasseSaisi) {
                $utilisateurTrouve = true;
                break;
            }
        }

        // Afficher le message correspondant
        if ($utilisateurTrouve) {
            echo "<h2 style='color: green;'>Connexion réussie ! Bienvenue $emailSaisi.</h2>";
        } else {
            echo "<h2 style='color: red;'>Erreur : Email ou mot de passe incorrect.</h2>";
        }
    }
    ?>
</body>
</html>
