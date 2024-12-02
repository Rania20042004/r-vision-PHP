<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importer des produits CSV</title>
</head>
<body>
    <h1>Importer un fichier CSV de produits</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="csvFile">Choisir un fichier CSV :</label>
        <input type="file" id="csvFile" name="csvFile" accept=".csv" required>
        <br><br>
        <button type="submit">Importer</button>
    </form>

    <?php
    // Vérifier si un fichier CSV a été téléchargé
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csvFile"])) {
        // Récupérer le chemin temporaire du fichier téléchargé
        $fichier = $_FILES["csvFile"]["tmp_name"];

        // Vérifier si le fichier est un CSV
        if (pathinfo($_FILES["csvFile"]["name"], PATHINFO_EXTENSION) === "csv") {
            // Ouvrir le fichier CSV pour lecture
            if (($handle = fopen($fichier, "r")) !== FALSE) {
                // Initialiser un tableau pour stocker les produits
                $produits = [];

                // Sauter la première ligne si elle contient les en-têtes
                $headers = fgetcsv($handle);

                // Lire le contenu du fichier ligne par ligne
                while (($data = fgetcsv($handle)) !== FALSE) {
                    // Stocker les données dans un tableau associatif
                    $produits[] = [
                        "nom" => $data[0],
                        "prix" => (float)$data[1],
                        "quantite" => (int)$data[2]
                    ];
                }
                fclose($handle);

                // Afficher les produits dans un tableau HTML
                echo "<h2>Liste des produits</h2>";
                echo "<table border='1' cellpadding='10' cellspacing='0'>";
                echo "<tr><th>Nom</th><th>Prix (€)</th><th>Quantité</th></tr>";

                foreach ($produits as $produit) {
                    echo "<tr>
                            <td>{$produit['nom']}</td>
                            <td>" . number_format($produit['prix'], 2) . "</td>
                            <td>{$produit['quantite']}</td>
                          </tr>";
                }

                echo "</table>";
            } else {
                echo "<p style='color: red;'>Erreur lors de l'ouverture du fichier CSV.</p>";
            }
        } else {
            echo "<p style='color: red;'>Veuillez télécharger un fichier CSV valide.</p>";
        }
    }
    ?>
</body>
</html>
