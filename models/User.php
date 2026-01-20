<?php
// models/User.php
//echo __DIR__ . '../config/database.php';
//ie();
// echo __DIR__;
include_once __DIR__.'/../config/database.php';
class User {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    // Verificar login
    public function authenticate($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ? AND active = 1");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    // Obter todos os utilizadores (apenas admin)
    public function getAll() {
        $stmt = $this->pdo->query("SELECT id, username, level, active FROM users");
        return $stmt->fetchAll();
    }

    // Criar utilizador
    public function create($username, $password, $level) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, level) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $hashedPassword, $level]);
    }

    // Atualizar utilizador
    public function update($id, $username, $level, $active) {
        $stmt = $this->pdo->prepare("UPDATE users SET username = ?, level = ?, active = ? WHERE id = ?");
        return $stmt->execute([$username, $level, $active, $id]);
    }

    // Deletar utilizador
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Obter por ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT id, username, level, active FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
?>