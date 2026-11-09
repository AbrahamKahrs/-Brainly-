<?php
require_once __DIR__ . '/../config/database.php';

/**
 * Modelo UserModel
 * Gestiona el registro, autenticación y consulta de usuarios en la base de datos.
 */
class UserModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Registra un nuevo usuario en el sistema.
     */
    public function registrar($nombre, $email, $password) {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$nombre, $email, $hash]);
    }

    /**
     * Busca un usuario por su correo electrónico.
     */
    public function buscarPorEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE LOWER(email) = LOWER(?)");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    /**
     * Verifica las credenciales de inicio de sesión.
     */
    public function login($email, $password) {
        $user = $this->buscarPorEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}