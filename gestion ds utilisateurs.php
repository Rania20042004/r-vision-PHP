<?php
// Tableau associatif pour stocker les utilisateurs
$utilisateurs = [
    1 => ["nom" => "Alice", "email" => "alice@example.com", "role" => "administrateur"],
    2 => ["nom" => "Bob", "email" => "bob@example.com", "role" => "utilisateur"],
    3 => ["nom" => "Charlie", "email" => "charlie@example.com", "role" => "utilisateur"]
];

// Ajouter un utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    if (isset($_POST['ajouter'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        
        // Trouver un nouvel ID
        $nouvelID = max(array_keys($utilisateurs)) + 1;
        $utilisateurs[$nouvelID] = ["nom" => $nom, "email" => $email, "role" => $role];
    }

    // Modifier un utilisateur
    if (isset($_POST['modifier'])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        
        $utilisateurs[$id] = ["nom" => $nom, "email" => $email, "role" => $role];
    }

    // Supprimer un utilisateur
    if (isset($_POST['supprimer'])) {
        $id = $_POST['id'];
        unset($utilisateurs[$id]);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <h1>Gestion des utilisateurs</h1>

    <!-- Formulaire pour ajouter un utilisateur -->
    <h2>Ajouter un utilisateur</h2>
    <form method="post">
        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="role">Rôle:</label>
        <select name="role" required>
            <option value="administrateur">Administrateur</option>
            <option value="utilisateur">Utilisateur</option>
        </select><br><br>

        <button type="submit" name="ajouter">Ajouter l'utilisateur</button>
    </form>

    <!-- Formulaire pour modifier un utilisateur -->
    <h2>Modifier un utilisateur</h2>
    <form method="post">
        <label for="id">ID de l'utilisateur à modifier:</label>
        <input type="number" name="id" required><br><br>

        <label for="nom">Nom:</label>
        <input type="text" name="nom" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br><br>

        <label for="role">Rôle:</label>
        <select name="role" required>
            <option value="administrateur">Administrateur</option>
            <option value="utilisateur">Utilisateur</option>
        </select><br><br>

        <button type="submit" name="modifier">Modifier l'utilisateur</button>
    </form>

    <!-- Formulaire pour supprimer un utilisateur -->
    <h2>Supprimer un utilisateur</h2>
    <form method="post">
        <label for="id">ID de l'utilisateur à supprimer:</label>
        <input type="number" name="id" required><br><br>

        <button type="submit" name="supprimer">Supprimer l'utilisateur</button>
    </form>

    <h2>Liste des utilisateurs</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>
        <?php
        // Afficher les utilisateurs
        foreach ($utilisateurs as $id => $utilisateur) {
            echo "<tr>
                    <td>$id</td>
                    <td>{$utilisateur['nom']}</td>
                    <td>{$utilisateur['email']}</td>
                    <td>{$utilisateur['role']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
