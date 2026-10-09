<?php require_once __DIR__ . '/layouts/cabeza-buscador.php'; ?>

<!-- Contenedor principal centrado -->
<div class="w-100 mx-auto" style="max-width: 650px;">

    <!-- Card del Formulario -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-5">
        
        <!-- Encabezado del Formulario -->
        <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-3">
            <div class="bg-primary-subtle text-primary p-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                <i class="bi bi-plus-circle-fill fs-3"></i>
            </div>
            <div>
                <h4 class="fw-bold mb-0 text-dark">Publicar una nueva tarea</h4>
                <p class="text-muted small mb-0">Escribe tu pregunta para que la comunidad pueda ayudarte</p>
            </div>
        </div>

        <!-- Formulario -->
        <form action="SubirTarea-view.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-3">
            
            <!-- 1. Nombre de la Tarea -->
            <div>
                <label for="titulo" class="form-label fw-semibold small text-dark">Nombre de la tarea / Pregunta principal *</label>
                <input 
                    type="text" 
                    id="titulo" 
                    name="titulo" 
                    class="form-control rounded-3 py-2" 
                    placeholder="Ej. ¿Cómo resolver esta ecuación de segundo grado?"
                    required
                >
            </div>

            <!-- 2. Tema General (Menú desplegable) -->
            <div>
                <label for="tema" class="form-label fw-semibold small text-dark">Tema general / Materia *</label>
                <select id="tema" name="tema" class="form-select rounded-3 py-2" required>
                    <option value="" disabled selected>Selecciona una materia...</option>
                    <option value="matematica">Matemática</option>
                    <option value="fisica">Física</option>
                    <option value="quimica">Química</option>
                    <option value="informatica">Informática</option>
                    <option value="biologia">Biología</option>
                    <option value="geografia">Geografía</option>
                    <option value="historia">Historia</option>
                    <option value="espanol">Español / Lengua</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <!-- 3. Descripción Breve -->
            <div>
                <label for="descripcion_corta" class="form-label fw-semibold small text-dark">Descripción breve</label>
                <input 
                    type="text" 
                    id="descripcion_corta" 
                    name="descripcion_corta" 
                    class="form-control rounded-3 py-2" 
                    placeholder="Ej. Ayuda para el examen de mañana, tema de fórmula general"
                >
            </div>

            <!-- 4. Cuadro de texto amplio (Detalle de la tarea) -->
            <div>
                <label for="contenido" class="form-label fw-semibold small text-dark">Detalle o enunciado completo de la tarea *</label>
                <textarea 
                    id="contenido" 
                    name="contenido" 
                    rows="5" 
                    class="form-control rounded-3" 
                    placeholder="Escribe aquí los datos completos del problema, consignas o lo que intentaste hacer..."
                    required
                ></textarea>
            </div>

            <!-- 5. Foto / Adjunto (Opcional) -->
            <div>
                <label for="foto" class="form-label fw-semibold small text-dark">Adjuntar foto o imagen (opcional)</label>
                <div class="input-group">
                    <input type="file" id="foto" name="foto" class="form-control rounded-3" accept="image/*">
                    <span class="input-group-text bg-light text-muted"><i class="bi bi-image"></i></span>
                </div>
                <div class="form-text small">Puedes subir una foto legible del cuaderno o libro (PNG, JPG).</div>
            </div>

            <!-- Botones de Acción -->
            <div class="d-flex justify-content-end gap-2 mt-3 pt-3 border-top">
                <a href="Menu-view.php" class="btn btn-outline-secondary rounded-pill px-4 fw-semibold">Cancelar</a>
                <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">
                    <i class="bi bi-send me-1"></i> Publicar Tarea
                </button>
            </div>

        </form>

    </div>

</div>

<?php require_once __DIR__ . '/layouts/pies.php'; ?>