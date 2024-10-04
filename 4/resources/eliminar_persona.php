<?php

include 'conexion.php';
$id_persona = $_GET["id"];

$sql = "select ci from persona where id_persona = $id_persona";
$resultado = mysqli_query($enlace, $sql);
$fila = mysqli_fetch_array($resultado);
$ci = $fila["ci"];

// Borramos de la tabla usuarios 
$sql = "delete from usuarios where ci_persona = $ci";
mysqli_query($enlace, $sql);

// Borramos de la tabla personas
$sql = "delete from persona where id_persona = $id_persona";
mysqli_query($enlace, $sql);

header('Location: ../funcionario.php');
?>