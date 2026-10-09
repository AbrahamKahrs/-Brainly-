<?php require_once __DIR__ . '/layouts/cabeza-buscador.php'; ?>

<!-- Contenedor principal centrado -->
<div class="w-100 mx-auto" style="max-width: 750px;">

    <!-- Buscador Simple -->
    <div class="bg-white p-3 rounded-4 shadow-sm mb-4 border">
        <form action="Buscador-view.php" method="GET" class="d-flex gap-2">
            <input 
                type="text" 
                name="q" 
                class="form-control rounded-pill px-3" 
                placeholder="Buscar tarea o tema..." 
                value="Ecuaciones"
            >
            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">Buscar</button>
        </form>
    </div>

    <!-- TABLA ESTILIZADA DE RESULTADOS -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-5">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="small text-muted">
                        <th scope="col" class="ps-4">Materia</th>
                        <th scope="col">Tarea / Pregunta</th>
                        <th scope="col">Estado</th>
                        <th scope="col" class="text-end pe-4">Likes</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Fila 1 -->
                    <tr>
                        <td class="ps-4">
                            <span class="badge bg-primary rounded-pill">Matemáticas</span>
                        </td>
                        <td>
                            <a href="#" class="fw-bold text-dark text-decoration-none d-block">¿Cómo resolver esta ecuación cuadrática?</a>
                            <small class="text-muted">Publicado por <strong>JuanPerez</strong></small>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success">✓ Resuelta</span>
                        </td>
                        <td class="text-end pe-4 fw-bold text-danger">
                            <i class="bi bi-heart-fill"></i> 12
                        </td>
                    </tr>

                    <!-- Fila 2 -->
                    <tr>
                        <td class="ps-4">
                            <span class="badge bg-primary rounded-pill">Matemáticas</span>
                        </td>
                        <td>
                            <a href="#" class="fw-bold text-dark text-decoration-none d-block">Ecuaciones lineales con dos incógnitas (2x2)</a>
                            <small class="text-muted">Publicado por <strong>SofiaM</strong></small>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning-emphasis">Pendiente</span>
                        </td>
                        <td class="text-end pe-4 fw-bold text-danger">
                            <i class="bi bi-heart-fill"></i> 4
                        </td>
                    </tr>

                    <!-- Fila 3 -->
                    <tr>
                        <td class="ps-4">
                            <span class="badge bg-success rounded-pill">Historia</span>
                        </td>
                        <td>
                            <a href="#" class="fw-bold text-dark text-decoration-none d-block">Causas de la Segunda Guerra Mundial</a>
                            <small class="text-muted">Publicado por <strong>AnaGomez</strong></small>
                        </td>
                        <td>
                            <span class="badge bg-success-subtle text-success">✓ Resuelta</span>
                        </td>
                        <td class="text-end pe-4 fw-bold text-danger">
                            <i class="bi bi-heart-fill"></i> 28
                        </td>
                    </tr>

                    <!-- Fila 4 -->
                    <tr>
                        <td class="ps-4">
                            <span class="badge bg-warning text-dark rounded-pill">Física</span>
                        </td>
                        <td>
                            <a href="#" class="fw-bold text-dark text-decoration-none d-block">Movimiento Rectilíneo Uniformemente Variado</a>
                            <small class="text-muted">Publicado por <strong>LuciaR</strong></small>
                        </td>
                        <td>
                            <span class="badge bg-warning-subtle text-warning-emphasis">Pendiente</span>
                        </td>
                        <td class="text-end pe-4 fw-bold text-danger">
                            <i class="bi bi-heart-fill"></i> 19
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php require_once __DIR__ . '/layouts/pies.php'; ?>