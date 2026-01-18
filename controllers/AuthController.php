<?php
// controllers/AuthController.php
session_start();
require_once '../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    // Processar login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->authenticate($username, $password);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = $user['level'];
                header('Location: index.php');
                exit;
            } else {
                $error = "Credenciais inválidas.";
                include '../views/login.php';
            }
        } else {
            include '../views/login.php';
        }
    }

    // Logout
    public function logout() {
        session_destroy();
        header('Location: login.php');
        exit;
    }

    // Verificar se está logado
    public static function checkLogin() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: login.php');
            exit;
        }
    }

    // Verificar nível de acesso
    public static function checkLevel($requiredLevel) {
        if ($_SESSION['level'] > $requiredLevel) {
            die("Acesso negado.");
        }
    }
}
?>