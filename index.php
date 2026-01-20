<?php

session_start();
require_once 'controllers/AuthController.php';

AuthController::checkLogin();

$action = $_GET['action'] ?? 'dashboard';

switch ($action) {
    case 'dashboard':
        // Load dashboard data
        require_once 'models/Vehicle.php';
        require_once 'models/Schedule.php';
        require_once 'models/Alert.php';
        $vehicleModel = new Vehicle();
        $scheduleModel = new Schedule();
        $alertModel = new Alert();
        $vehicles = $vehicleModel->getAll();
        $schedules = $scheduleModel->getAll();
        $upcoming_alerts = $alertModel->getUpcoming();
        include 'views/index.php';
        break;

    case 'users':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        if (isset($_GET['create'])) $controller->create();
        elseif (isset($_GET['store'])) $controller->store();
        elseif (isset($_GET['edit'])) $controller->edit($_GET['id']);
        elseif (isset($_GET['update'])) $controller->update($_GET['id']);
        elseif (isset($_GET['delete'])) $controller->delete($_GET['id']);
        else $controller->index();
        break;

    case 'vehicles':
        require_once 'controllers/VehicleController.php';
        $controller = new VehicleController();
        if (isset($_GET['create'])) $controller->create();
        elseif (isset($_GET['store'])) $controller->store();
        elseif (isset($_GET['edit'])) $controller->edit($_GET['id']);
        elseif (isset($_GET['update'])) $controller->update($_GET['id']);
        elseif (isset($_GET['delete'])) $controller->delete($_GET['id']);
        else $controller->index();
        break;

    case 'owners':
        require_once 'controllers/OwnerController.php';
        $controller = new OwnerController();
        if (isset($_GET['create'])) $controller->create();
        elseif (isset($_GET['store'])) $controller->store();
        elseif (isset($_GET['edit'])) $controller->edit($_GET['id']);
        elseif (isset($_GET['update'])) $controller->update($_GET['id']);
        elseif (isset($_GET['delete'])) $controller->delete($_GET['id']);
        else $controller->index();
        break;

    case 'schedules':
        require_once 'controllers/ScheduleController.php';
        $controller = new ScheduleController();
        if (isset($_GET['create'])) $controller->create();
        elseif (isset($_GET['store'])) $controller->store();
        elseif (isset($_GET['edit'])) $controller->edit($_GET['id']);
        elseif (isset($_GET['update'])) $controller->update($_GET['id']);
        elseif (isset($_GET['updateStatus'])) $controller->updateStatus($_GET['id']);
        elseif (isset($_GET['delete'])) $controller->delete($_GET['id']);
        else $controller->index();
        break;

    case 'maintenances':
        require_once 'controllers/MaintenanceController.php';
        $controller = new MaintenanceController();
        if (isset($_GET['create'])) $controller->create();
        elseif (isset($_GET['store'])) $controller->store();
        elseif (isset($_GET['edit'])) $controller->edit($_GET['id']);
        elseif (isset($_GET['update'])) $controller->update($_GET['id']);
        elseif (isset($_GET['delete'])) $controller->delete($_GET['id']);
        else $controller->index();
        break;

    case 'alerts':
        require_once 'controllers/AlertController.php';
        $controller = new AlertController();
        if (isset($_GET['create'])) $controller->create();
        elseif (isset($_GET['store'])) $controller->store();
        elseif (isset($_GET['edit'])) $controller->edit($_GET['id']);
        elseif (isset($_GET['update'])) $controller->update($_GET['id']);
        elseif (isset($_GET['delete'])) $controller->delete($_GET['id']);
        else $controller->index();
        break;

    case 'reports':
        // Simple reports for admin
        AuthController::checkLevel(1);
        require_once 'models/Maintenance.php';
        $maintenanceModel = new Maintenance();
        $maintenances = $maintenanceModel->getAll();
        $total_costs = array_sum(array_column($maintenances, 'costs'));
        include 'views/reports.php';
        break;

    case 'logout':
        require_once 'controllers/AuthController.php';
        $auth = new AuthController();
        $auth->logout();
        break;

    default:
        header('Location: index.php');
        break;
}
?>