<?php require_once __DIR__ . '/layouts/header.php'; ?>

<main class="w-full pt-28 min-h-screen pb-12">
  <div class="max-w-[900px] mx-auto px-4">
    
    <a href="index.php" class="inline-flex items-center gap-1 text-sm text-blue-600 font-semibold mb-6 hover:underline">
      &larr; Volver al listado
    </a>

    <!-- Ejercicio Principal -->
    <article class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm mb-8">
      <div class="flex items-center justify-between text-xs text-gray-500 mb-3">
        <span class="font-bold text-blue-600 bg-blue-50 px-3 py-1 rounded-full text-xs">
          <?php echo htmlspecialchars($tarefa['materia']); ?>
        </span>
        <span>Publicado el <?php echo htmlspecialchars($tarefa['fecha_creacion']); ?></span>
      </div>

      <h1 class="text-2xl font-black text-gray-900 mb-4">
        <?php echo htmlspecialchars($tarefa['titulo']); ?>
      </h1>

      <p class="text-base text-gray-800 leading-relaxed mb-4 whitespace-pre-line">
        <?php echo htmlspecialchars($tarefa['descripcion']); ?>
      </p>

      <?php if (!empty($tarefa['imagen'])): ?>
        <div class="my-4">
          <p class="text-xs font-semibold text-gray-500 mb-1">Imagen adjunta al ejercicio:</p>
          <img src="<?php echo htmlspecialchars($tarefa['imagen']); ?>" alt="Imagen del ejercicio" class="max-h-96 rounded-xl border border-gray-200 shadow-sm">
        </div>
      <?php endif; ?>

      <div class="text-xs text-gray-500 border-t border-gray-100 pt-3">
        Preguntado por: <strong class="text-gray-700"><?php echo htmlspecialchars($tarefa['usuario']); ?></strong>
      </div>
    </article>

    <!-- Sección de Respuestas -->
    <section class="space-y-6">
      <h3 class="text-xl font-bold text-gray-900 flex items-center justify-between">
        <span>Respuestas (<?php echo count($respuestas); ?>)</span>
      </h3>

      <?php if (!empty($respuestas)): ?>
        <?php foreach ($respuestas as $resp): ?>
          <div class="bg-white rounded-xl p-5 border border-gray-200 shadow-sm">
            <div class="flex items-center justify-between text-xs text-gray-500 mb-2 border-b border-gray-100 pb-2">
              <span class="font-bold text-gray-800"><?php echo htmlspecialchars($resp['usuario_nombre']); ?></span>
              <span><?php echo htmlspecialchars($resp['fecha_respuesta']); ?></span>
            </div>
            <p class="text-sm text-gray-700 whitespace-pre-line">
              <?php echo htmlspecialchars($resp['contenido']); ?>
            </p>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="bg-gray-50 rounded-xl p-6 text-center text-gray-500 border border-dashed border-gray-300">
          Esta tarea aún no tiene respuestas. ¡Sé el primero en responder!
        </div>
      <?php endif; ?>

      <!-- Formularios de Respuesta (Vinculado a la tarea) -->
      <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm mt-8">
        <h4 class="text-lg font-bold text-gray-900 mb-3">Responder a este ejercicio</h4>
        <form action="index.php?action=responder" method="POST" class="space-y-4">
          <!-- ID de la tarea oculto para garantizar vinculación -->
          <input type="hidden" name="tarea_id" value="<?php echo $tarefa['id']; ?>">

          <div>
            <textarea name="contenido" rows="4" required placeholder="Escribe tu solución explicada paso a paso..." class="w-full px-4 py-3 border border-gray-300 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
          </div>

          <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-2.5 rounded-xl text-sm hover:bg-blue-700 transition-colors shadow-sm">
            Enviar Respuesta
          </button>
        </form>
      </div>

    </section>

  </div>
</main>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>