<?php
// controllers/OwnerController.php
require_once __DIR__ . '/../models/Owner.php';
require_once __DIR__ . '/AuthController.php';

class OwnerController {
    private $ownerModel;

    public function __construct() {
        AuthController::checkLogin();
        AuthController::checkLevel(1); // Apenas admin
        $this->ownerModel = new Owner();
    }

    // Listar proprietários
    public function index() {
        $owners = $this->ownerModel->getAll();
        include __DIR__ . '/../views/owners/index.php';
    }

    // Formulário para criar
    public function create() {
        include __DIR__ . '/../views/owners/create.php';
    }

    // Salvar novo proprietário
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];

            if ($this->ownerModel->create($name, $address, $contact, $email)) {
                header('Location: index.php?action=owners');
            } else {
                echo "Erro ao criar proprietário.";
            }
        }
    }

    // Formulário para editar
    public function edit($id) {
        $owner = $this->ownerModel->getById($id);
        include __DIR__ . '/../views/owners/edit.php';
    }

    // Atualizar proprietário
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];

            if ($this->ownerModel->update($id, $name, $address, $contact, $email)) {
                header('Location: index.php?action=owners');
            } else {
                echo "Erro ao atualizar proprietário.";
            }
        }
    }

    // Deletar proprietário
    public function delete($id) {
        if ($this->ownerModel->delete($id)) {
            header('Location: index.php?action=owners');
        } else {
            echo "Erro ao deletar proprietário.";
        }
    }
}
?>