<?php
include 'header.php';
$id_persona = $_GET["id"];

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'funcionario') {
    // Si no hay sesión activa, redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit();
}
?>

<div class="container">
    <div class="form-container">
        <h3 class="text-center mb-4"><i class="fa-solid fa-house-circle-check fa-3x"></i></h3>
        <form action="resources/agregar_propiedad.php" method="POST">
            <input type="hidden" id="id_persona" name="id_persona" value=<?php echo $id_persona ?> >
            <div class="form-group">
                <label for="zona">Zona</label>
                <input type="text" class="form-control" id="zona" name="zona" placeholder="Ingrese la zona" required>
            </div>

            <div class="form-group">
                <label for="codigo_catastral">Código Catastral</label>
                <input type="text" class="form-control" id="codigo_catastral" name="codigo_catastral" placeholder="Ingrese el código catastral" required>
            </div>

            <div class="form-group">
                <label for="distrito">Distrito</label>
                <input type="text" class="form-control" id="distrito" name="distrito" placeholder="Ingrese el distrito" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-plus"></i> Agregar Propiedad</button>
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>