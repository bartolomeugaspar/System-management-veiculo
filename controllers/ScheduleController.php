<?php
// controllers/ScheduleController.php
require_once '../models/Schedule.php';
require_once '../models/Vehicle.php';
require_once '../models/User.php';
require_once 'AuthController.php';

class ScheduleController {
    private $scheduleModel;
    private $vehicleModel;
    private $userModel;

    public function __construct() {
        AuthController::checkLogin();
        $this->scheduleModel = new Schedule();
        $this->vehicleModel = new Vehicle();
        $this->userModel = new User();
    }

    // Listar agendamentos
    public function index() {
        $schedules = $this->scheduleModel->getAll();
        include '../views/schedules/index.php';
    }

    // Formulário para criar
    public function create() {
        AuthController::checkLevel(1); // Apenas admin
        $vehicles = $this->vehicleModel->getAll();
        $users = $this->userModel->getAll();
        include '../views/schedules/create.php';
    }

    // Salvar novo agendamento
    public function store() {
        AuthController::checkLevel(1);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date_time = $_POST['date_time'];
            $type = $_POST['type'];
            $vehicle_id = $_POST['vehicle_id'];
            $services = $_POST['services'];
            $responsible_id = $_POST['responsible_id'];
            $observations = $_POST['observations'];

            if ($this->scheduleModel->create($date_time, $type, $vehicle_id, $services, $responsible_id, $observations)) {
                header('Location: index.php?action=schedules');
            } else {
                echo "Erro ao criar agendamento.";
            }
        }
    }

    // Formulário para editar
    public function edit($id) {
        AuthController::checkLevel(1);
        $schedule = $this->scheduleModel->getById($id);
        $vehicles = $this->vehicleModel->getAll();
        $users = $this->userModel->getAll();
        include '../views/schedules/edit.php';
    }

    // Atualizar agendamento
    public function update($id) {
        AuthController::checkLevel(1);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date_time = $_POST['date_time'];
            $type = $_POST['type'];
            $vehicle_id = $_POST['vehicle_id'];
            $services = $_POST['services'];
            $responsible_id = $_POST['responsible_id'];
            $status = $_POST['status'];
            $observations = $_POST['observations'];

            if ($this->scheduleModel->update($id, $date_time, $type, $vehicle_id, $services, $responsible_id, $status, $observations)) {
                header('Location: index.php?action=schedules');
            } else {
                echo "Erro ao atualizar agendamento.";
            }
        }
    }

    // Atualizar status (operador pode)
    public function updateStatus($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $status = $_POST['status'];
            $stmt = $this->scheduleModel->pdo->prepare("UPDATE schedules SET status = ? WHERE id = ?");
            if ($stmt->execute([$status, $id])) {
                header('Location: index.php?action=schedules');
            } else {
                echo "Erro ao atualizar status.";
            }
        }
    }

    // Deletar agendamento
    public function delete($id) {
        AuthController::checkLevel(1);
        if ($this->scheduleModel->delete($id)) {
            header('Location: index.php?action=schedules');
        } else {
            echo "Erro ao deletar agendamento.";
        }
    }
}
?>