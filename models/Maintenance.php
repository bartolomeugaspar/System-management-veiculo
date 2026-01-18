<?php
// models/Maintenance.php
require_once '../config/database.php';

class Maintenance {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Obter todos os registos de manutenção
    public function getAll() {
        $stmt = $this->pdo->query("SELECT m.*, v.plate, u.username as responsible FROM maintenances m JOIN vehicles v ON m.vehicle_id = v.id LEFT JOIN users u ON m.responsible_id = u.id");
        return $stmt->fetchAll();
    }

    // Criar registo de manutenção
    public function create($date_time, $vehicle_id, $type, $services, $parts, $mileage, $responsible_id, $costs, $observations) {
        $stmt = $this->pdo->prepare("INSERT INTO maintenances (date_time, vehicle_id, type, services, parts, mileage, responsible_id, costs, observations) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$date_time, $vehicle_id, $type, $services, $parts, $mileage, $responsible_id, $costs, $observations]);
    }

    // Atualizar registo de manutenção
    public function update($id, $date_time, $vehicle_id, $type, $services, $parts, $mileage, $responsible_id, $costs, $observations) {
        $stmt = $this->pdo->prepare("UPDATE maintenances SET date_time = ?, vehicle_id = ?, type = ?, services = ?, parts = ?, mileage = ?, responsible_id = ?, costs = ?, observations = ? WHERE id = ?");
        return $stmt->execute([$date_time, $vehicle_id, $type, $services, $parts, $mileage, $responsible_id, $costs, $observations, $id]);
    }

    // Deletar registo de manutenção
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM maintenances WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Obter por ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT m.*, v.plate, u.username as responsible FROM maintenances m JOIN vehicles v ON m.vehicle_id = v.id LEFT JOIN users u ON m.responsible_id = u.id WHERE m.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>