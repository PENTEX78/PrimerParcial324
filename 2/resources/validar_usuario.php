<?php
include 'conexion.php';

// Iniciar la sesión
session_start();


$email = $_POST['email'];
$password = $_POST['password']; 

$sql = "select * from usuarios where nombre_usuario = '$email' and contrasena = '$password' ";
$respuesta = mysqli_query($enlace, $sql);

if($respuesta->num_rows > 0){
    $row = mysqli_fetch_assoc($respuesta);
    if($row["rol"] == "funcionario"){
        //agregamos a la sesion los atributos necesarios
        $_SESSION['usuario'] = $email;
        $_SESSION['rol'] = $row["rol"];
        header('Location: ../funcionario.php');
        exit();
    }else{
        if($row["rol"] == "usuario"){
            //agregamos a la sesion los atributos necesarios
            $_SESSION['usuario'] = $email;
            $_SESSION['rol'] = $row["rol"];
            $_SESSION['ci_persona'] = $row['ci_persona'];
            header('Location: ../usuario.php');
            exit();
        }
    }
}
else{
    header('Location: login.php');
    exit();
}

?>