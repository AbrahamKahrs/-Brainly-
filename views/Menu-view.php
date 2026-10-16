<?php require_once __DIR__ . '/layouts/cabeza-buscador.php'; ?>

<!-- Contenedor principal centrado (espacio amplio e independiente a los lados) -->
<div class="w-100 mx-auto" style="max-width: 700px;">

    <!-- Título del Feed -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="fw-bold text-dark mb-0">
            <i class="bi bi-journal-text text-primary me-1"></i> Tareas Recientes
        </h5>
        <span class="badge bg-secondary-subtle text-secondary rounded-pill">5 Ejemplos</span>
    </div>

    <!-- ========================================== -->
    <!-- LISTA DE TAREAS (5 EJEMPLOS DE REFERENCIA)  -->
    <!-- ========================================== -->
    <div class="d-flex flex-column gap-3 mb-5">

        <!-- TAREA EJEMPLO 1 -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-primary rounded-pill px-3 py-1 fw-semibold">Matemáticas</span>
                <small class="text-muted">Publicado por <strong>JuanPerez</strong></small>
            </div>

            <!-- Imagen Example -->
            <div class="bg-light rounded-3 text-center py-4 mb-3 border d-flex flex-column align-items-center justify-content-center" style="min-height: 140px;">
                <i class="bi bi-image text-secondary fs-1 mb-1"></i>
                <span class="text-muted small fw-semibold">[ Imagen del problema #1 ]</span>
            </div>

            <!-- Mini Texto de la Tarea -->
            <h6 class="fw-bold mb-1">¿Cómo resolver esta ecuación cuadrática?</h6>
            <p class="text-muted small mb-3">
                Necesito ayuda para hallar las raíces usando la fórmula general. Adjunto la foto del ejercicio.
            </p>

            <!-- Likes y Pie de Tarjeta -->
            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center gap-1 fw-bold">
                    <i class="bi bi-heart-fill"></i> 12 Likes
                </button>
                <small class="text-muted">Hace 10 min</small>
            </div>
        </div>

        <!-- TAREA EJEMPLO 2 -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-success rounded-pill px-3 py-1 fw-semibold">Historia</span>
                <small class="text-muted">Publicado por <strong>AnaGomez</strong></small>
            </div>

            <!-- Imagen Example -->
            <div class="bg-light rounded-3 text-center py-4 mb-3 border d-flex flex-column align-items-center justify-content-center" style="min-height: 140px;">
                <i class="bi bi-file-earmark-image text-secondary fs-1 mb-1"></i>
                <span class="text-muted small fw-semibold">[ Esquema o Mapa Histórico ]</span>
            </div>

            <!-- Mini Texto de la Tarea -->
            <h6 class="fw-bold mb-1">Causas principales de la Segunda Guerra Mundial</h6>
            <p class="text-muted small mb-3">
                ¿Alguien puede resumirme en 3 puntos clave los detonantes del conflicto para una presentación?
            </p>

            <!-- Likes y Pie de Tarjeta -->
            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center gap-1 fw-bold">
                    <i class="bi bi-heart-fill"></i> 28 Likes
                </button>
                <small class="text-muted">Hace 45 min</small>
            </div>
        </div>

        <!-- TAREA EJEMPLO 3 -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-info text-dark rounded-pill px-3 py-1 fw-semibold">Biología</span>
                <small class="text-muted">Publicado por <strong>CarlosM</strong></small>
            </div>

            <!-- Imagen Example -->
            <div class="bg-light rounded-3 text-center py-4 mb-3 border d-flex flex-column align-items-center justify-content-center" style="min-height: 140px;">
                <i class="bi bi-diagram-3 text-secondary fs-1 mb-1"></i>
                <span class="text-muted small fw-semibold">[ Diagrama de la Célula ]</span>
            </div>

            <!-- Mini Texto de la Tarea -->
            <h6 class="fw-bold mb-1">Diferencia entre célula vegetal y animal</h6>
            <p class="text-muted small mb-3">
                Tengo dudas sobre los organelos exclusivos de la célula vegetal. ¿Me ayudan a identificarlos?
            </p>

            <!-- Likes y Pie de Tarjeta -->
            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center gap-1 fw-bold">
                    <i class="bi bi-heart-fill"></i> 8 Likes
                </button>
                <small class="text-muted">Hace 2 horas</small>
            </div>
        </div>

        <!-- TAREA EJEMPLO 4 -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-warning text-dark rounded-pill px-3 py-1 fw-semibold">Física</span>
                <small class="text-muted">Publicado por <strong>LuciaR</strong></small>
            </div>

            <!-- Imagen Example -->
            <div class="bg-light rounded-3 text-center py-4 mb-3 border d-flex flex-column align-items-center justify-content-center" style="min-height: 140px;">
                <i class="bi bi-lightning-charge text-secondary fs-1 mb-1"></i>
                <span class="text-muted small fw-semibold">[ Gráfico de Movimiento Rectilíneo ]</span>
            </div>

            <!-- Mini Texto de la Tarea -->
            <h6 class="fw-bold mb-1">Calcular la velocidad final con aceleración constante</h6>
            <p class="text-muted small mb-3">
                Un móvil parte del reposo y acelera a 2m/s² durante 10s. ¿Cuál es su distancia recorrida?
            </p>

            <!-- Likes y Pie de Tarjeta -->
            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center gap-1 fw-bold">
                    <i class="bi bi-heart-fill"></i> 19 Likes
                </button>
                <small class="text-muted">Hace 3 horas</small>
            </div>
        </div>

        <!-- TAREA EJEMPLO 5 -->
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge bg-secondary rounded-pill px-3 py-1 fw-semibold">Español</span>
                <small class="text-muted">Publicado por <strong>MateoA</strong></small>
            </div>

            <!-- Imagen Example -->
            <div class="bg-light rounded-3 text-center py-4 mb-3 border d-flex flex-column align-items-center justify-content-center" style="min-height: 140px;">
                <i class="bi bi-book text-secondary fs-1 mb-1"></i>
                <span class="text-muted small fw-semibold">[ Texto de Análisis Sintáctico ]</span>
            </div>

            <!-- Mini Texto de la Tarea -->
            <h6 class="fw-bold mb-1">Identificar sujeto y predicado en oraciones compuestas</h6>
            <p class="text-muted small mb-3">
                ¿Cómo distinguir las proposiciones subordinadas sustantivas en el párrafo adjunto?
            </p>

            <!-- Likes y Pie de Tarjeta -->
            <div class="d-flex justify-content-between align-items-center border-top pt-2">
                <button class="btn btn-outline-danger btn-sm rounded-pill px-3 d-flex align-items-center gap-1 fw-bold">
                    <i class="bi bi-heart-fill"></i> 5 Likes
                </button>
                <small class="text-muted">Hace 5 horas</small>
            </div>
        </div>

    </div>

</div>

<?php require_once __DIR__ . '/layouts/pies.php'; ?>