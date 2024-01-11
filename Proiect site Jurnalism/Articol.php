<?php

class Articol
{
    private $conn;
    private $table = 'articol';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getArticlesByCategory($category)
    {
        $query = "SELECT * FROM {$this->table} WHERE status = 'aprobat' AND categorie = :category";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':category', $category);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function adaugaArticol($titlu, $prezentare, $autor, $continut, $categorie)
    {
        $data = date('Y-m-d');

        $query = "INSERT INTO {$this->table} (titlu, prezentare, autor, continut, data, categorie) VALUES (:titlu, :prezentare, :autor, :continut, :data, :categorie)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':titlu', $titlu);
        $stmt->bindParam(':prezentare', $prezentare);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':continut', $continut);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':categorie', $categorie);

        return $stmt->execute();
    }
    public function updateArticleStatus($id, $newStatus)
    {
        $query = "UPDATE {$this->table} SET status = :newStatus WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':newStatus', $newStatus);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
    public function getArticlesByUser($username)
    {
        $query = "SELECT * FROM articole WHERE autor = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getArticlesInReview()
    {
        $query = "SELECT * FROM {$this->table} ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
