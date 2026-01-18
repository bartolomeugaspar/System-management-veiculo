<?php
// config/database.php
// Configuração da conexão com o banco de dados

$host = 'localhost';
$dbname = 'vehicle_maintenance';
$username = 'root'; // Altere se necessário
$password = ''; // Altere se necessário

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>