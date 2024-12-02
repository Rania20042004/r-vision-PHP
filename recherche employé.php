<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'employé</title>
</head>
<body>
    <h1>Rechercher un employé</h1>
    <form action="" method="post">
        <label for="nom">Nom de l'employé :</label>
        <input type="text" id="nom" name="nom" required>
        <br><br>
        <button type="submit">Rechercher</button>
    </form>

    <?php
    // Définir un tableau associatif contenant des informations sur 5 employés
    $employes = [
        [
            "nom" => "Alice Dupont",
            "poste" => "Développeur",
            "salaire" => 45000
        ],
        [
            "nom" => "Bob Martin",
            "poste" => "Designer",
            "salaire" => 40000
        ],
        [
            "nom" => "Charlie Durant",
            "poste" => "Chef de projet",
            "salaire" => 60000
        ],
        [
            "nom" => "Diana Leblanc",
            "poste" => "Analyste",
            "salaire" => 47000
        ],
        [
            "nom" => "Ethan Moreau",
            "poste" => "Testeur",
            "salaire" => 38000
        ]
    ];

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomRecherche = htmlspecialchars($_POST['nom']);
        $trouve = false;

        // Rechercher l'employé dans le tableau
        foreach ($employes as $employe) {
            if (strcasecmp($employe['nom'], $nomRecherche) == 0) {
                // Employé trouvé
                echo "<h2>Informations sur l'employé :</h2>";
                echo "<ul>
                        <li><strong>Nom :</strong> {$employe['nom']}</li>
                        <li><strong>Poste :</strong> {$employe['poste']}</li>
                        <li><strong>Salaire :</strong> {$employe['salaire']} €</li>
                      </ul>";
                $trouve = true;
                break;
            }
        }

        // Si l'employé n'est pas trouvé
        if (!$trouve) {
            echo "<h2 style='color: red;'>Employé non trouvé !</h2>";
        }
    }
    ?>
</body>
</html>
