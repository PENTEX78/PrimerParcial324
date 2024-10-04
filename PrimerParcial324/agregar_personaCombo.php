<?php
include 'resources/conexion.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$ci = $_POST["ci"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$distrito = $_POST["distrito"];
$zona = $_POST["zona"];
$catastral = $_POST["codigo_catastral"];

// configuramos la consulta para agregar a la tabla persona
$sql = "insert into persona (nombre, apellido, ci, telefono, correo) values ('$nombre', '$apellido', '$ci', '$telefono', '$correo')";
mysqli_query($enlace, $sql);

$sql = "select id_persona from persona where ci = $ci";
$respuesta = mysqli_query($enlace, $sql);
$fila = mysqli_fetch_assoc($respuesta);
$id_persona = $fila["id_persona"];

// configuramos la consulta para agregar a la tabla usuarios
$sql = "insert into usuarios (nombre_usuario, contrasena, rol, ci_persona) values ('$usuario', '$password', 'usuario', '$ci')";
mysqli_query($enlace, $sql);

// configuramos la consulta para agregar la propiedad
$sql = "insert into propiedad (zona, id_persona, codigo_catastral, distrito) values ('$zona', $id_persona, '$catastral', '$distrito')";
mysqli_query($enlace, $sql);

header("Location: http://localhost:8080/PrimerParcial324/funcionario.php");

?>