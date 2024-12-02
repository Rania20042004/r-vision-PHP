<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélection de produits</title>
</head>
<body>
    <h1>Choisissez vos produits</h1>

    <form action="" method="post">
        <h2>Produits disponibles :</h2>
        <label>
            <input type="checkbox" name="produits[]" value="Produit A - 15.99">
            Produit A - 15.99 €
        </label><br>
        <label>
            <input type="checkbox" name="produits[]" value="Produit B - 22.50">
            Produit B - 22.50 €
        </label><br>
        <label>
            <input type="checkbox" name="produits[]" value="Produit C - 9.99">
            Produit C - 9.99 €
        </label><br>
        <label>
            <input type="checkbox" name="produits[]" value="Produit D - 12.45">
            Produit D - 12.45 €
        </label><br>
        <label>
            <input type="checkbox" name="produits[]" value="Produit E - 5.75">
            Produit E - 5.75 €
        </label><br><br>

        <button type="submit">Soumettre</button>
    </form>

    <?php
    // Vérifier si des produits ont été sélectionnés
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produits'])) {
        // Récupérer les produits sélectionnés
        $produitsSelectionnes = $_POST['produits'];
        $prixTotal = 0;

        // Afficher les produits sélectionnés et calculer le prix total
        echo "<h2>Produits sélectionnés :</h2>";
        echo "<ul>";
        foreach ($produitsSelectionnes as $produit) {
            echo "<li>$produit</li>";
            // Extraire le prix du produit à partir de la chaîne (dernière partie après le tiret)
            $prix = floatval(substr($produit, strrpos($produit, '-') + 2));
            $prixTotal += $prix;
        }
        echo "</ul>";

        // Afficher le prix total
        echo "<h3>Prix total : " . number_format($prixTotal, 2) . " €</h3>";
    } else {
        echo "<h2>Aucun produit sélectionné.</h2>";
    }
    ?>
</body>
</html>
