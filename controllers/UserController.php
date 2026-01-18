<?php
// controllers/UserController.php
require_once '../models/User.php';
require_once 'AuthController.php';

class UserController {
    private $userModel;

    public function __construct() {
        AuthController::checkLogin();
        AuthController::checkLevel(1); // Apenas admin
        $this->userModel = new User();
    }

    // Listar utilizadores
    public function index() {
        $users = $this->userModel->getAll();
        include '../views/users/index.php';
    }

    // Formulário para criar
    public function create() {
        include '../views/users/create.php';
    }

    // Salvar novo utilizador
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $level = $_POST['level'];

            if ($this->userModel->create($username, $password, $level)) {
                header('Location: index.php?action=users');
            } else {
                echo "Erro ao criar utilizador.";
            }
        }
    }

    // Formulário para editar
    public function edit($id) {
        $user = $this->userModel->getById($id);
        include '../views/users/edit.php';
    }

    // Atualizar utilizador
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $level = $_POST['level'];
            $active = isset($_POST['active']) ? 1 : 0;

            if ($this->userModel->update($id, $username, $level, $active)) {
                header('Location: index.php?action=users');
            } else {
                echo "Erro ao atualizar utilizador.";
            }
        }
    }

    // Deletar utilizador
    public function delete($id) {
        if ($this->userModel->delete($id)) {
            header('Location: index.php?action=users');
        } else {
            echo "Erro ao deletar utilizador.";
        }
    }
}
?>