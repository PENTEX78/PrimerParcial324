<?php
include 'header.php';
include 'resources/conexion.php';

$ci = $_SESSION['ci_persona'];

$sql = "select * from persona where ci = $ci";
$resultado = mysqli_query($enlace, $sql);
$fila = $resultado->fetch_assoc();
$apellido = $fila["apellido"];
$nombre = $fila["nombre"];
$id_persona = $fila["id_persona"];

$sql = "select * from propiedad where id_persona = $id_persona";
$resultado = mysqli_query($enlace, $sql);
?>

<div class="container mt-5">
        <!-- Información de la persona -->
        <h2 class="text-center mb-4">Datos de la Persona</h2>
        <div class="row">
            <div class="col-md-8">
                <p><strong>Apellido:</strong> <?php echo $apellido; ?></p>
                <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
                <p><strong>CI:</strong> <?php echo $_SESSION['ci_persona']; ?></p>
            </div>
        </div>

        <hr> <!-- Separador entre la información de la persona y la tabla -->
        <br>

            <!-- Tabla de propiedades -->
            <h2 class="text-center mb-4">Lista de Propiedades</h2>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Zona</th>
                        <th scope="col">Distrito</th>
                        <th scope="col">Código Catastral</th>
                        <th scope="col">Pago de Impuesto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mostrar los resultados en la tabla
                    if ($resultado->num_rows > 0) {
                        while($fila = $resultado->fetch_assoc()) {
                    ?>
                        <tr>
                            <td> <?php echo $fila['zona'] ?> </td>
                            <td> <?php echo $fila['distrito'] ?> </td>
                            <td> <?php echo $fila['codigo_catastral'] ?> </td>
                            <td>
                                <a href="http://localhost:8090/PagoImpuesto/tipoImpuesto?codigoCatastro=<?php echo $fila["codigo_catastral"] ?>" class="btn btn-success btn-sm">
                                <i class="fa-solid fa-money-check-dollar"></i> Ver Tipo de Impuesto
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No hay propiedades registradas</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
    </div>

<?php
include 'footer.php';
?>