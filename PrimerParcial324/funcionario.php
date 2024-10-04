<?php
include 'header.php';
include 'resources/conexion.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'funcionario') {
    // Si no hay sesión activa, redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit();
}

//realizamos la consulta a la base de datos 
$sql = "select * from persona order BY id_persona DESC";
$respuesta = mysqli_query($enlace, $sql);

?>
<br>
<!-- botoo para agregar personas -->
<div class="container centered-card">
    <div class="row justify-content-center">
        <!-- Primera tarjeta -->
        <div class="col-12 col-md-3 mb-3">
            <div class="card text-center" style="cursor: pointer;" onclick="window.location.href='agregarPersona.php'">
                <div class="card-body">
                    <h5 class="card-title">Agregar Persona</h5>
                    <i class="fas fa-user-plus fa-3x"></i>
                </div>
            </div>
        </div>
        <!-- Segunda tarjeta -->
        <div class="col-12 col-md-3 mb-3">
            <div class="card text-center" style="cursor: pointer;" onclick="location.href='mandarDatosJson.php'">
                <div class="card-body">
                    <h5 class="card-title">Listar por Impuesto</h5>
                    <i class="fa-regular fa-rectangle-list fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<!-- llenar la tabla mediante una consulta -->
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">C.I.</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Correo</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        while ($fila = mysqli_fetch_assoc($respuesta)) { 
        ?>
            <tr>
                <td><?php echo $fila['ci']; ?></td>
                <td><?php echo $fila['nombre']; ?></td>
                <td><?php echo $fila['apellido']; ?></td>
                <td><?php echo $fila['telefono']; ?></td>
                <td><?php echo $fila['correo']; ?></td>
                <td>
                    <!-- Botón para actualizar -->
                    <a href="actualizarPersona.php?id=<?php echo $fila['id_persona']; ?>" class="btn btn-success btn-sm">
                        <i class="fa-solid fa-pen"></i> Editar
                    </a>
                    <!-- Botón para eliminar -->
                    <a href="resources/eliminar_persona.php?id=<?php echo $fila['id_persona']; ?>" class="btn btn-danger btn-sm" 
                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta persona?');">
                        <i class="fa-solid fa-trash-can"></i> Eliminar
                    </a>
                    <a href="listarPropiedades.php?id=<?php echo $fila['id_persona']; ?>" class="btn btn-info btn-sm">
                        <i class="fa-solid fa-rectangle-list"></i> Listar Propiedades
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<br>

<?php
include 'footer.php';
?>