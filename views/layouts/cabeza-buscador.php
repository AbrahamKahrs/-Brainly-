<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brainly</title>
    <!-- CDN Bootstrap 5 e Iconos de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
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
            font-size: 1.6rem;
            font-weight: 800;
            color: #000000;
            text-decoration: none;
            letter-spacing: -0.5px;
        }
        .brainly-logo span {
            color: #3b82f6;
        }
        /* Estilos del Buscador Central */
        .search-box {
            max-width: 450px;
            width: 100%;
        }
        .search-input {
            background-color: #f1f3f5;
            border: 1px solid #e5e8ed;
            border-radius: 50rem;
            padding-left: 2.5rem;
        }
        .search-input:focus {
            background-color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.15);
            border-color: #3b82f6;
        }
        .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            pointer-events: none;
        }
        /* Botón de 3 Puntos */
        .btn-menu-dots {
            border: none;
            background: transparent;
            font-size: 1.4rem;
            color: #333;
            padding: 0.25rem 0.6rem;
            border-radius: 50%;
        }
        .btn-menu-dots:hover, .btn-menu-dots:focus {
            background-color: #f1f3f5;
            color: #000;
        }
    </style>
</head>
<body>

    <!-- Encabezado con Buscador y Menú -->
    <header class="brainly-header sticky-top py-2 mb-4 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between gap-2">
            
            <!-- 1. Logo (Izquierda) -> Va al Feed Principal -->
            <a href="Menu-view.php" class="brainly-logo text-nowrap">
                Brainly<span>.</span>
            </a>

            <!-- 2. Buscador (Centro) -> Va al Buscador de Tareas -->
            <form action="Buscador-view.php" method="GET" class="search-box position-relative mx-2">
                <i class="bi bi-search search-icon"></i>
                <input 
                    type="search" 
                    name="q" 
                    class="form-control search-input" 
                    placeholder="¿Cuál es tu pregunta? Busca tareas..." 
                    aria-label="Buscar tareas"
                    required
                >
            </form>

            <!-- 3. Menú de 3 Puntos (Extremo Derecho) -->
            <div class="dropdown">
                <button 
                    class="btn btn-menu-dots" 
                    type="button" 
                    id="menuTresPuntos" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                    title="Opciones"
                >
                    <i class="bi bi-three-dots-vertical"></i>
                </button>

                <!-- Menú desplegable -->
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 mt-2" aria-labelledby="menuTresPuntos">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="SubirTarea-view.php">
                        <i class="bi bi-plus-circle text-primary"></i> Subir tarea
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="Perfil-view.php">
                            <i class="bi bi-person-circle text-secondary"></i> Perfil
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="Buscador-view.php">
                            <i class="bi bi-search text-success"></i> Buscador de tareas
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2 text-danger" href="Login-view.php">
                            <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="main-container container d-flex flex-column align-items-center justify-content-start">