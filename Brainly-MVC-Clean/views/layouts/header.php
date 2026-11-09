<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brainly - Plataforma de Estudio Colaborativo</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans min-h-screen flex flex-col">

  <header class="fixed top-0 left-0 right-0 bg-white border-b border-gray-200 z-50 shadow-sm">
    <div class="max-w-[1280px] mx-auto px-4 sm:px-8 h-20 flex items-center justify-between gap-4">
      
      <!-- Logo -->
      <a href="index.php" class="flex items-center gap-2">
        <span class="text-2xl font-black tracking-tight text-blue-600">Brainly</span>
      </a>

      <!-- Buscador Global -->
      <form action="index.php" method="GET" class="flex-1 max-w-xl mx-4">
        <div class="relative">
          <input 
            type="text" 
            name="search" 
            value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>" 
            placeholder="¿Qué ejercicio deseas resolver hoy?" 
            class="w-full pl-10 pr-4 py-2 bg-gray-100 border border-transparent rounded-full text-sm focus:bg-white focus:border-blue-500 focus:outline-none transition-all"
          >
          <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
      </form>

      <!-- Botones / Autenticación -->
      <div class="flex items-center gap-3">
        <?php if (isset($_SESSION['usuario'])): ?>
          <span class="text-sm font-semibold text-gray-700">Hola, <?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?></span>
          <a href="index.php?action=logout" class="px-4 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-full hover:bg-red-100 transition-colors">Salir</a>
        <?php else: ?>
          <a href="index.php?action=login" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors">Iniciar Sesión</a>
          <a href="index.php?action=registro" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transition-colors">Registrarse</a>
        <?php endif; ?>
      </div>

    </div>
  </header>