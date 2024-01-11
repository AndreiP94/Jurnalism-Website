<?php
include_once 'Database.php';
include_once 'Articol.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titlu = $_POST['titlu'];
    $prezentare = $_POST['prezentare'];
    $autor = $_POST['autor'];
    $continut = $_POST['continut'];
    $categorie = $_POST['categorie'];

    $database = new Database();
    $conn = $database->connect();

    $articol = new Articol($conn);

    if ($articol->adaugaArticol($titlu, $prezentare, $autor, $continut, $categorie)) {
        header('Location: adauga_articol.php');
        exit();
    } else {
        echo "Eroare la adăugarea articolului. <a href='adauga_articol.php'>Încearcă din nou</a>";
        exit();
    }
}
?>
