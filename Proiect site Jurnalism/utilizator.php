<?php
class Utilizator
{
    private $conn;
    private $table = 'utilizatori';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function adaugaUtilizator($nume, $prenume, $username, $parola)
    {
        $query = "INSERT INTO {$this->table} (nume, prenume, username, parola) VALUES (:nume, :prenume, :username, :parola)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nume', $nume);
        $stmt->bindParam(':prenume', $prenume);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':parola', $parola);

        return $stmt->execute();
    }
}
?>
