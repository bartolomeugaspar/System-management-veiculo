<?php
// models/Alert.php
require_once __DIR__ .'/../config/database.php';

class Alert {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Obter todos os alertas
    public function getAll() {
        $stmt = $this->pdo->query("SELECT a.*, v.plate, u.username as responsible FROM alerts a JOIN vehicles v ON a.vehicle_id = v.id LEFT JOIN users u ON a.responsible_id = u.id");
        return $stmt->fetchAll();
    }

    // Criar alerta
    public function create($due_date, $vehicle_id, $action, $responsible_id, $priority) {
        $stmt = $this->pdo->prepare("INSERT INTO alerts (due_date, vehicle_id, action, responsible_id, priority) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$due_date, $vehicle_id, $action, $responsible_id, $priority]);
    }

    // Atualizar alerta
    public function update($id, $due_date, $vehicle_id, $action, $responsible_id, $priority) {
        $stmt = $this->pdo->prepare("UPDATE alerts SET due_date = ?, vehicle_id = ?, action = ?, responsible_id = ?, priority = ? WHERE id = ?");
        return $stmt->execute([$due_date, $vehicle_id, $action, $responsible_id, $priority, $id]);
    }

    // Deletar alerta
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM alerts WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Obter por ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT a.*, v.plate, u.username as responsible FROM alerts a JOIN vehicles v ON a.vehicle_id = v.id LEFT JOIN users u ON a.responsible_id = u.id WHERE a.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Obter alertas próximos (ex: próximos 7 dias)
    public function getUpcoming($days = 7) {
        $stmt = $this->pdo->prepare("SELECT a.*, v.plate FROM alerts a JOIN vehicles v ON a.vehicle_id = v.id WHERE a.due_date <= DATE_ADD(CURDATE(), INTERVAL ? DAY) AND a.due_date >= CURDATE()");
        $stmt->execute([$days]);
        return $stmt->fetchAll();
    }
}
?>