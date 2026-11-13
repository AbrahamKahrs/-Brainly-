<?php require_once __DIR__ . '/layouts/header.php'; ?>

<main class="w-full pt-32 min-h-screen pb-12 flex items-center justify-center">
  <div class="bg-white rounded-2xl p-8 border border-gray-200 shadow-md w-full max-w-md">
    
    <h2 class="text-2xl font-bold text-center text-gray-900 mb-2">Crear Cuenta</h2>
    <p class="text-xs text-center text-gray-500 mb-6">Regístrate para formar parte de la comunidad de estudio</p>

    <?php if (!empty($error)): ?>
      <div class="bg-red-50 text-red-600 p-3 rounded-lg text-xs mb-4">
        <?php echo htmlspecialchars($error); ?>
      </div>
    <?php endif; ?>

    <form action="index.php?action=registro" method="POST" class="space-y-4">
      <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1">Nombre Completo</label>
        <input type="text" name="nombre" required placeholder="Tu Nombre" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1">Correo Electrónico</label>
        <input type="email" name="email" required placeholder="correo@ejemplo.com" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <div>
        <label class="block text-xs font-semibold text-gray-700 mb-1">Contraseña</label>
        <input type="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2.5 rounded-lg text-sm hover:bg-blue-700 transition-colors">
        Registrarse
      </button>
    </form>

    <div class="mt-6 text-center text-xs text-gray-500">
      ¿Ya tienes cuenta? <a href="index.php?action=login" class="text-blue-600 font-semibold hover:underline">Inicia sesión</a>
    </div>

  </div>
</main>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>