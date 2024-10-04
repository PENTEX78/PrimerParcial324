<?php
include "header.php";
?>

<!-- Slider de imagenes -->
<div class="carousel-container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="images/slider1.jpg" alt="Primer slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/slider2.jpg" alt="Segundo slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/slider3.jpg" alt="Tercero slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/slider4.jpg" alt="Cuarto slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/slider5.jpg" alt="Quinto slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="images/slider6.jpg" alt="Sexto slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<br>
<br>
<!-- Botones de prueba -->
<div class="container">
    <h2 class="text-left font-weight-bold" style="font-size: 40px;">Trámites y servicios</h2>
    <br>
    <div class="button-container">
        <a href="#" class="service-btn" style="background-color: #a26ee0">
            Impuestos Municipales <i class="fas fa-file-invoice"></i>
        </a>
        <a href="#" class="service-btn" style="background-color: #e277db;">
            Negocios y Comercios <i class="fa-solid fa-city"></i>
        </a>
        <a href="#" class="service-btn" style="background-color: #6f97e2;">
            Catastro y territorio <i class="fa-solid fa-map"></i>
        </a>
        <a href="#" class="service-btn" style="background-color: #e16b9c;">
            Servicios sociales <i class="fas fa-handshake"></i>
        </a>
        <a href="#" class="service-btn" style="background-color: #9b8ee6;">
            Otros <i class="fa-solid fa-bars"></i>
        </a>
    </div>
</div>

<br>
<br>

<?php
include "footer.php";
?>