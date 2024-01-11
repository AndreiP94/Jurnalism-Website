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
    <h1> Site articole jurnalism</h1>
    <div class="header-buttons">
        <a href="login.html" class="button">Logare</a>
        <a href="autentificare.html" class="button">Inregistrare</a>
    </div>
</header>

<?php
include_once 'Database.php';
include_once 'Articol.php';


$database = new Database();
$db = $database->connect();


$articol = new Articol($db);

$categorii = array('Artistic', 'Tehnic', 'Science', 'Moda');

foreach ($categorii as $categorie) {
    echo "<section class='category'>";
    echo "<h2>$categorie</h2>";

    $articole = $articol->getArticlesByCategory($categorie);

    if (count($articole) > 0) {
        echo '<table>';
        echo '<tr><th>Titlu</th><th>Prezentare</th><th>Autor</th><th>Data</th><th>Continut</th></tr>';

        foreach ($articole as $art) {
            echo "<tr><td>{$art['titlu']}</td><td>{$art['prezentare']}</td><td>{$art['autor']}</td><td>{$art['data']}</td> 
<td><p>Pentru a vizualiza continutul trebuie sa va logati: <a href='login.html' class='button'>Logare</a></p></td></tr>";
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
