<?php

include 'conexion.php';

$id_persona = $_POST["id_persona"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

$sql = "update persona set nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', correo = '$correo' where id_persona = $id_persona";
mysqli_query($enlace, $sql);


echo "<script>
        alert('Datos guardados exitosamente');
        window.location.href = '../funcionario.php'; 
    </script>";

?>