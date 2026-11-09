<?php
require_once __DIR__ . '/../models/TarefaModel.php';

/**
 * Controlador TarefaController
 * Gestiona el feed de tareas, creación con imagen y el flujo de respuestas a tareas.
 */
class TarefaController {
    private $model;

    public function __construct() {
        $this->model = new TarefaModel();
    }

    /**
     * Lista general de tareas con filtros de búsqueda y carrusel.
     */
    public function index() {
        $search = $_GET['search'] ?? '';
        $materia = $_GET['materia'] ?? '';

        $ultimas5 = $this->model->getUltimasTarefas(5);
        $tarefas = $this->model->getTodasTarefas($search, $materia);

        require_once __DIR__ . '/../views/Menu-view.php';
    }

    /**
     * Visualiza el detalle de una tarea específica y sus respuestas asociadas.
     */
    public function ver() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header("Location: index.php");
            exit;
        }

        $tarefa = $this->model->getTarefaPorId($id);
        if (!$tarefa) {
            header("Location: index.php");
            exit;
        }

        $respuestas = $this->model->getRespuestasPorTarea($id);
        require_once __DIR__ . '/../views/DetalleTarea-view.php';
    }

    /**
     * Procesa la creación de una tarea nueva guardando la imagen si se envía una.
     */
    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = trim($_POST['titulo'] ?? '');
            $materia = trim($_POST['materia'] ?? 'Matemáticas');
            $descripcion = trim($_POST['descripcion'] ?? '');
            $usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario']['nombre'] : 'Estudiante Anónimo';
            $usuario_id = isset($_SESSION['usuario']) ? $_SESSION['usuario']['id'] : null;

            $imagenRuta = null;

            // Procesamiento de subida de imagen
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
                $extsPermitidas = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                if (in_array($ext, $extsPermitidas)) {
                    $nombreArchivo = uniqid('img_', true) . '.' . $ext;
                    $destino = __DIR__ . '/../uploads/' . $nombreArchivo;
                    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $destino)) {
                        $imagenRuta = 'uploads/' . $nombreArchivo;
                    }
                }
            }

            if (!empty($titulo) && !empty($descripcion)) {
                $this->model->crearTarefa($titulo, $materia, $descripcion, $usuario, $usuario_id, $imagenRuta);
            }
        }
        header("Location: index.php");
        exit;
    }

    /**
     * Procesa el envío de una respuesta a una tarea existente (sin crear una tarea nueva).
     */
    public function responder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tarea_id = $_POST['tarea_id'] ?? null;
            $contenido = trim($_POST['contenido'] ?? '');
            $usuario_nombre = isset($_SESSION['usuario']) ? $_SESSION['usuario']['nombre'] : 'Estudiante Anónimo';
            $usuario_id = isset($_SESSION['usuario']) ? $_SESSION['usuario']['id'] : null;

            if ($tarea_id && !empty($contenido)) {
                $this->model->agregarRespuesta($tarea_id, $usuario_nombre, $contenido, $usuario_id);
                header("Location: index.php?action=ver&id=" . $tarea_id);
                exit;
            }
        }
        header("Location: index.php");
        exit;
    }
}