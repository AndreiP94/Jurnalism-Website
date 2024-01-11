<?php
include_once 'Database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $database = new Database();
    $conn = $database->connect();


    if ($database->verifyUser($username, $password)) {

        $query = "SELECT tema FROM utilizatori WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();


        $tema = $stmt->fetchColumn();


        if ($tema !== false) {
            $_SESSION['tema'] = $tema;

            $query = "SELECT rol FROM utilizatori WHERE username = :username";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user['rol'] === 'cititor') {
                header('Location: cititor.php');
                exit();
            } else {
                if ($user['rol'] === 'jurnalist') {
                    header('Location: adauga_articol.php');
                    exit();
                } else {
                    if ($user['rol'] === 'editor') {
                        header('Location: editor.php');
                        exit();
                    }
                }


                header('Location: alta_pagina.php');
                exit();
            }
        } else {
            echo "Eroare la preluarea temei utilizatorului.";
        }
    } else {
        header('Location: login.html');
        exit();
    }
}
?>
