<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'main';
ob_start();
$content = ob_get_clean();
require '../../layouts/admin.php';
?>

<!-- Contenido específico de la vista -->
<div class="container-fluid my-3">

<table class="matriz-riesgo-table">
    <thead>
        <tr>
            <th></th>
            <th>Bajo</th>
            <th>Medio</th>
            <th>Alto</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Bajo</th>
            <td class="controlable">
                <p class="shadow-item"><span>Controlable</span> <i class="bi bi-info-circle-fill"></i> </p>
                <p class="shadow-item">Controlable</p>
                <p class="shadow-item">Controlable</p>
            </td>
            <td class="atencion">
            <p class="shadow-item">Atención</p>    
            </td>
            <td class="prioridad">Prioridad</td>
        </tr>
        <tr>
            <th>Medio</th>
            <td class="atencion">Atención</td>
            <td class="importante">Importante</td>
            <td class="alta-prioridad">Alta prioridad</td>
        </tr>
        <tr>
            <th>Alto</th>
            <td class="prioridad">Prioridad</td>
            <td class="alta-prioridad">Alta prioridad</td>
            <td class="critico">Crítico</td>
        </tr>
    </tbody>
</table>

</div>