<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'proiect';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name};port=3306", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Eroare de conectare: ' . $e->getMessage();
        }

        return $this->conn;
    }
    public function verifyUser($username, $password) {
        try {
            $query = "SELECT * FROM utilizatori WHERE username = :username AND parola = :password";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo 'Eroare de verificare a utilizatorului: ' . $e->getMessage();
            return false;
        }
    }
}
?>