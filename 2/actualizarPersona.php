<?php
include 'header.php';
include 'resources/conexion.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'funcionario') {
    // Si no hay sesión activa, redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit();
}
$id_persona = $_GET["id"];
$sql = "select * from persona where id_persona = $id_persona";
$resultado = mysqli_query($enlace, $sql);
$fila = mysqli_fetch_array($resultado);

?>

<div class="container">
    <div class="form-container">
        <h3 class="text-center mb-4"><i class="fa-solid fa-user-pen fa-3x"></i></h3>
        <form id="editPersonForm" action="resources/actualizar_persona.php" method="POST">
            <!-- input invisible para enviar el id -->
            <input type="hidden" id="id_persona" name="id_persona" value=<?php echo $fila["id_persona"] ?> >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value=<?php echo $fila["nombre"] ?> required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value=<?php echo $fila["apellido"] ?> required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value=<?php echo $fila["telefono"] ?> required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" value=<?php echo $fila["correo"] ?> required>
            </div>
            <button type="submit" class="btn btn-custom btn-block"><i class="fa-solid fa-pen-to-square"></i> Guardar Cambios</button>
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>