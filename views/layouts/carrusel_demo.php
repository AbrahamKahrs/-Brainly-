<?php
// ==========================================
// 1. CONEXIÓN E INICIALIZACIÓN DE SQLITE
// ==========================================
$dbPath = __DIR__ . '/data/database.sqlite';

// Crea la carpeta data si no existe
if (!file_exists(__DIR__ . '/data')) {
    mkdir(__DIR__ . '/data', 0777, true);
}

try {
    $db = new PDO("sqlite:" . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Crear tablas por partes si no existen
    $db->exec("CREATE TABLE IF NOT EXISTS USUARIO (
        id_usuario INTEGER PRIMARY KEY AUTOINCREMENT,
        nome VARCHAR(45),
        email VARCHAR(256),
        senha VARCHAR(100)
    );");

    $db->exec("CREATE TABLE IF NOT EXISTS materia (
        id_materia INTEGER PRIMARY KEY AUTOINCREMENT,
        nome VARCHAR(45)
    );");

    $db->exec("CREATE TABLE IF NOT EXISTS tarea (
        id_tarea INTEGER PRIMARY KEY AUTOINCREMENT,
        titulo VARCHAR(75),
        descripcion VARCHAR(256),
        fecha_creacion DATE,
        id_materia INTEGER,
        FOREIGN KEY (id_materia) REFERENCES materia(id_materia)
    );");

    $db->exec("CREATE TABLE IF NOT EXISTS resposta (
        id_resposta INTEGER PRIMARY KEY AUTOINCREMENT,
        contenido VARCHAR(256),
        fecha_respuesta DATE,
        id_tarea INTEGER,
        FOREIGN KEY (id_tarea) REFERENCES tarea(id_tarea)
    );");

    $db->exec("CREATE TABLE IF NOT EXISTS megusta (
        id_tarea INTEGER NOT NULL,
        id_usuario INTEGER NOT NULL,
        PRIMARY KEY (id_tarea, id_usuario)
    );");

    // Insertar materias de prueba si la tabla está vacía
    $checkMateria =$db->query("SELECT COUNT(*) as cant FROM materia")->fetch();
    if ($checkMateria['cant'] == 0) {$db->exec("INSERT INTO materia (nome) VALUES ('Matemáticas'), ('Español'), ('Historia'), ('Física'), ('Química');");
    }

    // Insertar tareas de prueba si la tabla está vacía
    $checkTarea =$db->query("SELECT COUNT(*) as cant FROM tarea")->fetch();
    if ($checkTarea['cant'] == 0) {$db->exec("INSERT INTO tarea (titulo, descripcion, fecha_creacion, id_materia) VALUES 
        ('¿Cómo resolver esta ecuación cuadrática?', 'Necesito ayuda para hallar las raíces usando la fórmula general.', DATE('now'), 1),
        ('Identificar sujeto y predicado en oraciones compuestas', '¿Cómo distinguir las proposiciones subordinadas sustantivas?', DATE('now'), 2),
        ('Causas principales de la Revolución Industrial', 'Resumen breve de los factores tecnológicos y económicos.', DATE('now'), 3),
        ('Leyes de Newton aplicadas a plano inclinado', '¿Cómo calcular la aceleración con fuerza de fricción?', DATE('now'), 4),
        ('Balanceo de ecuaciones químicas por tanteo', 'Ejercicios resueltos de reacciones de combustión.', DATE('now'), 5);");
    }

} catch (PDOException $e) {
    die("Error en la base de datos: " . $e->getMessage());
}

// ==========================================
// 2. CONSULTA DE LAS ÚLTIMAS 5 TAREAS
// ==========================================
$query = "SELECT 
            t.id_tarea, 
            t.titulo, 
            t.descripcion, 
            t.fecha_creacion, 
            m.nome AS materia_nombre,
            (SELECT COUNT(id_tarea) FROM megusta mg WHERE mg.id_tarea = t.id_tarea) AS total_likes
          FROM tarea t
          JOIN materia m ON t.id_materia = m.id_materia
          ORDER BY t.fecha_creacion DESC, t.id_tarea DESC
          LIMIT 5";

$ultimasTareas = $db->query($query)->fetchAll();
?>

<!-- ==========================================
     3. VISTA HTML/CSS/JS DEL CARRUSEL
     ========================================== -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrusel de Tareas</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: #f0f2f5;
            padding: 20px;
        }

        .carrusel-container {
            max-width: 750px;
            margin: 20px auto;
            background: #ebf3ff;
            border: 2px solid #5b92e5;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
        }

        .carrusel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .carrusel-title-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .carrusel-title-wrapper h2 {
            font-size: 1.1rem;
            color: #118cfe;
            margin: 0;
            font-weight: 700;
        }

        .carrusel-track-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            border-radius: 12px;
        }

        .carrusel-track {
            display: flex;
            transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
            width: 100%;
        }

        .carrusel-card {
            min-width: 100%;
            background: #ffffff;
            border: 1px solid #d0d7de;
            border-radius: 12px;
            padding: 20px;
            box-sizing: border-box;
            cursor: pointer;
            transition: box-shadow 0.2s ease;
        }

        .carrusel-card:hover {
            box-shadow: 0 6px 16px rgba(0,0,0,0.08);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .badge-materia {
            background-color: #118cfe;
            color: white;
            font-size: 0.75rem;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
        }

        .card-tiempo {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .card-preview {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            margin-bottom: 15px;
            color: #495057;
            border: 1px dashed #ced4da;
        }

        .preview-icon {
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .preview-text {
            font-size: 0.85rem;
            font-weight: 500;
        }

        .card-titulo {
            font-size: 1rem;
            color: #212529;
            margin: 0 0 8px 0;
            font-weight: 700;
        }

        .card-descripcion {
            font-size: 0.9rem;
            color: #495057;
            margin: 0 0 15px 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-footer {
            display: flex;
            justify-content: flex-start;
            border-top: 1px solid #f1f3f5;
            padding-top: 12px;
        }

        .like-btn {
            background: transparent;
            border: 1px solid #ff4d4f;
            color: #ff4d4f;
            padding: 6px 14px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: background 0.2s;
        }

        .like-btn:hover {
            background: #fff1f0;
        }

        .carrusel-btn {
            background: white;
            border: 1px solid #ced4da;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            cursor: pointer;
            font-size: 1rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            z-index: 10;
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .carrusel-btn.prev { left: 8px; }
        .carrusel-btn.next { right: 8px; }

        .carrusel-dots {
            display: flex;
            gap: 6px;
        }

        .dot {
            width: 8px;
            height: 8px;
            background: #bdc3c7;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dot.active {
            background: #118cfe;
            width: 20px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="carrusel-container">
    <div class="carrusel-header">
        <div class="carrusel-title-wrapper">
            <span class="carrusel-icon">🐴</span>
            <h2>Espacio para Carrusel - Tareas Recientes</h2>
        </div>
        <div class="carrusel-dots" id="carruselDots"></div>
    </div>

    <div class="carrusel-track-wrapper">
        <button class="carrusel-btn prev" onclick="moveSlide(-1)">&lt;</button>
        
        <div class="carrusel-track" id="carruselTrack">
            <?php if (!empty($ultimasTareas)): ?>
                <?php foreach ($ultimasTareas as$tarea): ?>
                <div class="carrusel-card">
                    <div class="card-top">
                        <span class="badge-materia"><?= htmlspecialchars($tarea['materia_nombre']) ?></span>
                        <span class="card-tiempo"><?= htmlspecialchars($tarea['fecha_creacion']) ?></span>
                    </div>
                    
                    <div class="card-preview">
                        <div class="preview-icon">📖</div>
                        <span class="preview-text">[ <?= htmlspecialchars($tarea['titulo']) ?> ]</span>
                    </div>

                    <div class="card-body">
                        <h3 class="card-titulo"><?= htmlspecialchars($tarea['titulo']) ?></h3>
                        <p class="card-descripcion"><?= htmlspecialchars($tarea['descripcion']) ?></p>
                    </div>

                    <div class="card-footer">
                        <button class="like-btn" onclick="event.stopPropagation();">
                            ❤️ <span class="like-count"><?= $tarea['total_likes'] ?></span> Likes
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <button class="carrusel-btn next" onclick="moveSlide(1)">&gt;</button>
    </div>
</div>

<script>
let currentIndex = 0;
const track = document.getElementById('carruselTrack');
const cards = track ? track.children : [];
const totalCards = cards.length;
const dotsContainer = document.getElementById('carruselDots');
let autoSlideInterval;

function initDots() {
    if (!dotsContainer || totalCards <= 1) return;
    dotsContainer.innerHTML = '';
    for (let i = 0; i < totalCards; i++) {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(i));
        dotsContainer.appendChild(dot);
    }
}

function updateCarousel() {
    if (!track) return;
    track.style.transform = `translateX(-${currentIndex * 100}%)`;
    const dots = document.querySelectorAll('.dot');
    dots.forEach((dot, index) => {
        dot.classList.toggle('active', index === currentIndex);
    });
}

function moveSlide(direction) {
    if (totalCards <= 1) return;
    currentIndex = (currentIndex + direction + totalCards) % totalCards;
    updateCarousel();
    resetInterval();
}

function goToSlide(index) {
    currentIndex = index;
    updateCarousel();
    resetInterval();
}

function startAutoSlide() {
    if (totalCards <= 1) return;
    autoSlideInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % totalCards;
        updateCarousel();
    }, 4000);
}

function resetInterval() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
}

if (totalCards > 0) {
    initDots();
    startAutoSlide();
    
    const container = document.querySelector('.carrusel-container');
    if (container) {
        container.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
        container.addEventListener('mouseleave', () => startAutoSlide());
    }
}
</script>

</body>
</html>