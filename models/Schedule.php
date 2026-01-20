<?php
// models/Schedule.php
require_once __DIR__ . '/../config/database.php';

class Schedule {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Obter todos os agendamentos
    public function getAll() {
        $stmt = $this->pdo->query("SELECT s.*, v.plate, u.username as responsible FROM schedules s JOIN vehicles v ON s.vehicle_id = v.id LEFT JOIN users u ON s.responsible_id = u.id");
        return $stmt->fetchAll();
    }

    // Criar agendamento
    public function create($date_time, $type, $vehicle_id, $services, $responsible_id, $observations) {
        $stmt = $this->pdo->prepare("INSERT INTO schedules (date_time, type, vehicle_id, services, responsible_id, observations) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$date_time, $type, $vehicle_id, $services, $responsible_id, $observations]);
    }

    // Atualizar agendamento
    public function update($id, $date_time, $type, $vehicle_id, $services, $responsible_id, $status, $observations) {
        $stmt = $this->pdo->prepare("UPDATE schedules SET date_time = ?, type = ?, vehicle_id = ?, services = ?, responsible_id = ?, status = ?, observations = ? WHERE id = ?");
        return $stmt->execute([$date_time, $type, $vehicle_id, $services, $responsible_id, $status, $observations, $id]);
    }

    // Deletar agendamento
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM schedules WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Obter por ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT s.*, v.plate, u.username as responsible FROM schedules s JOIN vehicles v ON s.vehicle_id = v.id LEFT JOIN users u ON s.responsible_id = u.id WHERE s.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>