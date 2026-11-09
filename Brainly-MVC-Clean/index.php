<?php
/**
 * Enrutador Principal - Mini-MVC Brainly
 * Maneja las solicitudes entrantes y enruta hacia el controlador correspondiente.
 */
session_start();

require_once __DIR__ . '/controllers/TarefaController.php';
require_once __DIR__ . '/controllers/AuthController.php';

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'login':
        $authController = new AuthController();
        $authController->login();
        break;
    case 'registro':
        $authController = new AuthController();
        $authController->registro();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'crear':
        $tarefaController = new TarefaController();
        $tarefaController->crear();
        break;
    case 'ver':
        $tarefaController = new TarefaController();
        $tarefaController->ver();
        break;
    case 'responder':
        $tarefaController = new TarefaController();
        $tarefaController->responder();
        break;
    default:
        $tarefaController = new TarefaController();
        $tarefaController->index();
        break;
}