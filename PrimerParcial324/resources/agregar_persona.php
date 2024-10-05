<?php
include 'conexion.php';

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$ci = $_POST["ci"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];

// configuramos la consulta para agregar a la tabla persona
$sql = "insert into persona (nombre, apellido, ci, telefono, correo) values ('$nombre', '$apellido', '$ci', '$telefono', '$correo')";
mysqli_query($enlace, $sql);

// configuramos la consulta para agregar a la tabla usuarios
$sql = "insert into usuarios (nombre_usuario, contrasena, rol, ci_persona) values ('$usuario', '$password', 'usuario', '$ci')";
mysqli_query($enlace, $sql);

header("Location: ../funcionario.php");
?>
