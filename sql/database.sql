-- Sistema de Gestão de Manutenção de Veículos
-- Script SQL para criar o banco de dados e tabelas

CREATE DATABASE IF NOT EXISTS vehicle_maintenance;
USE vehicle_maintenance;

-- Tabela de utilizadores
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Para senhas encriptadas
    level INT NOT NULL, -- 1: Administrador, 2: Operador
    active TINYINT(1) DEFAULT 1 -- 1: ativo, 0: inativo
);

-- Tabela de proprietários
CREATE TABLE owners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    address TEXT,
    contact VARCHAR(20),
    email VARCHAR(100)
);

-- Tabela de veículos
CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plate VARCHAR(20) UNIQUE NOT NULL,
    brand VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    model VARCHAR(50) NOT NULL,
    color VARCHAR(30),
    owner_id INT NOT NULL,
    FOREIGN KEY (owner_id) REFERENCES owners(id) ON DELETE CASCADE
);

-- Tabela de agendamentos de manutenção
CREATE TABLE schedules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_time DATETIME NOT NULL,
    type ENUM('Preventiva', 'Corretiva') NOT NULL,
    vehicle_id INT NOT NULL,
    services TEXT,
    responsible_id INT, -- Pode ser NULL se não atribuído
    status ENUM('Agendado', 'Em andamento', 'Concluído', 'Cancelado', 'Pendente') DEFAULT 'Agendado',
    observations TEXT,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE CASCADE,
    FOREIGN KEY (responsible_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Tabela de registos de manutenção
CREATE TABLE maintenances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_time DATETIME NOT NULL,
    vehicle_id INT NOT NULL,
    type VARCHAR(50) NOT NULL,
    services TEXT,
    parts TEXT,
    mileage INT,
    responsible_id INT,
    costs DECIMAL(10,2),
    observations TEXT,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE CASCADE,
    FOREIGN KEY (responsible_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Tabela de alertas
CREATE TABLE alerts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    due_date DATE NOT NULL,
    vehicle_id INT NOT NULL,
    action TEXT NOT NULL,
    responsible_id INT,
    priority ENUM('Alta', 'Média', 'Baixa') DEFAULT 'Média',
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE CASCADE,
    FOREIGN KEY (responsible_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Inserir utilizador administrador padrão
INSERT INTO users (username, password, level, active) VALUES ('admin', '$2y$10$examplehashedpassword', 1, 1);
-- Nota: Substitua a senha por uma hash real, por exemplo, password_hash('admin123', PASSWORD_DEFAULT) em PHP