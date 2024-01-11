<?php
include_once 'Database.php';
include_once 'Articol.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $newStatus = $_GET['status'];

    $database = new Database();
    $conn = $database->connect();

    $articol = new Articol($conn);

    if ($articol->updateArticleStatus($id, $newStatus)) {
        header('Location: editor.php');
        exit();
    } else {
        echo "Eroare la actualizarea statusului. <a href='editor.php'>Încearcă din nou</a>";
        exit();
    }
}
?>
