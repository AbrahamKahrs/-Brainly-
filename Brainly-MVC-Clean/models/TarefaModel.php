<?php
require_once __DIR__ . '/../config/database.php';

/**
 * Modelo TarefaModel
 * Gestiona las operaciones de base de datos para tareas y respuestas.
 */
class TarefaModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    /**
     * Obtiene las últimas N tareas registradas para el carrusel / novedades.
     */
    public function getUltimasTarefas($limit = 5) {
        $stmt = $this->db->prepare("SELECT * FROM tarefas ORDER BY fecha_creacion DESC, id DESC LIMIT :limit");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Consulta tareas aplicando filtros por texto de búsqueda y materia.
     */
    public function getTodasTarefas($search = '', $materia = '') {
        $sql = "SELECT t.*, (SELECT COUNT(*) FROM respostas r WHERE r.tarea_id = t.id) as total_respuestas 
                FROM tarefas t WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $sql .= " AND (t.titulo LIKE :search OR t.descripcion LIKE :search)";
            $params[':search'] = '%' . $search . '%';
        }

        if (!empty($materia) && $materia !== 'todas') {
            $sql .= " AND LOWER(t.materia) = LOWER(:materia)";
            $params[':materia'] = $materia;
        }

        $sql .= " ORDER BY t.id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Obtiene el detalle de una tarea específica por ID.
     */
    public function getTarefaPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM tarefas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /**
     * Inserta una nueva tarea en la base de datos (con opción de adjuntar imagen).
     */
    public function crearTarefa($titulo, $materia, $descripcion, $usuario = 'Estudiante', $usuario_id = null, $imagen = null, $puntos = 25) {
        $stmt = $this->db->prepare("INSERT INTO tarefas (titulo, materia, descripcion, usuario, usuario_id, imagen, puntos) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$titulo, $materia, $descripcion, $usuario, $usuario_id, $imagen, $puntos]);
    }

    /**
     * Guarda una respuesta asociada estrictamente a una tarea existente.
     */
    public function agregarRespuesta($tarea_id, $usuario_nombre, $contenido, $usuario_id = null) {
        $stmt = $this->db->prepare("INSERT INTO respostas (tarea_id, usuario_nombre, contenido, usuario_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$tarea_id, $usuario_nombre, $contenido, $usuario_id]);
    }

    /**
     * Obtiene todas las respuestas correspondientes a una tarea dada.
     */
    public function getRespuestasPorTarea($tarea_id) {
        $stmt = $this->db->prepare("SELECT * FROM respostas WHERE tarea_id = ? ORDER BY fecha_respuesta ASC");
        $stmt->execute([$tarea_id]);
        return $stmt->fetchAll();
    }
}