<?php
// models/Owner.php
require_once '../config/database.php';

class Owner {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Obter todos os proprietários
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM owners");
        return $stmt->fetchAll();
    }

    // Criar proprietário
    public function create($name, $address, $contact, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO owners (name, address, contact, email) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $address, $contact, $email]);
    }

    // Atualizar proprietário
    public function update($id, $name, $address, $contact, $email) {
        $stmt = $this->pdo->prepare("UPDATE owners SET name = ?, address = ?, contact = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $address, $contact, $email, $id]);
    }

    // Deletar proprietário
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM owners WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Obter por ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM owners WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>