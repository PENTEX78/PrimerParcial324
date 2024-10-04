<?php

$enlace = mysqli_connect("localhost", "root", "", "bdnestor");
if(!$enlace){
    die("No pudo conectarse a la base de datos " . mysqli_error($mysqli));
}

?>