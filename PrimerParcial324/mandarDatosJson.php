<?php 
include 'resources/conexion.php';
//incluimos el header
include 'header.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'funcionario') {
    // Si no hay sesión activa, redirigir a la página de inicio de sesión
    header('Location: login.php');
    exit();
}

$sql = "select id_persona, codigo_catastral from propiedad";
$resultado = mysqli_query($enlace, $sql);   

$data = [];
while ($fila = $resultado->fetch_assoc()) {
    $data[] = $fila; // Guardamos los resultados en un array
}

$datos = []; // Array para almacenar los datos

foreach ($data as $item) {
    $codigoCatastral = $item['codigo_catastral'];
    $idPersona = $item['id_persona'];

    //hacemos la consulta para adquirir los datos de la persona
    $sql = "select * from persona where id_persona = $idPersona";
    $resultado = mysqli_query($enlace, $sql);   
    $fila = $resultado->fetch_assoc();


    // Cambia esto por la URL de tu servidor
    $url = "http://localhost:8090/PagoImpuesto/Impuesto?codigo_catastral=" . urlencode($codigoCatastral);

    // Inicializa cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Ejecuta la solicitud y almacena la respuesta
    $response = curl_exec($ch);

    // Verifica si hay errores en la solicitud
    if (curl_errno($ch)) {
        echo 'Error en cURL: ' . curl_error($ch);
    } else {
        // Agregar datos al array
        $datos[] = [
            'tipo_impuesto' => $response,
            'apellido' => $fila['apellido'],
            'nombre' => $fila['nombre'],
            'ci' => $fila['ci'],
        ];
    }
    // Cierra la sesión cURL
    curl_close($ch);
}

//separamos en tipos de impuestos 
// Inicializar arrays para cada tipo de impuesto
$alto = [];
$medio = [];
$bajo = [];

// Filtrar los datos según el tipo de impuesto
foreach ($datos as $dato) {
    switch ($dato['tipo_impuesto']) {
        case 'ALTO':
            $alto[] = $dato; // Agregar al array de alto
            break;
        case 'MEDIO':
            $medio[] = $dato; // Agregar al array de medio
            break;
        case 'BAJO':
            $bajo[] = $dato; // Agregar al array de bajo
            break;
    }
}
?>
<!-- tabla impuesto alto -->
<h1>ALTO</h1>
<table class="alto">
    <thead>
        <tr>
            <th>CI</th>
            <th>APELLIDO</th>
            <th>NOMBRE</th>
            <th>TIPO DE IMPUESTO</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alto as $item): ?>
            <tr>
                <td><?php echo $item['ci']; ?></td>
                <td><?php echo $item['apellido']; ?></td>
                <td><?php echo $item['nombre']; ?></td>
                <td><?php echo $item['tipo_impuesto']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- tabla impuesto medio -->
<h1>MEDIO</h1>
<table class="medio">
    <thead>
        <tr>
            <th>CI</th>
            <th>APELLIDO</th>
            <th>NOMBRE</th>
            <th>TIPO DE IMPUESTO</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($medio as $item): ?>
            <tr>
                <td><?php echo $item['ci']; ?></td>
                <td><?php echo $item['apellido']; ?></td>
                <td><?php echo $item['nombre']; ?></td>
                <td><?php echo $item['tipo_impuesto']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- tabla impuesto bajo -->
<h1>BAJO</h1>
<table class="bajo">
    <thead>
        <tr>
            <th>CI</th>
            <th>APELLIDO</th>
            <th>NOMBRE</th>
            <th>TIPO DE IMPUESTO</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bajo as $item): ?>
            <tr>
                <td><?php echo $item['ci']; ?></td>
                <td><?php echo $item['apellido']; ?></td>
                <td><?php echo $item['nombre']; ?></td>
                <td><?php echo $item['tipo_impuesto']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include 'footer.php';
?>