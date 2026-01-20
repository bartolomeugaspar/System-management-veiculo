<?php
// controllers/AlertController.php
require_once __DIR__ . '/../models/Alert.php';
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/AuthController.php';

class AlertController {
    private $alertModel;
    private $vehicleModel;
    private $userModel;

    public function __construct() {
        AuthController::checkLogin();
        $this->alertModel = new Alert();
        $this->vehicleModel = new Vehicle();
        $this->userModel = new User();
    }

    // Listar alertas
    public function index() {
        $alerts = $this->alertModel->getAll();
        include __DIR__ . '/../views/alerts/index.php';
    }

    // Formulário para criar
    public function create() {
        AuthController::checkLevel(1);
        $vehicles = $this->vehicleModel->getAll();
        $users = $this->userModel->getAll();
        include '../views/alerts/create.php';
    }

    // Salvar novo alerta
    public function store() {
        AuthController::checkLevel(1);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $due_date = $_POST['due_date'];
            $vehicle_id = $_POST['vehicle_id'];
            $action = $_POST['action'];
            $responsible_id = $_POST['responsible_id'];
            $priority = $_POST['priority'];

            if ($this->alertModel->create($due_date, $vehicle_id, $action, $responsible_id, $priority)) {
                header('Location: index.php?action=alerts');
            } else {
                echo "Erro ao criar alerta.";
            }
        }
    }

    // Formulário para editar
    public function edit($id) {
        AuthController::checkLevel(1);
        $alert = $this->alertModel->getById($id);
        $vehicles = $this->vehicleModel->getAll();
        $users = $this->userModel->getAll();
        include '../views/alerts/edit.php';
    }

    // Atualizar alerta
    public function update($id) {
        AuthController::checkLevel(1);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $due_date = $_POST['due_date'];
            $vehicle_id = $_POST['vehicle_id'];
            $action = $_POST['action'];
            $responsible_id = $_POST['responsible_id'];
            $priority = $_POST['priority'];

            if ($this->alertModel->update($id, $due_date, $vehicle_id, $action, $responsible_id, $priority)) {
                header('Location: index.php?action=alerts');
            } else {
                echo "Erro ao atualizar alerta.";
            }
        }
    }

    // Deletar alerta
    public function delete($id) {
        AuthController::checkLevel(1);
        if ($this->alertModel->delete($id)) {
            header('Location: index.php?action=alerts');
        } else {
            echo "Erro ao deletar alerta.";
        }
    }
}
?>