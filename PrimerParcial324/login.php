<?php
include "header.php";
?>
<div class="login-wrapper">
    <div class="login-container">
        <!-- Espacio para una imagen -->
        <img src="images/logoLaPaz.png" alt="Logo">
        <h2>Iniciar Sesión</h2>
        <form action="resources/validar_usuario.php" method="POST">
                <div class="mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
        </form>
    </div>
  </div>
<?php   
    include "footer.php";
?>