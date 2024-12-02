<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Températures des villes</title>
</head>
<body>
    <h1>Villes et températures</h1>

    <?php
    // Tableau associatif des villes et leurs températures (en °C)
    $villes = [
        "Paris" => 15.3,
        "Londres" => 12.7,
        "Berlin" => 18.2,
        "Madrid" => 22.4,
        "Rome" => 20.8,
        "Lisbonne" => 24.1
    ];

    // Rechercher la ville ayant la température la plus élevée
    $villeMax = "";
    $tempMax = -INF; // Initialiser à une valeur très basse

    foreach ($villes as $ville => $temperature) {
        if ($temperature > $tempMax) {
            $tempMax = $temperature;
            $villeMax = $ville;
        }
    }

    // Afficher les villes et leurs températures
    echo "<h2>Températures des villes</h2>";
    echo "<ul>";
    foreach ($villes as $ville => $temperature) {
        echo "<li><strong>$ville</strong> : $temperature °C</li>";
    }
    echo "</ul>";

    // Afficher la ville avec la température la plus élevée
    echo "<h2>Ville la plus chaude</h2>";
    echo "<p>La ville ayant la température la plus élevée est <strong>$villeMax</strong> avec <strong>$tempMax °C</strong>.</p>";
    ?>
</body>
</html>
