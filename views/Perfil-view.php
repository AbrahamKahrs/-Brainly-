<?php require_once __DIR__ . '/layouts/cabeza-buscador.php'; ?>

<!-- Contenedor principal centrado -->
<div class="w-100 mx-auto" style="max-width: 700px;">

    <!-- ========================================== -->
    <!-- 1. TARJETA DE PERFIL (FOTO, NOMBRE Y LIKES) -->
    <!-- ========================================== -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4 text-center">
        <div class="d-flex flex-column align-items-center">
            
            <!-- Foto de Perfil (Avatar Example) -->
            <div class="position-relative mb-3">
                <img 
                    src="https://ui-avatars.com/api/?name=Juan+Perez&background=3b82f6&color=fff&size=128" 
                    alt="Foto de Perfil" 
                    class="rounded-circle shadow-sm border border-3 border-white"
                    style="width: 110px; height: 110px; object-fit: cover;"
                >
            </div>

            <!-- Nombre de la Persona -->
            <h4 class="fw-bold text-dark mb-1">Juan Pérez</h4>
            <p class="text-muted small mb-3">@juanperez • Estudiante de Secundaria</p>

            <!-- Contador de Likes Totales -->
            <div class="d-inline-flex align-items-center gap-2 bg-danger-subtle text-danger px-4 py-2 rounded-pill fw-bold fs-6">
                <i class="bi bi-heart-fill"></i>
                <span>72 Likes Totales</span>
            </div>

        </div>
    </div>

    <!-- Título de la Sección -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="fw-bold text-dark mb-0">
            <i class="bi bi-collection-play text-primary me-1"></i> Mis Actividades Publicadas
        </h5>
        <span class="badge bg-primary-subtle text-primary rounded-pill">Deslizar <i class="bi bi-arrow-right"></i></span>
    </div>

    <!-- ========================================== -->
    <!-- 2. CARRUSEL DE ACTIVIDADES DEL USUARIO     -->
    <!-- ========================================== -->
    <div id="carruselActividades" class="carousel slide pb-5" data-bs-ride="carousel">
        
        <!-- Indicadores / Puntos inferiores -->
        <div class="carousel-indicators mb-0" style="bottom: -10px;">
            <button type="button" data-bs-target="#carruselActividades" data-bs-slide-to="0" class="active bg-primary" aria-current="true" aria-label="Actividad 1"></button>
            <button type="button" data-bs-target="#carruselActividades" data-bs-slide-to="1" class="bg-primary" aria-label="Actividad 2"></button>
            <button type="button" data-bs-target="#carruselActividades" data-bs-slide-to="2" class="bg-primary" aria-label="Actividad 3"></button>
        </div>

        <!-- Diapositivas / Tarjetas del Carrusel -->
        <div class="carousel-inner">

            <!-- DIAPOSITIVA 1 -->
            <div class="carousel-item active">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary rounded-pill px-3 py-1 fw-semibold">Matemáticas</span>
                        <small class="text-muted"><i class="bi bi-clock"></i> Hace 2 días</small>
                    </div>

                    <!-- Imagen de la actividad -->
                    <div class="bg-light rounded-3 text-center py-4 mb-3 border d-flex flex-column align-items-center justify-content-center" style="min-height: 160px;">
                        <i class="bi bi-calculator text-primary fs-1 mb-1"></i>
                        <span class="text-muted small fw-semibold">[ Ejercicio de Álgebra Resolvido ]</span>
                    </div>

                    <h6 class="fw-bold mb-1">¿Cómo resolver esta ecuación cuadrática?</h6>
                    <p class="text-muted small mb-3">
                        Explicación completa paso a paso utilizando la fórmula general de Baskara.
                    </p>

                    <div class="d-flex justify-content-between align-items-center border-top pt-2">
                        <span class="text-danger fw-bold small"><i class="bi bi-heart-fill"></i> 34 Likes recibidos</span>
                        <span class="badge bg-success-subtle text-success">✓ Resuelta</span>
                    </div>
                </div>
            </div>

            <!-- DIAPOSITIVA 2 -->
            <div class="carousel-item">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-warning text-dark rounded-pill px-3 py-1 fw-semibold">Física</span>
                        <small class="text-muted"><i class="bi bi-clock"></i> Hace 5 días</small>
                    </div>

                    <!-- Imagen de la actividad -->
                    <div class="bg-light rounded-3 text-center py-4 mb-3 border d-flex flex-column align-items-center justify-content-center" style="min-height: 160px;">
                        <i class="bi bi-lightning-charge text-warning fs-1 mb-1"></i>
                        <span class="text-muted small fw-semibold">[ Diagrama de Fuerza y Movimiento ]</span>
                    </div>

                    <h6 class="fw-bold mb-1">Problema de Movimiento Rectilíneo Uniforme</h6>
                    <p class="text-muted small mb-3">
                        Cálculo de velocidad y distancia con aceleración constante de 2 m/s².
                    </p>

                    <div class="d-flex justify-content-between align-items-center border-top pt-2">
                        <span class="text-danger fw-bold small"><i class="bi bi-heart-fill"></i> 26 Likes recibidos</span>
                        <span class="badge bg-warning-subtle text-warning-emphasis">Pendiente</span>
                    </div>
                </div>
            </div>

            <!-- DIAPOSITIVA 3 -->
            <div class="carousel-item">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark rounded-pill px-3 py-1 fw-semibold">Biología</span>
                        <small class="text-muted"><i class="bi bi-clock"></i> Hace 1 semana</small>
                    </div>

                    <!-- Imagen de la actividad -->
                    <div class="bg-light rounded-3 text-center py-4 mb-3 border d-flex flex-column align-items-center justify-content-center" style="min-height: 160px;">
                        <i class="bi bi-diagram-3 text-info fs-1 mb-1"></i>
                        <span class="text-muted small fw-semibold">[ Esquema de la Célula Animal ]</span>
                    </div>

                    <h6 class="fw-bold mb-1">Identificación de organelos celulares</h6>
                    <p class="text-muted small mb-3">
                        Resumen explicativo sobre mitocondrias, núcleo y retículo endoplasmático.
                    </p>

                    <div class="d-flex justify-content-between align-items-center border-top pt-2">
                        <span class="text-danger fw-bold small"><i class="bi bi-heart-fill"></i> 12 Likes recibidos</span>
                        <span class="badge bg-success-subtle text-success">✓ Resuelta</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Botones de Control Anterior / Siguiente -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carruselActividades" data-bs-slide="prev" style="width: 40px;">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carruselActividades" data-bs-slide="next" style="width: 40px;">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>

    </div>

</div>

<?php require_once __DIR__ . '/layouts/pies.php'; ?>