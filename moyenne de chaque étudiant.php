<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul des moyennes des étudiants</title>
</head>
<body>
    <h1>Calcul des moyennes des étudiants</h1>

    <?php
    // Tableau associatif imbriqué contenant des informations sur les étudiants et leurs notes
    $etudiants = [
        "Alice" => [
            "math" => 16,
            "francais" => 14,
            "histoire" => 18
        ],
        "Bob" => [
            "math" => 12,
            "francais" => 10,
            "histoire" => 15
        ],
        "Charlie" => [
            "math" => 18,
            "francais" => 17,
            "histoire" => 19
        ],
        "David" => [
            "math" => 8,
            "francais" => 9,
            "histoire" => 7
        ]
    ];

    // Fonction pour calculer la moyenne d'un étudiant
    function calculerMoyenne($notes) {
        $total = 0;
        $compte = count($notes);
        foreach ($notes as $note) {
            $total += $note;
        }
        return $total / $compte;
    }

    // Afficher les moyennes des étudiants
    echo "<h2>Résultats des étudiants</h2>";
    echo "<table border='1' cellpadding='10' cellspacing='0'>";
    echo "<tr><th>Nom</th><th>Moyenne</th><th>Notes</th></tr>";

    foreach ($etudiants as $nom => $notes) {
        $moyenne = calculerMoyenne($notes);
        echo "<tr>";
        echo "<td>$nom</td>";
        echo "<td>" . number_format($moyenne, 2) . "</td>";
        echo "<td>";

        // Afficher les notes de l'étudiant par matière
        foreach ($notes as $matiere => $note) {
            echo "<strong>$matiere</strong> : $note <br>";
        }
        
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
