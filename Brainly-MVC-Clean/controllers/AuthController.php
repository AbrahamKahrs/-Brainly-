<?php
require_once __DIR__ . '/../models/UserModel.php';

/**
 * Controlador AuthController
 * Maneja las acciones de inicio de sesión, registro y cierre de sesión de usuarios.
 */
class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    /**
     * Procesa y muestra la pantalla de inicio de sesión.
     */
    public function login() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (!empty($email) && !empty($password)) {
                $user = $this->userModel->login($email, $password);
                if ($user) {
                    $_SESSION['usuario'] = [
                        'id' => $user['id'],
                        'nombre' => $user['nombre'],
                        'email' => $user['email']
                    ];
                    header("Location: index.php");
                    exit;
                } else {
                    $error = "Credenciales incorrectas. Intenta de nuevo.";
                }
            } else {
                $error = "Por favor completa todos los campos.";
            }
        }
        require_once __DIR__ . '/../views/Login-view.php';
    }

    /**
     * Procesa y muestra la pantalla de registro de nuevos usuarios.
     */
    public function registro() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (!empty($nombre) && !empty($email) && !empty($password)) {
                if ($this->userModel->buscarPorEmail($email)) {
                    $error = "El correo ya se encuentra registrado.";
                } else {
                    if ($this->userModel->registrar($nombre, $email, $password)) {
                        $user = $this->userModel->buscarPorEmail($email);
                        $_SESSION['usuario'] = [
                            'id' => $user['id'],
                            'nombre' => $user['nombre'],
                            'email' => $user['email']
                        ];
                        header("Location: index.php");
                        exit;
                    } else {
                        $error = "Error al procesar el registro.";
                    }
                }
            } else {
                $error = "Todos los campos son obligatorios.";
            }
        }
        require_once __DIR__ . '/../views/Register-view.php';
    }

    /**
     * Cierra la sesión activa del usuario.
     */
    public function logout() {
        unset($_SESSION['usuario']);
        session_destroy();
        header("Location: index.php");
        exit;
    }
}