<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'Tablas de información';
ob_start();
$content = ob_get_clean();
require '../../layouts/admin.php';
?>

<!-- Contenido específico de la vista -->

<div class="container-fluid my-3">
    <div class="row">
        <div class="col-md-4">
            <img src="../../../../resources/assets/imagen1.png" alt="Imagen 1" class="img-fluid">
        </div>
        <div class="col-md-4">
            <img  src="../../../../resources/assets/imagen2.png"  alt="Imagen 2" class="img-fluid">
        </div>
        <div class="col-md-4">
            <img s src="../../../../resources/assets/imagen3.png"  alt="Imagen 3" class="img-fluid">
        </div>
        <div class="col-md-4">
            <img  src="../../../../resources/assets/imagen4.png"  alt="Imagen 4" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img  src="../../../../resources/assets/imagen5.png"  alt="Imagen 5" class="img-fluid">
        </div>
        
    </div>
</div>