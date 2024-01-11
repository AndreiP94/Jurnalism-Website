
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugă Articol Nou</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    session_start();
?>
<header>
    <h2>Bine ai venit , jurnalistule !</h2>
    <br>
</header>
<div class="article-form">
    <h2>Adaugă Articol Nou</h2>
    <form action="proceseaza_articol.php" method="post">
        <label for="titlu">Titlu:</label>
        <input type="text" id="titlu" name="titlu" required>

        <label for="prezentare">Prezentare:</label>
        <input type="text" id="prezentare" name="prezentare" required>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required>

        <label for="continut">Conținut:</label>
        <textarea id="continut" name="continut" rows="4" required></textarea>

        <label for="categorie">Categorie:</label>
        <input type="text" id="categorie" name="categorie" value="<?php echo isset($_SESSION['tema']) ? $_SESSION['tema'] : ''; ?>" readonly>



        <button type="submit" class="button">Adaugă Articol</button>
    </form>
</div>
<br>
<div class="header-buttons">
    <a href="index.php" class="button">Delogare</a>
</div>
</body>
</html>
