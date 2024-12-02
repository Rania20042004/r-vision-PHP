<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>
<body>
    <h1>Système de panier</h1>
    <form action="" method="post">
        <label for="produit">Nom du produit :</label>
        <input type="text" id="produit" name="produit" required>
        <br><br>

        <label for="quantite">Quantité :</label>
        <input type="number" id="quantite" name="quantite" min="1" required>
        <br><br>

        <label for="prix">Prix unitaire (€) :</label>
        <input type="number" id="prix" name="prix" step="0.01" min="0.01" required>
        <br><br>

        <button type="submit">Ajouter au panier</button>
    </form>

    <?php
    // Démarrer une session pour stocker les données du panier
    session_start();

    // Initialiser le panier si ce n'est pas encore fait
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    // Ajouter un produit au panier si le formulaire est soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $produit = htmlspecialchars($_POST['produit']);
        $quantite = intval($_POST['quantite']);
        $prix = floatval($_POST['prix']);

        // Ajouter le produit dans le tableau du panier
        $_SESSION['panier'][] = [
            "produit" => $produit,
            "quantite" => $quantite,
            "prix" => $prix
        ];
    }

    // Afficher le panier
    if (!empty($_SESSION['panier'])) {
        echo "<h2>Votre panier</h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0'>";
        echo "<tr><th>Produit</th><th>Quantité</th><th>Prix unitaire (€)</th><th>Total (€)</th></tr>";

        $totalGeneral = 0;
        foreach ($_SESSION['panier'] as $article) {
            $total = $article['quantite'] * $article['prix'];
            $totalGeneral += $total;
            echo "<tr>
                    <td>{$article['produit']}</td>
                    <td>{$article['quantite']}</td>
                    <td>" . number_format($article['prix'], 2) . "</td>
                    <td>" . number_format($total, 2) . "</td>
                  </tr>";
        }
        echo "</table>";
        echo "<h3>Total général : " . number_format($totalGeneral, 2) . " €</h3>";
    } else {
        echo "<h2>Votre panier est vide.</h2>";
    }
    ?>
</body>
</html>
