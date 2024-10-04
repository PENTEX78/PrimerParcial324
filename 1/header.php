<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catastro HAM-LP</title>
  <link rel="icon" href="images/logoLaPaz.png" type="image/x-png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Hoja de Estillos CSS -->
  <link href="css/style.css" rel="stylesheet">
  <!-- alertas -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.7/dist/sweetalert2.min.css">
  <!-- Carga jQuery desde CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

  <!-- Sección con el degradado -->
   <div class="header-background d-flex justify-content-center align-items-center">
        <img src="images/logoGamlp.png" alt="Imagen centrada" class="img-fluid">
   </div>

  <!-- Barra de navegación -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">¿Quiénes Somos?</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Información Institucional</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Trabaja con Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Normativa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contáctanos</a>
            </li>
        </ul>
        <?php if (isset($_SESSION['usuario'])): ?>
                <!-- Si el usuario está logueado, mostramos el botón de Cerrar Sesión -->
                <a class="btn btn-danger login-btn" href="logout.php">
                    <i class="fa-solid fa-sign-out-alt"></i>
                </a>
            <?php else: ?>
                <!-- Si no está logueado, mostramos el botón de Iniciar Sesión -->
                <a class="btn btn-primary login-btn" href="login.php">
                    <i class="fa-solid fa-user"></i>
                </a>
            <?php endif; ?>
      </div>
    </div>
  </nav>