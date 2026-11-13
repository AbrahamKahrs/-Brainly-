<?php require_once __DIR__ . '/layouts/header.php'; ?>

<main class="w-full pt-28 min-h-screen pb-12">
  <div class="max-w-[1280px] mx-auto px-4 sm:px-8">
    
    <!-- Carrusel de novedades -->
    <?php require_once __DIR__ . '/layouts/carrusel_demo.php'; ?>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
      
      <!-- Listado Principal de Tareas -->
      <section class="lg:col-span-8 space-y-4">
        <div class="flex items-center justify-between border-b border-gray-200 pb-3">
          <h2 class="text-xl font-bold text-gray-900">Todas las Tareas</h2>
          <span class="text-xs text-gray-500 font-mono"><?php echo count($tarefas); ?> registradas</span>
        </div>

        <?php if (!empty($tarefas)): ?>
          <?php foreach ($tarefas as $t): ?>
            <article class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
              
              <!-- Cabecera de la Tarjeta -,->
              <div class="flex items-center justify-between text-xs text-gray-500 mb-2">
                <span class="font-bold text-blue-600 bg-blue-50 px-2.5 py-1 rounded-full">
                  <?php echo htmlspecialchars($t['materia']); ?>
                </span>
                <span><?php echo htmlspecialchars($t['fecha_creacion']); ?></span>
              </div>

              <!-- Título de la Tarea -->
              <h3 class="text-base font-bold text-gray-900 mb-1">
                <a href="index.php?action=ver&id=<?php echo $t['id']; ?>" class="hover:text-blue-600">
                  <?php echo htmlspecialchars($t['titulo']); ?>
                </a>
              </h3>

              <!-- Descripción Breve -->
              <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                <?php echo htmlspecialchars($t['descripcion']); ?>
              </p>

              <!-- Imagen Adjunta (Si existe) -->
              <?php if (!empty($t['imagen'])): ?>
                <div class="mb-3">
                  <img src="<?php echo htmlspecialchars($t['imagen']); ?>" alt="Imagen adjunta" class="max-h-48 rounded-lg object-cover border border-gray-100">
                </div>
              <?php endif; ?>

              <!-- Pie de la Tarjeta -->
              <div class="flex items-center justify-between border-t border-gray-100 pt-3 text-xs text-gray-500">
                <span>Publicado por <strong class="text-gray-700"><?php echo htmlspecialchars($t['usuario']); ?></strong></span>
                <a href="index.php?action=ver&id=<?php echo $t['id']; ?>" class="font-semibold text-blue-600 hover:underline">
                  <?php echo $t['total_respuestas']; ?> Respuestas &rarr;
                </a>
              </div>

            </article>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="bg-white rounded-xl p-8 text-center text-gray-500 border border-gray-200">
            No se encontraron ejercicios con los criterios indicados.
          </div>
        <?php endif; ?>
      </section>

      <!-- Panel Lateral: Crear Tarea con Imagen -->
      <aside class="lg:col-span-4 bg-white rounded-xl p-6 border border-gray-200 shadow-sm sticky top-28">
        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
          <span>📝</span> Publicar Nuevo Ejercicio
        </h3>

        <form action="index.php?action=crear" method="POST" enctype="multipart/form-data" class="space-y-4">
          
          <div>
            <label class="block text-xs font-semibold text-gray-700 mb-1">Título de la consulta</label>
            <input type="text" name="titulo" required placeholder="Ej: Ejercicio de Integrales" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
          </div>

          <div>
            <label class="block text-xs font-semibold text-gray-700 mb-1">Materia</label>
            <select name="materia" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <option value="Matemáticas">Matemáticas</option>
              <option value="Física">Física</option>
              <option value="Química">Química</option>
              <option value="Programación">Programación</option>
              <option value="Biología">Biología</option>
              <option value="Historia">Historia</option>
            </select>
          </div>

          <div>
            <label class="block text-xs font-semibold text-gray-700 mb-1">Descripción / Enunciado</label>
            <textarea name="descripcion" rows="3" required placeholder="Explica detalladamente la duda o problema..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
          </div>

          <!-- Subida de Imagen -->
          <div>
            <label class="block text-xs font-semibold text-gray-700 mb-1">Adjuntar Imagen (Opcional)</label>
            <input type="file" name="imagen" accept="image/*" class="w-full text-xs text-gray-500 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
          </div>

          <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2.5 rounded-lg text-sm hover:bg-blue-700 transition-colors shadow-sm">
            Publicar Tarea
          </button>

        </form>
      </aside>

    </div>
  </div>
</main>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>