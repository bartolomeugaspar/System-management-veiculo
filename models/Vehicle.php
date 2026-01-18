<?php
// models/Vehicle.php
require_once '../config/database.php';

class Vehicle {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Obter todos os veículos com proprietário
    public function getAll() {
        $stmt = $this->pdo->query("SELECT v.*, o.name as owner_name FROM vehicles v JOIN owners o ON v.owner_id = o.id");
        return $stmt->fetchAll();
    }

    // Criar veículo
    public function create($plate, $brand, $year, $model, $color, $owner_id) {
        $stmt = $this->pdo->prepare("INSERT INTO vehicles (plate, brand, year, model, color, owner_id) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$plate, $brand, $year, $model, $color, $owner_id]);
    }

    // Atualizar veículo
    public function update($id, $plate, $brand, $year, $model, $color, $owner_id) {
        $stmt = $this->pdo->prepare("UPDATE vehicles SET plate = ?, brand = ?, year = ?, model = ?, color = ?, owner_id = ? WHERE id = ?");
        return $stmt->execute([$plate, $brand, $year, $model, $color, $owner_id, $id]);
    }

    // Deletar veículo
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM vehicles WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Obter por ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT v.*, o.name as owner_name FROM vehicles v JOIN owners o ON v.owner_id = o.id WHERE v.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>