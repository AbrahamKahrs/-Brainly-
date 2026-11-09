<?php
/**
 * Clase Singleton Database
 * Gestiona la conexión PDO a la base de datos SQLite e inicializa las tablas requeridas.
 */
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $dbPath = __DIR__ . '/../data/database.sqlite';
        $this->pdo = new PDO("sqlite:" . $dbPath);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->initDb();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }

    private function initDb() {
        // Tabla de Usuarios
        $sqlUsuarios = "CREATE TABLE IF NOT EXISTS usuarios (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nombre TEXT NOT NULL,
            email TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL,
            fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        $this->pdo->exec($sqlUsuarios);

        // Tabla de Tareas (con soporte de imagen subida)
        $sqlTarefas = "CREATE TABLE IF NOT EXISTS tarefas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            titulo TEXT NOT NULL,
            materia TEXT NOT NULL,
            descripcion TEXT NOT NULL,
            usuario TEXT DEFAULT 'Estudiante',
            usuario_id INTEGER,
            imagen TEXT DEFAULT NULL,
            puntos INTEGER DEFAULT 25,
            fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
        )";
        $this->pdo->exec($sqlTarefas);

        // Tabla de Respuestas (vinculada a la tarea original)
        $sqlRespostas = "CREATE TABLE IF NOT EXISTS respostas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            tarea_id INTEGER NOT NULL,
            usuario_id INTEGER,
            usuario_nombre TEXT NOT NULL,
            contenido TEXT NOT NULL,
            fecha_respuesta DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (tarea_id) REFERENCES tarefas(id) ON DELETE CASCADE
        )";
        $this->pdo->exec($sqlRespostas);

        // Datos semilla iniciales si la tabla de tareas está vacía
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM tarefas");
        if ($stmt->fetch()['total'] == 0) {
            $demoData = [
                ['¿Cómo resolver (3x^2 - 5x)/(2x + 1) en cálculo?', 'Matemáticas', 'Necesito el desarrollo paso a paso aplicando la regla del cociente antes de simplificar.', 'Valeria R.', 50],
                ['¿Cómo calcular la aceleración en plano inclinado a 30° con rozamiento?', 'Física', 'Tengo mu = 0.2 y peso m. ¿Cómo descompongo la fuerza normal correctamente?', 'Carlos M.', 35],
                ['Diferencia entre map() y List Comprehension en Python', 'Programación', '¿Cuál tiene mejor rendimiento y sigue los estándares PEP8 para transformar listas grandes?', 'Lucía T.', 20],
                ['Paso a paso para balancear reacciones redox en medio ácido', 'Química', '¿Cómo asigno los números de oxidación en MnO4- + Fe2+ -> Mn2+ + Fe3+?', 'Sofía M.', 40],
                ['Estructura y función de la mitocondria en la célula eucariota', 'Biología', 'Explicación sencilla del ciclo de Krebs y producción de ATP para examen.', 'Bruno S.,', 30]
            ];
            $insert = $this->pdo->prepare("INSERT INTO tarefas (titulo, materia, descripcion, usuario, puntos) VALUES (?, ?, ?, ?, ?)");
            foreach ($demoData as $row) {
                $insert->execute($row);
            }
        }
    }
}