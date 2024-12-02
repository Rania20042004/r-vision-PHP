<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul de la somme</title>
</head>
<body>
    <h1>Entrez deux nombres</h1>
    <form action="" method="get">
        <label for="nombre1">Nombre 1 :</label>
        <input type="number" id="nombre1" name="nombre1" required>
        <br><br>

        <label for="nombre2">Nombre 2 :</label>
        <input type="number" id="nombre2" name="nombre2" required>
        <br><br>

        <button type="submit">Calculer</button>
    </form>

    <?php
    // Vérifier si les deux nombres sont fournis
    if (isset($_GET['nombre1']) && isset($_GET['nombre2'])) {
        // Récupérer les nombres
        $nombre1 = $_GET['nombre1'];
        $nombre2 = $_GET['nombre2'];

        // Calculer la somme
        $somme = $nombre1 + $nombre2;

        // Afficher le résultat
        echo "<h2>La somme de $nombre1 et $nombre2 est : $somme</h2>";
    }
    ?>
</body>
</html>
