<?php
include 'conexion.php';

$id_persona = $_POST["id_persona"];
$zona = $_POST["zona"];
$codigoCatastral = $_POST["codigo_catastral"];
$distrito = $_POST["distrito"];

// configuramos la consulta para agregar a la tabla propiedad
$sql = "insert into propiedad (zona, id_persona, codigo_catastral, distrito) values ('$zona', '$id_persona', '$codigoCatastral', '$distrito')";
mysqli_query($enlace, $sql);

header("Location: ../listarPropiedades.php?id=$id_persona");

?>
