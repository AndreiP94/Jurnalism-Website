<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articole</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
   <p>Bine ai venit !</p>
    <div class="header-buttons">
        <a href="index.php" class="button">Delogare</a>
    </div>
</header>

<?php
include_once 'Database.php';
include_once 'Articol.php';


$database = new Database();
$db = $database->connect();


$articol = new Articol($db);


$categorii = array('artistic', 'tehnic', 'science', 'moda');

foreach ($categorii as $categorie) {
    echo "<section class='category'>";
    echo "<h2>$categorie</h2>";

    $articole = $articol->getArticlesByCategory($categorie);

    if (count($articole) > 0) {
        echo '<table>';
        echo '<tr><th>Titlu</th><th>Autor</th><th>Data</th><th>Continut</th></tr>';

        foreach ($articole as $art) {
            echo "<tr><td>{$art['titlu']}</td><td>{$art['autor']}</td><td>{$art['data']}</td> <td>{$art['continut']}</td></tr>";
        }

        echo '</table>';
    } else {
        echo '<p>Niciun articol disponibil în această categorie.</p>';
    }
    echo "</section>";
}
?>

</body>
</html>
