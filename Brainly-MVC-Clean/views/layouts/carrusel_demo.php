<!-- Carrusel de últimas tareas -->
<div class="bg-blue-600 rounded-2xl p-6 text-white mb-8 shadow-md">
  <div class="flex items-center justify-between mb-4">
    <h3 class="text-lg font-bold flex items-center gap-2">
      <span class="inline-block w-2.5 h-2.5 bg-green-400 rounded-full animate-ping"></span>
      Últimas Tareas Publicadas
    </h3>
    <span class="text-xs bg-blue-500 px-3 py-1 rounded-full font-medium">Recientes</span>
  </div>
  
  <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
    <?php if (!empty($ultimas5)): ?>
      <?php foreach ($ultimas5 as $item): ?>
        <a href="index.php?action=ver&id=<?php echo $item['id']; ?>" class="bg-white/10 hover:bg-white/20 p-3 rounded-xl transition-all border border-white/10 flex flex-col justify-between">
          <div>
            <span class="text-[10px] font-semibold bg-white/20 px-2 py-0.5 rounded text-white inline-block mb-1">
              <?php echo htmlspecialchars($item['materia']); ?>
            </span>
            <p class="text-xs font-semibold line-clamp-2 leading-snug">
              <?php echo htmlspecialchars($item['titulo']); ?>
            </p>
          </div>
          <span class="text-[10px] text-blue-100 mt-2 block">Por <?php echo htmlspecialchars($item['usuario']); ?></span>
        </a>
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-xs text-blue-100 col-span-5">No hay publicaciones recientes.</p>
    <?php endif; ?>
  </div>
</div>