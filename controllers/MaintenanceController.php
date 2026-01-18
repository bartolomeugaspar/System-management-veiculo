<?php
// controllers/MaintenanceController.php
require_once '../models/Maintenance.php';
require_once '../models/Vehicle.php';
require_once '../models/User.php';
require_once 'AuthController.php';

class MaintenanceController {
    private $maintenanceModel;
    private $vehicleModel;
    private $userModel;

    public function __construct() {
        AuthController::checkLogin();
        $this->maintenanceModel = new Maintenance();
        $this->vehicleModel = new Vehicle();
        $this->userModel = new User();
    }

    // Listar manutenções
    public function index() {
        $maintenances = $this->maintenanceModel->getAll();
        include '../views/maintenances/index.php';
    }

    // Formulário para criar
    public function create() {
        $vehicles = $this->vehicleModel->getAll();
        $users = $this->userModel->getAll();
        include '../views/maintenances/create.php';
    }

    // Salvar novo registo
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date_time = $_POST['date_time'];
            $vehicle_id = $_POST['vehicle_id'];
            $type = $_POST['type'];
            $services = $_POST['services'];
            $parts = $_POST['parts'];
            $mileage = $_POST['mileage'];
            $responsible_id = $_POST['responsible_id'];
            $costs = $_POST['costs'];
            $observations = $_POST['observations'];

            if ($this->maintenanceModel->create($date_time, $vehicle_id, $type, $services, $parts, $mileage, $responsible_id, $costs, $observations)) {
                header('Location: index.php?action=maintenances');
            } else {
                echo "Erro ao criar registo de manutenção.";
            }
        }
    }

    // Formulário para editar
    public function edit($id) {
        AuthController::checkLevel(1);
        $maintenance = $this->maintenanceModel->getById($id);
        $vehicles = $this->vehicleModel->getAll();
        $users = $this->userModel->getAll();
        include '../views/maintenances/edit.php';
    }

    // Atualizar registo
    public function update($id) {
        AuthController::checkLevel(1);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date_time = $_POST['date_time'];
            $vehicle_id = $_POST['vehicle_id'];
            $type = $_POST['type'];
            $services = $_POST['services'];
            $parts = $_POST['parts'];
            $mileage = $_POST['mileage'];
            $responsible_id = $_POST['responsible_id'];
            $costs = $_POST['costs'];
            $observations = $_POST['observations'];

            if ($this->maintenanceModel->update($id, $date_time, $vehicle_id, $type, $services, $parts, $mileage, $responsible_id, $costs, $observations)) {
                header('Location: index.php?action=maintenances');
            } else {
                echo "Erro ao atualizar registo de manutenção.";
            }
        }
    }

    // Deletar registo
    public function delete($id) {
        AuthController::checkLevel(1);
        if ($this->maintenanceModel->delete($id)) {
            header('Location: index.php?action=maintenances');
        } else {
            echo "Erro ao deletar registo de manutenção.";
        }
    }
}
?>