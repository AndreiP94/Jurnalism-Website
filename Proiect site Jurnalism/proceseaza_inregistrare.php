<?php
include_once 'Database.php';
include_once 'Utilizator.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $username = $_POST['username'];
    $parola = $_POST['parola']; // Se recomandă folosirea funcției password_hash pentru a stoca parolele într-un mod sigur

    $database = new Database();
    $conn = $database->connect();

    $utilizator = new Utilizator($conn);

    if ($utilizator->adaugaUtilizator($nume, $prenume, $username, $parola)) {
        header('Location: login.html');
        exit();
    } else {
        echo "Eroare la înregistrare. <a href='autentificare.html'>Încearcă din nou</a>";
        exit();
    }
}

?>
