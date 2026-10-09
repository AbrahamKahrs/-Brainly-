<?php require_once __DIR__ . '/layouts/cabeza.php'; ?>

<div class="card shadow-sm border-0 rounded-4 p-4" style="max-width: 400px; width: 100%;">
    
    <!-- Título y Subtítulo -->
    <div class="text-center mb-4">
        <h3 class="fw-bold">Iniciar Sesión</h3>
        <p class="text-muted small">Ingresa tus datos para acceder a Brainly</p>
    </div>

    <!-- Formulario de Login -->
    <form action="index.php?action=login" method="POST">
        
        <!-- Campo: Usuario / Correo -->
        <div class="mb-3 text-start">
            <label for="usuario" class="form-label fw-semibold small">Usuario o Correo</label>
            <input 
                type="text" 
                class="form-control" 
                id="usuario" 
                name="usuario" 
                placeholder="ej. tung tung sahur" 
                required
            >
        </div>

        <!-- Campo: Contraseña -->
        <div class="mb-3 text-start">
            <label for="password" class="form-label fw-semibold small">Contraseña</label>
            <input 
                type="password" 
                class="form-control" 
                id="password" 
                name="password" 
                placeholder="••••••••" 
                required
            >
        </div>

        <!-- Botón de Envío -->
        <div class="d-grid gap-2 mt-4">
            <button type="submit" class="btn btn-primary fw-bold">Entrar</button>
        </div>

    </form>

    <!-- Enlace a Registro -->
    <div class="text-center mt-4 pt-3 border-top">
        <span class="small text-muted">¿Aún no tienes cuenta?</span>
        <a href="index.php?action=registro" class="small fw-bold text-decoration-none">Regístrate</a>
    </div>

</div>

<?php require_once __DIR__ . '/layouts/pies.php'; ?>