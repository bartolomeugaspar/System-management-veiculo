<?php
// controllers/VehicleController.php
require_once __DIR__ . '/../models/Vehicle.php';
require_once __DIR__ . '/../models/Owner.php';
require_once __DIR__ . '/AuthController.php';

class VehicleController {
    private $vehicleModel;
    private $ownerModel;

    public function __construct() {
        AuthController::checkLogin();
        $this->vehicleModel = new Vehicle();
        $this->ownerModel = new Owner();
    }

    // Listar veículos
    public function index() {
        $vehicles = $this->vehicleModel->getAll();
        include __DIR__ . '/../views/vehicles/index.php';
    }

    // Formulário para criar
    public function create() {
        $owners = $this->ownerModel->getAll();
        include __DIR__ . '/../views/vehicles/create.php';
    }

    // Salvar novo veículo
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $plate = $_POST['plate'];
            $brand = $_POST['brand'];
            $year = $_POST['year'];
            $model = $_POST['model'];
            $color = $_POST['color'];
            $owner_id = $_POST['owner_id'];

            if ($this->vehicleModel->create($plate, $brand, $year, $model, $color, $owner_id)) {
                header('Location: index.php?action=vehicles');
            } else {
                echo "Erro ao criar veículo.";
            }
        }
    }

    // Formulário para editar
    public function edit($id) {
        $vehicle = $this->vehicleModel->getById($id);
        $owners = $this->ownerModel->getAll();
        include __DIR__ . '/../views/vehicles/edit.php';
    }

    // Atualizar veículo
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $plate = $_POST['plate'];
            $brand = $_POST['brand'];
            $year = $_POST['year'];
            $model = $_POST['model'];
            $color = $_POST['color'];
            $owner_id = $_POST['owner_id'];

            if ($this->vehicleModel->update($id, $plate, $brand, $year, $model, $color, $owner_id)) {
                header('Location: index.php?action=vehicles');
            } else {
                echo "Erro ao atualizar veículo.";
            }
        }
    }

    // Deletar veículo (apenas admin)
    public function delete($id) {
        AuthController::checkLevel(1);
        if ($this->vehicleModel->delete($id)) {
            header('Location: index.php?action=vehicles');
        } else {
            echo "Erro ao deletar veículo.";
        }
    }
}
?>