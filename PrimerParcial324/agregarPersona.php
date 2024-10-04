<?php
include 'header.php';


// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'funcionario') {
    // Si no hay sesión activa o el rol no es el corrrecto, redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit();
}
?>

<div class="container">
    <div class="form-container">
        <h3 class="text-center mb-4"><i class="fas fa-user-plus fa-3x"></i></h3>
        <form id="addPersonForm" action="resources/agregar_persona.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese el apellido" required>
            </div>
            <div class="form-group">
                <label for="ci">Cédula de Identidad (CI)</label>
                <input type="text" class="form-control" id="ci" name="ci" placeholder="Ingrese el CI" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el teléfono" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo" required>
            </div>
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese el usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese la contraseña" required>
            </div>
            <button type="submit" class="btn btn-custom btn-block"><i class="fa-solid fa-plus"></i> Agregar Persona</button>
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>