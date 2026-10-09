<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainly</title>
    <!-- CDN de Bootstrap 5 para estilos limpios -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f6f8;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .main-container {
            flex: 1;
        }
        .brainly-header {
            background-color: #ffffff;
            border-bottom: 2px solid #e5e8ed;
        }
        .brainly-logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: #000000;
            text-decoration: none;
            letter-spacing: -0.5px;
        }
        .brainly-logo span {
            color: #3b82f6; /* Azul estilo Brainly */
        }
    </style>
</head>
<body>

    <!-- Encabezado Centrado y Minimalista -->
    <header class="brainly-header py-3 mb-4 shadow-sm">
        <div class="container text-center">
            <a href="index.php" class="brainly-logo">
                Brainly<span>.</span>
            </a>
            <p class="text-muted small mb-0 mt-1">Comunidad de aprendizaje e intercambio de tareas</p>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="main-container container d-flex flex-column align-items-center justify-content-center">
